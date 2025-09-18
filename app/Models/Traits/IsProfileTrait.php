<?php

declare(strict_types=1);

<<<<<<< HEAD
=======
/**
 * Modulo User - Trait per il profilo utente
 *
 * Questo trait implementa funzionalità comuni per i modelli di profilo utente nell'applicazione,
 * tra cui relazioni con utenti, dispositivi e team, gestione dei ruoli, e accessori per attributi
 * comuni come nome, cognome e avatar.
 *
 * Il trait supporta:
 * - Relazione con il modello utente
 * - Gestione dei ruoli utente (incluso super-admin)
 * - Gestione dispositivi collegati (mobile e altri)
 * - Relazioni con team
 * - Accessori per attributi derivati (nome completo, username, avatar)
 * - Integrazione con MediaLibrary per la gestione degli avatar
 */

>>>>>>> bdeae81f (first)
namespace Modules\User\Models\Traits;

use Filament\Notifications\Notification;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Collection;
use Modules\User\Models\Device;
use Modules\User\Models\DeviceUser;
use Modules\User\Models\Role;
use Modules\Xot\Contracts\UserContract;
use Modules\Xot\Datas\XotData;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Permission\Exceptions\RoleDoesNotExist;

<<<<<<< HEAD
=======
/**
 * Trait per aggiungere funzionalità di profilo ai modelli utente.
 *
 * Questo trait può essere utilizzato da qualsiasi modello che deve funzionare
 * come profilo utente nell'applicazione.
 */
>>>>>>> bdeae81f (first)
trait IsProfileTrait
{
    use InteractsWithMedia;

    /**
<<<<<<< HEAD
     * Get the user that owns the profile.
     *
     * @return BelongsTo<\Illuminate\Database\Eloquent\Model&\Modules\Xot\Contracts\UserContract, static>
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(config('auth.providers.users.model'));
    }

    // ---- mutators
=======
     * Relazione con l'utente a cui appartiene il profilo.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<\Illuminate\Database\Eloquent\Model&\Modules\Xot\Contracts\UserContract, static>
     */
    public function user(): BelongsTo
    {
        /** @var class-string<\Illuminate\Database\Eloquent\Model&\Modules\Xot\Contracts\UserContract> $userClass */
        $userClass = XotData::make()->getUserClass();

        // @phpstan-ignore-next-line
        return $this->belongsTo($userClass);
    }

    /**
     * Ottiene il nome completo dell'utente.
     * Utilizza prima i dati del profilo, altrimenti ricade sul nome dell'utente.
     *
     * @param string|null $value Il valore attuale dell'attributo
     * 
     * @return string|null Il nome completo dell'utente
     */
>>>>>>> bdeae81f (first)
    public function getFullNameAttribute(?string $value): ?string
    {
        if ($value !== null) {
            return $value;
        }

<<<<<<< HEAD
        $res = $this->first_name.' '.$this->last_name;
=======
        $user = $this->user;
        if ($user === null) {
            return null;
        }

        $res = $this->first_name . ' ' . $this->last_name;
>>>>>>> bdeae81f (first)
        if (mb_strlen($res) > 2) {
            return $res;
        }

<<<<<<< HEAD
        return $this->user->name;
    }

=======
        return $user->name;
    }

    /**
     * Ottiene il nome dell'utente.
     * Se non presente nel profilo, lo recupera dall'utente collegato.
     *
     * @param string|null $value Il valore attuale dell'attributo
     * 
     * @return string|null Il nome dell'utente
     */
>>>>>>> bdeae81f (first)
    public function getFirstNameAttribute(?string $value): ?string
    {
        if ($value !== null) {
            return $value;
        }
<<<<<<< HEAD
        $value = $this->user->first_name;
=======

        $user = $this->user;
        if ($user === null) {
            return null;
        }

        $value = $user->first_name;
        if ($value === null) {
            return null;
        }
>>>>>>> bdeae81f (first)
        $this->update(['first_name' => $value]);

        return $value;
    }

