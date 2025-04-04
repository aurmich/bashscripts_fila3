<?php

declare(strict_types=1);

namespace Modules\User\Models;

use Filament\Models\Contracts\HasName;
use Filament\Models\Contracts\HasTenants;
use Filament\Panel;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\DatabaseNotification;
use Illuminate\Notifications\DatabaseNotificationCollection;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;
use Laravel\Passport\HasApiTokens;
use Modules\User\Database\Factories\UserFactory;
use Modules\User\Models\Traits\HasTeams;
use Modules\Xot\Contracts\UserContract;
use Modules\Xot\Datas\XotData;
use Modules\Xot\Models\Traits\RelationX;
use Spatie\Permission\Traits\HasRoles;
use Modules\User\Models\Team;
use Modules\User\Models\Role;
use Modules\User\Models\AuthenticationLog;
use Modules\User\Models\Device;
use Modules\User\Models\SocialiteUser;

/**
 * Modules\User\Models\BaseUser
 *
 * @property string $id
 * @property string|null $name
 * @property string|null $first_name
 * @property string|null $last_name
 * @property string|null $email
 * @property string|null $password
 * @property string|null $remember_token
 * @property string|null $current_team_id
 * @property bool|null $is_active
 * @property bool|null $is_otp
 * @property \DateTime|null $password_expires_at
 * @property \DateTime|null $email_verified_at
 * @property \DateTime|null $created_at
 * @property \DateTime|null $updated_at
 * @property \DateTime|null $deleted_at
 * @property string|null $created_by
 * @property string|null $updated_by
 * @property string|null $deleted_by
 * @property string|null $profile_photo_path
 * @property \Illuminate\Database\Eloquent\Relations\Pivot|null $pivot
 * @property-read Collection<int, Role> $roles
 * @property-read Collection<int, Team> $teams
 * @property-read Collection<int, Team> $ownedTeams
 * @property-read Team|null $currentTeam
 * @property-read Collection<int, Device> $devices
 * @property-read Collection<int, SocialiteUser> $socialiteUsers
 * @property-read Collection<int, AuthenticationLog> $authentications
 */
abstract class BaseUser extends Authenticatable implements HasName, HasTenants, UserContract
{
    /* , HasAvatar, UserJetContract, ExportsPersonalData */
    /* , HasTeamsContract */
    use HasApiTokens;
    use HasFactory;

    // use TwoFactorAuthenticatable; //ArtMin96
    // use CanExportPersonalData; //ArtMin96
    use HasRoles;

    // use HasProfilePhoto; //ArtMin96
    // use HasTeams; //ArtMin96
    use HasTeams;
    use HasUuids;

    // use Traits\HasProfilePhoto;
    use Notifiable;
    use RelationX;
    use Traits\HasAuthenticationLogTrait;
    use Traits\HasTenants;

    public $incrementing = false;

    /** @var string */
    protected $connection = 'user';

    /** @var string */
    protected $primaryKey = 'id';

    /** @var string */
    protected $keyType = 'string';

    /** @var list<string> */
    protected $fillable = [
        'id',
        'name',
        'first_name',
        'last_name',
        'email',
        'password',
        'lang',
        'current_team_id',
        'is_active',
        'is_otp', // is One Time Password
        'password_expires_at',
    ];

    /** @var list<string> */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /** @var list<string> */
    protected $with = [
        'roles',
    ];

    /** @var list<string> */
    protected $appends = [
        // 'profile_photo_url',
    ];

    protected $pivot;

    public function canAccessFilament(?Panel $panel = null): bool
    {
        // return $this->role_id === Role::ROLE_ADMINISTRATOR;
        return true;
    }

    /**
     * Get the user's name for Filament.
     *
     * @return string
     */
    public function getFilamentName(): string
    {
        /** @var string|null */
        $name = $this->getAttribute('name');
        
        /** @var string|null */
        $firstName = $this->getAttribute('first_name');
        
        /** @var string|null */
        $lastName = $this->getAttribute('last_name');
        
        return trim(sprintf(
            '%s %s %s',
            $name ?? '',
            $firstName ?? '',
            $lastName ?? '',
        ));
    }

    public function profile(): HasOne
    {
        /** @var class-string<Model> */
        $profileClass = XotData::make()->getProfileClass();

        return $this->hasOne($profileClass);
    }

    public function canAccessPanel(Panel $panel): bool
    {
        // $panel->default('admin');
        if ($panel->getId() !== 'admin') {
            $role = $panel->getId();
            /*
            $xot = XotData::make();
            if ($xot->super_admin === $this->email) {
                $role = Role::firstOrCreate(['name' => $role]);
                $this->assignRole($role);
            }
            */

            return $this->hasRole($role);
        }

        return true; // str_ends_with($this->email, '@yourdomain.com') && $this->hasVerifiedEmail();
    }

