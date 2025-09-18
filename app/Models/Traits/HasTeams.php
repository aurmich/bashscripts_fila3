<?php

declare(strict_types=1);

namespace Modules\User\Models\Traits;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use Modules\User\Contracts\TeamContract;
use Modules\User\Models\Membership;
use Modules\User\Models\Role;
use Modules\Xot\Contracts\UserContract;
use Modules\Xot\Datas\XotData;
use Webmozart\Assert\Assert;
<<<<<<< HEAD
use Modules\User\Models\Team;
=======
>>>>>>> bdeae81f (first)

/**
 * Trait HasTeams.
 *
<<<<<<< HEAD
 * @property Team|null $currentTeam
 * @property int|null $current_team_id
 * @property-read Collection<int, Team> $teams
 * @property-read Collection<int, Team> $ownedTeams
=======
 * @property TeamContract $currentTeam
 * @property int|null $current_team_id
 * @property Collection $teams
 * @property Collection $ownedTeams
>>>>>>> bdeae81f (first)
 */
trait HasTeams
{
    /**
     * Determine if the given team is the current team.
     */
    public function isCurrentTeam(TeamContract $teamContract): bool
    {
        if ($this->currentTeam === null) {
            return false;
        }

        return $teamContract->getKey() == $this->currentTeam->getKey();
    }