<<<<<<< HEAD
=======
    /**
     * Ottiene il cognome dell'utente.
     * Se non presente nel profilo, lo recupera dall'utente collegato.
     *
     * @param string|null $value Il valore attuale dell'attributo
     * 
     * @return string|null Il cognome dell'utente
     */
>>>>>>> bdeae81f (first)
    public function getLastNameAttribute(?string $value): ?string
    {
        if ($value !== null) {
            return $value;
        }
<<<<<<< HEAD
        $value = $this->user->last_name;
=======

        $user = $this->user;
        if ($user === null) {
            return null;
        }

        $value = $user->last_name;
        if ($value === null) {
            return null;
        }
>>>>>>> bdeae81f (first)
        $this->update(['last_name' => $value]);

        return $value;
    }

<<<<<<< HEAD
=======
    /**
     * Verifica se l'utente ha il ruolo di super-admin.
     *
     * @return bool True se l'utente è super-admin, altrimenti false
     */
>>>>>>> bdeae81f (first)
    public function isSuperAdmin(): bool
    {
        if ($this->user === null) {
            return false;
        }

        return $this->user->hasRole('super-admin');
    }

<<<<<<< HEAD
=======
    /**
     * Verifica se l'utente ha il ruolo che nega i super-admin.
     *
     * @return bool True se l'utente ha il ruolo negate-super-admin, altrimenti false
     */
>>>>>>> bdeae81f (first)
    public function isNegateSuperAdmin(): bool
    {
        if ($this->user === null) {
            return false;
        }

        return $this->user->hasRole('negate-super-admin');
    }

<<<<<<< HEAD
=======
    /**
     * Toggle del ruolo super-admin per l'utente.
     * Se l'utente è super-admin, rimuove questo ruolo e assegna negate-super-admin.
     * Se l'utente non è super-admin, assegna super-admin e rimuove negate-super-admin.
     *
     * @throws \Exception Se l'utente non è disponibile
     * 
     * @return void
     */