    public function canAccessSocialite(): bool
    {
        return true;
    }

    public function detach(Model $model): void
    {
        // @phpstan-ignore function.alreadyNarrowedType
        if (method_exists($this, 'teams')) {
            // @phpstan-ignore function.alreadyNarrowedType
            $this->teams()->detach($model);
        }
    }

    public function attach(Model $model): void
    {
        // @phpstan-ignore function.alreadyNarrowedType
        if (method_exists($this, 'teams')) {
            // @phpstan-ignore function.alreadyNarrowedType
            $this->teams()->attach($model);
        }
    }

    public function treeLabel(): string
    {
        return strval($this->name ?? $this->email);
    }

    public function treeSons(): Collection
    {
        return $this->teams ?? new Collection();
    }

    public function treeSonsCount(): int
    {
        return $this->teams()->count();
    }

    /**
     * Get the user instance.
     *
     * @return \Modules\Xot\Contracts\UserContract
     */
    public function user(): \Modules\Xot\Contracts\UserContract
    {
        return $this->user ?? $this;
    }

    public function devices(): BelongsToMany
    {
        return $this
            ->belongsToManyX(Device::class);
    }

    public function socialiteUsers(): HasMany
    {
        return $this
            ->hasMany(SocialiteUser::class);
    }

    public function getProviderField(string $provider, string $field): string
    {
        $socialiteUser = $this->socialiteUsers()->firstWhere(['provider' => $provider]);
        if ($socialiteUser == null) {
            throw new \Exception('SocialiteUser not found');
        }

        $res = $socialiteUser->{$field};
        return (string) $res;
    }

    /**
     * Get the entity's notifications.
     *
     * @return MorphMany<Notification, static|$this>
     */
    public function notifications(): MorphMany
    {
        // @phpstan-ignore return.type
        return $this->morphMany(Notification::class, 'notifiable');
    }

    /**
     * Get the user's latest authentication log.
     *
     * @return MorphOne<AuthenticationLog, static>
     */
    public function latestAuthentication(): MorphOne
    {
        // @phpstan-ignore return.type
        return $this->morphOne(AuthenticationLog::class, 'authenticatable')
            ->latestOfMany();
    }

    public function getFullNameAttribute(?string $value): ?string
    {
        return $value ?? $this->first_name.' '.$this->last_name;
    }

    public function getNameAttribute(?string $value): ?string
    {
        if ($value !== null || $this->getKey() === null) {
            return $value;
        }
        $name = Str::of((string) $this->email)->before('@')->toString();
        $i = 1;
        $value = $name.'-'.$i;
        while (self::firstWhere(['name' => $value]) !== null) {
            $i++;
            $value = $name.'-'.$i;
        }
        $this->update(['name' => $value]);

        return $value;
    }

    /**
     * Create a new factory instance for the model.
     *
     * @return Factory
     */
    protected static function newFactory()
    {
        return UserFactory::new();
    }

    /** @return array<string, string> */
    protected function casts(): array
    {
        return [
            'id' => 'string',
            'email_verified_at' => 'datetime',
            // 'password' => 'hashed', //Call to undefined cast [hashed] on column [password] in model [Modules\User\Models\User].
            'is_active' => 'boolean',
            'roles.pivot.id' => 'string',
            // https://github.com/beitsafe/laravel-uuid-auditing
            // ALTER TABLE model_has_role CHANGE COLUMN `id` `id` CHAR(37) NOT NULL DEFAULT uuid();

            'is_otp' => 'boolean',
            'password_expires_at' => 'datetime',

            'created_at' => 'datetime',
            'updated_at' => 'datetime',
            'deleted_at' => 'datetime',

            'updated_by' => 'string',
            'created_by' => 'string',
            'deleted_by' => 'string',
        ];
    }

    /**
     * Check if the user has teams.
     */
    public function hasTeams(): bool
    {
        return true;
    }

    /**
     * Check if the user belongs to any teams.
     */
    public function belongsToTeams(): bool
    {
        return true;
    }

    public function hasRole($role, ?string $guard = null): bool
    {
        return once(function () use ($role) {
            return $this->roles()->where('name', $role)->exists();
        });
    }

    

   

    

    public function authentications(): MorphMany
    {
        return $this->morphMany(\Modules\User\Models\Authentication::class, 'authenticatable');
    }

    public function getEmailForVerification(): string
    {
        return strval($this->email);
    }
}