    /**
<<<<<<< HEAD
     * Get the current team of the user's.
     *
     * @return BelongsTo<Team, static>
     */
    public function currentTeam(): BelongsTo
    {
        return $this->belongsTo(Team::class, 'current_team_id');
=======
     * Get the current team of the user's context.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<\Modules\User\Contracts\TeamContract, static>
     */
    public function currentTeam(): BelongsTo
    {
        $xot = XotData::make();
        if ($this->current_team_id === null && $this->id) {
            $this->switchTeam($this->personalTeam());
        }

        if ($this->allTeams()->isEmpty() && $this->getKey() !== null) {
            $this->current_team_id = null;
            $this->save();
        }

        $teamClass = $xot->getTeamClass();

        return $this->belongsTo($teamClass, 'current_team_id');
    }

    /**
     * Switch the user's context to the given team.
     */
    public function switchTeam(?TeamContract $teamContract): bool
    {
        if (! $teamContract instanceof TeamContract || ! $this->belongsToTeam($teamContract)) {
            return false;
        }

        $this->forceFill(['current_team_id' => $teamContract->getKey()])->save();
        $this->setRelation('currentTeam', $teamContract);

        return true;
>>>>>>> bdeae81f (first)
    }

    /**
     * Get all of the teams the user owns or belongs to.
     *
     * @return Collection<TeamContract>
     */
    public function allTeams(): Collection
    {
<<<<<<< HEAD
        return $this->teams()->get();
=======
        return $this->ownedTeams->merge($this->teams)->sortBy('name');
>>>>>>> bdeae81f (first)
    }

    /**
     * Get all of the teams the user owns.
<<<<<<< HEAD
     *
     * @return HasMany<Team, static>
     */
    public function ownedTeams(): HasMany
    {
        return $this->hasMany(Team::class);
=======
     * 
     * @return \Illuminate\Database\Eloquent\Relations\HasMany<\Modules\User\Contracts\TeamContract>
     */
    public function ownedTeams(): HasMany
    {
        $xot = XotData::make();
        $teamClass = $xot->getTeamClass();

        return $this->hasMany($teamClass);
>>>>>>> bdeae81f (first)
    }

    /**
     * Get all of the teams the user belongs to.
     * 
<<<<<<< HEAD
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany<\Modules\User\Models\Team, static>
     */
    public function teams(): BelongsToMany
    {
        /** @var class-string<Team> $teamClass */
        $teamClass = XotData::make()->getTeamClass();
        return $this->belongsToManyX($teamClass)
            ->withPivot('role')
            ->withTimestamps()
            ->as('membership');
=======
     * @return BelongsToMany<\Modules\User\Contracts\TeamContract, static>
     * @phpstan-return BelongsToMany<\Modules\User\Contracts\TeamContract&\Illuminate\Database\Eloquent\Model, static>
     */
    public function teams(): BelongsToMany
    {
        $xot = XotData::make();
        $teamClass = $xot->getTeamClass();

        return $this->belongsToManyX($teamClass, null, null, 'team_id');
        // ->as('membership')
>>>>>>> bdeae81f (first)
    }

    /**
     * Get the user's "personal" team.
     */
    public function personalTeam(): ?TeamContract
    {
        $personalTeam = $this->ownedTeams->where('personal_team', true)->first();
        if ($personalTeam === null) {
            return null;
        }

        Assert::nullOrIsInstanceOf($personalTeam, TeamContract::class, 'Personal team must implement TeamContract.');

        return $personalTeam;
    }

    /**
<<<<<<< HEAD
=======
     * Determine if the user owns the given team.
     */
    public function ownsTeam(?TeamContract $teamContract): bool
    {
        return $teamContract instanceof TeamContract && $this->id === $teamContract->{$this->getForeignKey()};
    }

    /**
     * Determine if the user belongs to the given team.
     */
    public function belongsToTeam(?TeamContract $teamContract): bool
    {
        return $teamContract instanceof TeamContract
            && ($this->ownsTeam($teamContract) || $this->teams->contains(fn($team) => $team->getKey() === $teamContract->getKey()));
    }

    /**
     * Get the role that the user has on the team.
     */
    public function teamRole(TeamContract $teamContract): ?Role
    {
        if (! $this->belongsToTeam($teamContract)) {
            return null;
        }

        // Troviamo l'utente all'interno del team
        $user = $teamContract->users()->where('id', $this->id)->first();

        // Verifica che l'utente esista e sia del tipo corretto
        Assert::notNull($user, 'User not found in team.');
        Assert::isInstanceOf($user, XotData::make()->getUserClass(), 'Invalid user type.');

        /**
         * @var Model&UserContract $user
         */
        $membership = $user->getRelationValue('membership');

        // Verifica che il membership esista e sia del tipo corretto
        Assert::notNull($membership, 'Membership not found.');
        Assert::isInstanceOf($membership, Membership::class, 'Invalid membership type.');

        // Ora che sappiamo che $membership è un'istanza di Membership, possiamo accedere a $membership->role
        return Role::firstOrCreate(
            ['name' => $membership->role],
            []
        );
    }

    /**
     * Determine if the user has the given role on the given team.
     */
    public function hasTeamRole(TeamContract $teamContract, string $role): bool
    {
        if ($this->ownsTeam($teamContract)) {
            return true;
        }

        /*
        return $this->belongsToTeam($teamContract) && optional(FilamentJet::findRole($teamContract->users->where(
            'id',
            $this->id
        )->first()?->membership->role))->key === $role;
        */
        return $this->belongsToTeam($teamContract) && $this->teamRole($teamContract) !== null;
    }

    /**
     * Get the user's permissions for the given team.
     */
    public function teamPermissions(TeamContract $teamContract): array
    {
        if ($this->ownsTeam($teamContract)) {
            return ['*'];
        }

        return (array) $this->teamRole($teamContract)->permissions;
    }

    /**
     * Determine if the user has the given permission on the given team.
     */
    public function hasTeamPermission(TeamContract $teamContract, string $permission): bool
    {
        if ($this->ownsTeam($teamContract)) {
            return true;
        }

        $permissions = $this->teamPermissions($teamContract);

        return in_array($permission, $permissions, true)
            || in_array('*', $permissions, true)
            || (Str::endsWith($permission, ':create') && in_array('*:create', $permissions, true))
            || (Str::endsWith($permission, ':update') && in_array('*:update', $permissions, true));
    }

    /**
>>>>>>> bdeae81f (first)
     * Invite a user to a team.
     */
    public function inviteToTeam(UserContract $user, TeamContract $team): bool
    {
        if ($this->ownsTeam($team)) {
            $team->members()->attach($user->id, ['role' => 'member']);

            return true;
        }

        return false;
    }

    /**
     * Remove a user from the team.
     */
    public function removeFromTeam(UserContract $user, TeamContract $team): bool
    {
        if ($this->ownsTeam($team)) {
            $team->members()->detach($user->id);

            return true;
        }

        return false;
    }

    /**
     * Check if the user is an owner or a member.
     */
    public function isOwnerOrMember(TeamContract $team): bool
    {
        return $this->ownsTeam($team) || $this->belongsToTeam($team);
    }

    /**
     * Promote a member to team admin.
     */
    public function promoteToAdmin(UserContract $user, TeamContract $team): bool
    {
        if ($this->ownsTeam($team)) {
            $team->members()->updateExistingPivot($user->id, ['role' => 'admin']);

            return true;
        }

        return false;
    }

    /**
     * Demote a member from team admin.
     */
    public function demoteFromAdmin(UserContract $user, TeamContract $team): bool
    {
        if ($this->ownsTeam($team)) {
            $team->members()->updateExistingPivot($user->id, ['role' => 'member']);

            return true;
        }

        return false;
    }

    /**
     * Get all admins of the team.
     */
    public function getTeamAdmins(TeamContract $team): Collection
    {
        return $team->members()->wherePivot('role', 'admin')->get();
    }

    /**
     * Get all members of the team.
     */
    public function getTeamMembers(TeamContract $team): Collection
    {
        return $team->members()->wherePivot('role', 'member')->get();
    }
<<<<<<< HEAD

    public function canManageTeam(TeamContract $team): bool
    {
        return $this->ownsTeam($team) || $this->hasTeamPermission($team, 'manage');
    }

    public function canAddTeamMembers(TeamContract $team): bool
    {
        return $this->ownsTeam($team) || $this->hasTeamPermission($team, 'add_team_members');
    }

    public function canDeleteTeam(TeamContract $team): bool
    {
        return $this->ownsTeam($team);
    }

    public function canRemoveTeamMembers(TeamContract $team): bool
    {
        return $this->ownsTeam($team) || $this->hasTeamPermission($team, 'remove_team_members');
    }

    public function canUpdateTeam(TeamContract $team): bool
    {
        return $this->ownsTeam($team) || $this->hasTeamPermission($team, 'update_team');
    }

    /**
     * Create a new team for the user.
     */
    public function createTeam(string $name): Team
    {
        $team = new Team();
        $team->name = $name;
        $team->user_id = $this->id;
        $team->save();

        return $team;
    }

    public function updateTeamName(TeamContract $team, string $name): void
    {
        if ($this->canUpdateTeam($team)) {
            $team->forceFill([
                'name' => $name,
            ])->save();
        }
    }

    public function addTeamMember(TeamContract $team, string $email, ?string $role = null): void
    {
        if ($this->canAddTeamMembers($team)) {
            /** @var class-string<Model&UserContract> $userClass */
            $userClass = XotData::make()->getUserClass();

            /** @var Model&UserContract $newTeamMember */
            $newTeamMember = $userClass::where('email', $email)->firstOrFail();

            $team->users()->attach(
                $newTeamMember,
                ['role' => $role]
            );
        }
    }

    public function removeTeamMember(TeamContract $team, int $userId): void
    {
        if ($this->canRemoveTeamMembers($team)) {
            $team->users()->detach($userId);
        }
    }

    public function deleteTeam(TeamContract $team): void
    {
        if ($this->canDeleteTeam($team)) {
            $team->delete();
        }
    }

    public function switchTeam(\Modules\User\Contracts\TeamContract $team): bool
    {
        if (! $this->belongsToTeam($team)) {
            return false;
        }

        $this->current_team_id = (string) $team->id;
        $this->save();

        return true;
    }

    public function belongsToTeam(\Modules\User\Contracts\TeamContract $team): bool
    {
        return $this->teams()->get()->contains('id', $team->id);
    }

    public function ownsTeam(\Modules\User\Contracts\TeamContract $team): bool
    {
        return $this->ownedTeams()->get()->contains('id', $team->id);
    }

    public function teamRole(\Modules\User\Contracts\TeamContract $team): ?Role
    {
        /** @var \Illuminate\Database\Eloquent\Model|\Illuminate\Database\Eloquent\Relations\Pivot|null $teamUser */
        $teamUser = $this->teams()->get()->first(function ($t) use ($team) {
            return $t->id === $team->id;
        });
        if ($teamUser && method_exists($teamUser, 'getPivot') && $teamUser->getPivot() !== null && isset($teamUser->pivot->role)) {
            return $teamUser->pivot->role;
        }
        return null;
    }

    public function teamPermissions(\Modules\User\Contracts\TeamContract $team): array
    {
        return $this->teamRole($team)->permissions->pluck('name')->toArray() ?? [];
    }

    public function hasTeamPermission(\Modules\User\Contracts\TeamContract $team, string $permission): bool
    {
        return $this->ownsTeam($team) || in_array($permission, $this->teamPermissions($team));
    }

    public function hasTeamRole(\Modules\User\Contracts\TeamContract $team, string $role): bool
    {
        return $this->ownsTeam($team) || $this->teamRole($team)->name === $role;
    }

    public function canLeaveTeam(TeamContract $team): bool
    {
        return $this->belongsToTeam($team) && ! $this->ownsTeam($team);
    }

    public function canRemoveTeamMember(TeamContract $team, UserContract $user): bool
    {
        return $this->ownsTeam($team) || $this->hasTeamPermission($team, 'remove team member');
    }

    public function canAddTeamMember(TeamContract $team): bool
    {
        return $this->ownsTeam($team) || $this->hasTeamPermission($team, 'add team member');
    }

    public function canUpdateTeamMember(TeamContract $team, UserContract $user): bool
    {
        return $this->ownsTeam($team) || $this->hasTeamPermission($team, 'update team member');
    }

    public function canViewTeam(TeamContract $team): bool
    {
        return $this->belongsToTeam($team) || $this->hasTeamPermission($team, 'view team');
    }

    public function canCreateTeam(): bool
    {
        return $this->hasPermissionTo('create team');
    }
=======
>>>>>>> bdeae81f (first)
}