>>>>>>> bdeae81f (first)
    public function toggleSuperAdmin(): void
    {
        $user = $this->user;
        if ($user === null) {
<<<<<<< HEAD
            throw new \Exception('['.__LINE__.']['.class_basename($this).']');
=======
            throw new \Exception('[' . __LINE__ . '][' . class_basename($this) . ']');
>>>>>>> bdeae81f (first)
        }
        $to_assign = 'super-admin';
        $to_remove = 'negate-super-admin';
        if ($this->isSuperAdmin()) {
            $to_assign = 'negate-super-admin';
            $to_remove = 'super-admin';
        }

        try {
            $user->assignRole($to_assign);
            $user->removeRole($to_remove);
        } catch (RoleDoesNotExist $e) {
            $role_assign = Role::updateOrCreate(['name' => $to_assign], ['team_id' => null]);
            $role_remove = Role::updateOrCreate(['name' => $to_remove], ['team_id' => null]);
            $user->roles()->attach($role_assign);
            $user->roles()->detach($role_remove);
        } catch (\Exception $e) {
            Notification::make()
                ->title('Exception !')
                ->danger()
                ->persistent()
                ->body($e->getMessage())
                ->send();
        }
    }

    /**
     * Relazione con i dispositivi mobili associati al profilo.
     *
<<<<<<< HEAD
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany<Device, static>
     */
    public function mobileDevices(): BelongsToMany
    {
        return $this->belongsToManyX(Device::class, 'mobile_device_users', 'profile_id', 'device_id')
=======
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany<\Modules\User\Models\Device, static>
     */
    public function mobileDevices(): BelongsToMany
    {
        // @phpstan-ignore-next-line
        return $this->belongsToMany(Device::class, 'mobile_device_users', 'profile_id', 'device_id')
>>>>>>> bdeae81f (first)
            ->withPivot('token')
            ->withTimestamps();
    }

    /**
     * Relazione con tutti i dispositivi associati al profilo.
     *
<<<<<<< HEAD
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany<Device, static>
     */
    public function devices(): BelongsToMany
    {
        return $this->belongsToManyX(Device::class, 'device_users', 'profile_id', 'device_id')
=======
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany<\Modules\User\Models\Device, static>
     */
    public function devices(): BelongsToMany
    {
        // @phpstan-ignore-next-line
        return $this->belongsToMany(Device::class, 'device_users', 'profile_id', 'device_id')
>>>>>>> bdeae81f (first)
            ->withPivot('token')
            ->withTimestamps();
    }

    /**
<<<<<<< HEAD
     * Get all of the mobile device users for the profile.
     *
     * @return HasMany<DeviceUser, static>
     */
    public function mobileDeviceUsers(): HasMany
    {
        return $this->hasMany(DeviceUser::class);
    }

    /**
     * Get all of the device users for the profile.
     *
     * @return HasMany<DeviceUser, static>
     */
    public function deviceUsers(): HasMany
    {
        return $this->hasMany(DeviceUser::class);
=======
     * Relazione con gli utenti di dispositivi mobili.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany<\Modules\User\Models\DeviceUser, static>
     */
    public function mobileDeviceUsers(): HasMany
    {
        // @phpstan-ignore-next-line
        return $this->hasMany(DeviceUser::class, 'profile_id')->where('type', 'mobile');
    }

    /**
     * Relazione con gli utenti di dispositivi generici.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany<\Modules\User\Models\DeviceUser, static>
     */
    public function deviceUsers(): HasMany
    {
        // @phpstan-ignore-next-line
        return $this->hasMany(DeviceUser::class, 'profile_id');
>>>>>>> bdeae81f (first)
    }

    /**
     * Ottiene i token dei dispositivi mobili.
     *
     * @return \Illuminate\Support\Collection<int|string, string>
     */
    public function getMobileDeviceTokens(): Collection
    {
        // PHPStan livello 9 richiede il controllo che il risultato sia del tipo corretto
        $tokens = $this->mobileDeviceUsers()
            ->pluck('token')
<<<<<<< HEAD
            ->filter(fn ($value) => $value !== null && is_string($value));
=======
            ->filter(fn($value) => $value !== null && is_string($value));
>>>>>>> bdeae81f (first)

        /** @var \Illuminate\Support\Collection<int|string, string> */
        return $tokens;
    }

<<<<<<< HEAD
    /**
     * Relazione con i team a cui appartiene il profilo.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany<\Illuminate\Database\Eloquent\Model&\Modules\User\Contracts\TeamContract, static>
     */
    public function teams(): BelongsToMany
    {
        return $this->belongsToManyX(XotData::make()->getTeamClass());
    }

    /**
     * Get the user's user_name.
=======


    /**
     * Get the user's user_name.
     * Ottiene il nome utente dal modello utente collegato.
>>>>>>> bdeae81f (first)
     *
     * @return \Illuminate\Database\Eloquent\Casts\Attribute<string|null, never>
     */
    protected function userName(): Attribute
    {
        return Attribute::make(
            get: function (): ?string {
<<<<<<< HEAD
                return $this->user->name;
=======
                $user = $this->user;
                if ($user === null) {
                    return null;
                }
                return $user->name;
>>>>>>> bdeae81f (first)
            }
        );
    }

    /**
     * Get the user's avatar URL.
<<<<<<< HEAD
=======
     * Recupera l'URL dell'avatar dell'utente dalla MediaLibrary.
>>>>>>> bdeae81f (first)
     *
     * @return \Illuminate\Database\Eloquent\Casts\Attribute<string, never>
     */
    protected function avatar(): Attribute
    {
        return Attribute::make(
            get: function (): string {
                $value = $this->getFirstMediaUrl('avatar');

                return $value;
            }
        );
    }
<<<<<<< HEAD

    /**
     * Get the user's preferred locale.
     */
    public function preferredLocale(): string
    {
        return $this->locale ?? config('app.locale', 'en');
    }
=======
>>>>>>> bdeae81f (first)
}
