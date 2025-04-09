<?php

declare(strict_types=1);

/**
 * @see https://github.com/rappasoft/laravel-authentication-log/blob/main/src/Models/AuthenticationLog.php
 */

namespace Modules\User\Models;

use Illuminate\Database\Eloquent\Relations\MorphTo;

/**
 * Class AuthenticationLog.
 *
 * @property int $id
 * @property string $authenticatable_type
 * @property string|null $device
 * @property string|null $platform
 * @property int $authenticatable_id
 * @property string|null $ip_address
 * @property string|null $user_agent
 * @property \Illuminate\Support\Carbon|null $login_at
 * @property bool $login_successful
 * @property \Illuminate\Support\Carbon|null $logout_at
 * @property bool $cleared_by_user
 * @property array|null $location
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $updated_by
 * @property string|null $created_by
 * @property-read \Illuminate\Database\Eloquent\Model|\Eloquent $authenticatable
 * @property-read \Modules\Xot\Contracts\ProfileContract|null $creator
 * @property-read \Modules\Xot\Contracts\ProfileContract|null $updater
 *
 * @method static \Modules\User\Database\Factories\AuthenticationLogFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AuthenticationLog newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AuthenticationLog newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AuthenticationLog query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AuthenticationLog whereAuthenticatableId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AuthenticationLog whereAuthenticatableType($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AuthenticationLog whereClearedByUser($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AuthenticationLog whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AuthenticationLog whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AuthenticationLog whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AuthenticationLog whereIpAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AuthenticationLog whereLocation($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AuthenticationLog whereLoginAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AuthenticationLog whereLoginSuccessful($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AuthenticationLog whereLogoutAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AuthenticationLog whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AuthenticationLog whereUpdatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AuthenticationLog whereUserAgent($value)
 *
 * @mixin \Eloquent
 */
class AuthenticationLog extends BaseModel
{
    // public $timestamps = false;

    // protected $table = 'authentication_log';

    /** @var list<string> */
    protected $fillable = [
        'ip_address',
        'user_agent',
        'login_at',
        'login_successful',
        'logout_at',
        'cleared_by_user',
        'location',
        'device',
        'platform',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'cleared_by_user' => 'boolean',
            'location' => 'array',
            'login_successful' => 'boolean',
            'login_at' => 'datetime',
            'logout_at' => 'datetime',
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
        ];
    }

    // public function __construct(array $attributes = [])
    // {
    // if (! isset($this->connection)) {
    //    $this->setConnection(config('authentication-log.db_connection'));
    // }

    //    parent::__construct($attributes);
    // }

    // public function getTable()
    // {
    //    return config('authentication-log.table_name', parent::getTable());
    // }

    /**
     * Get the parent authenticatable model.
     *
     * @return MorphTo<\Illuminate\Database\Eloquent\Model, static>
     */
    public function authenticatable(): MorphTo
    {
        return $this->morphTo();
    }
}
