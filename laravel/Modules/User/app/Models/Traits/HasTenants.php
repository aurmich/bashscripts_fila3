<?php

declare(strict_types=1);

namespace Modules\User\Models\Traits;

use Filament\Panel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Collection;
use Modules\User\Contracts\TeamContract;
use Modules\User\Models\Tenant;
use Modules\Xot\Datas\XotData;

// use Modules\User\Models\OwnerRole;

/**
 * @property TeamContract $currentTeam
 * @property-read Collection<int, Tenant> $tenants
 * @property-read Collection<int, Tenant> $ownedTenants
 */
trait HasTenants
{
    /**
     * ..
     **/
    public function canAccessTenant(Model $tenant): bool
    {
        // return $this->teams->contains($tenant);
        return $this->tenants()->whereKey($tenant)->exists();
        // return true;
    }

    public function getTenants(Panel $panel): array|Collection
    {
        return $this->tenants;
    }

    /**
     * Get all tenants the user belongs to.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany<\Modules\User\Models\Tenant, static>
     */
    public function tenants(): BelongsToMany
    {
        return $this->belongsToManyX(Tenant::class)
            ->withPivot('role')
            ->withTimestamps();
    }

    

    public function ownedTenants(): HasMany
    {
        /** @var class-string<Tenant> $tenantClass */
        $tenantClass = XotData::make()->getTenantClass();
        return $this->hasMany($tenantClass, 'owner_id');
    }

    public function belongsToTenant(Tenant $tenant): bool
    {
        return $this->tenants()->where('tenant_id', $tenant->id)->exists();
    }

    public function ownsTenant(Tenant $tenant): bool
    {
        return $this->ownedTenants()->where('id', $tenant->id)->exists();
    }

    public function createTenant(array $input): Tenant
    {
        /** @var class-string<Tenant> $tenantClass */
        $tenantClass = XotData::make()->getTenantClass();

        /** @var Tenant $tenant */
        $tenant = $this->ownedTenants()->create([
            'name' => $input['name'],
            'domain' => $input['domain'] ?? null,
            'settings' => $input['settings'] ?? [],
        ]);

        return $tenant;
    }

    public function canManageTenant(Tenant $tenant): bool
    {
        return $this->ownsTenant($tenant) || $this->hasRole('admin');
    }

    public function canUpdateTenant(Tenant $tenant): bool
    {
        return $this->canManageTenant($tenant);
    }

    public function canDeleteTenant(Tenant $tenant): bool
    {
        return $this->ownsTenant($tenant);
    }

    public function updateTenant(Tenant $tenant, array $input): void
    {
        if ($this->canUpdateTenant($tenant)) {
            $tenant->forceFill([
                'name' => $input['name'],
                'domain' => $input['domain'] ?? $tenant->domain,
                'settings' => array_merge($tenant->settings ?? [], $input['settings'] ?? []),
            ])->save();
        }
    }

    public function deleteTenant(Tenant $tenant): void
    {
        if ($this->canDeleteTenant($tenant)) {
            $tenant->delete();
        }
    }

    public function addTenantMember(Tenant $tenant, string $email, ?string $role = null): void
    {
        if ($this->canManageTenant($tenant)) {
            /** @var class-string<\Illuminate\Database\Eloquent\Model&\Modules\Xot\Contracts\UserContract> $userClass */
            $userClass = XotData::make()->getUserClass();

            /** @var \Illuminate\Database\Eloquent\Model&\Modules\Xot\Contracts\UserContract $newMember */
            $newMember = $userClass::where('email', $email)->firstOrFail();

            $tenant->users()->attach(
                $newMember,
                ['role' => $role]
            );
        }
    }

    public function removeTenantMember(Tenant $tenant, int $userId): void
    {
        if ($this->canManageTenant($tenant)) {
            $tenant->users()->detach($userId);
        }
    }

    public function getTenantByDomain(string $domain): ?Tenant
    {
        return $this->tenants()->get()->first(function ($tenant) use ($domain) {
            return $tenant->domain === $domain;
        });
    }
}
