<?php

declare(strict_types=1);

namespace Modules\User\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Modules\Xot\Contracts\ProfileContract;

/**
 * Class DeviceProfile.
 *
 * @property int $id
 * @property int $device_id
 * @property int $user_id
 * @property int $profile_id
 * @property int|null $creator_id
 * @property int|null $updater_id
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \Modules\Xot\Contracts\ProfileContract|null $creator
 * @property-read \Modules\User\Models\Device|null $device
 * @property-read \Modules\User\Models\Profile|null $profile
 * @property-read \Modules\Xot\Contracts\ProfileContract|null $updater
 * @property-read \Modules\Xot\Contracts\ProfileContract|null $user
 *
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DeviceProfile newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DeviceProfile newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DeviceProfile query()
 *
 * @mixin \Eloquent
 */
class DeviceProfile extends BaseModel
{
    /** @var list<string> */
    protected $fillable = [
        'device_id',
        'user_id',
        'profile_id',
        'creator_id',
        'updater_id',
    ];

    /**
     * Get the device that owns the device profile.
     *
     * @return BelongsTo<Device, static>
     */
    public function device(): BelongsTo
    {
        return $this->belongsTo(Device::class);
    }

    /**
     * Get the profile that owns the device profile.
     *
     * @return BelongsTo<Profile, static>
     */
    public function profile(): BelongsTo
    {
        return $this->belongsTo(Profile::class);
    }

    /**
     * Get the user that owns the device profile.
     *
     * @return BelongsTo<Profile, static>
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(Profile::class);
    }

    /**
     * Get the creator of the model.
     *
     * @return BelongsTo<\Illuminate\Database\Eloquent\Model&\Modules\Xot\Contracts\ProfileContract, static>
     */
    public function creator(): BelongsTo
    {
        return $this->belongsTo(Profile::class, 'created_by');
    }

    /**
     * Get the updater of the model.
     *
     * @return BelongsTo<\Illuminate\Database\Eloquent\Model&\Modules\Xot\Contracts\ProfileContract, static>
     */
    public function updater(): BelongsTo
    {
        return $this->belongsTo(Profile::class, 'updated_by');
    }
}
