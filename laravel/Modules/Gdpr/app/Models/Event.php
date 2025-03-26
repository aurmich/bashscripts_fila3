<?php

/**
 * @see https://github.com/foothing/laravel-gdpr-consent
 */

declare(strict_types=1);

namespace Modules\Gdpr\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Crypt;
use Modules\Xot\Contracts\ProfileContract;

use function Safe\json_encode;

/**
 * Modules\Gdpr\Models\Event.
 *
 * @property string                          $id
 * @property string|null                     $treatment_id
 * @property string|null                     $consent_id
 * @property string                          $subject_id
 * @property string                          $ip
 * @property string                          $action
 * @property string                          $payload
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null                     $updated_by
 * @property string|null                     $created_by
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property string|null                     $deleted_by
 * @property Consent|null                    $consent
 * @property ProfileContract|null            $creator
 * @property ProfileContract|null            $updater
 *
 * @method static \Modules\Gdpr\Database\Factories\EventFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Event   newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Event   newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Event   query()
 * @method static \Illuminate\Database\Eloquent\Builder|Event   whereAction($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event   whereConsentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event   whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event   whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event   whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event   whereDeletedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event   whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event   whereIp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event   wherePayload($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event   whereSubjectId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event   whereTreatmentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event   whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event   whereUpdatedBy($value)
 *
 * @mixin \Eloquent
 */
class Event extends BaseModel
{
    use HasUuids;

    // protected $table = 'event';

    /** @var list<string> */
    public $fillable = [
        'id',
        'action',
        'treatment_id',
        'consent_id',
        'subject_id',
        'payload',
        'ip'
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    public function casts(): array
    {
        return [
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
            'deleted_at' => 'datetime',
        ];
    }

    /**
     * Get the consent that owns the event.
     */
    public function consent(): BelongsTo
    {
        return $this->belongsTo(Consent::class);
    }

    /**
     * Set the payload attribute.
     */
    public function setPayloadAttribute(?string $value): void
    {
        $this->attributes['payload'] = Crypt::encrypt(json_encode($value, JSON_THROW_ON_ERROR));
    }

    /**
     * Set the ip attribute.
     */
    public function setIpAttribute(?string $value): void
    {
        $this->attributes['ip'] = Crypt::encrypt($value);
    }
}
