<?php

declare(strict_types=1);

namespace Modules\Incentivi\Models;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Modules\Xot\Enums\GenderEnum;

/**
 * @property int $id
 * @property string $matricola
 * @property string $cognome
 * @property string $nome
 * @property GenderEnum $sesso
 * @property string $codice_fiscale
 * @property string $posizione_inail
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $updated_by
 * @property string|null $created_by
 * @property \Illuminate\Database\Eloquent\Collection<int, \Modules\Incentivi\Models\Activity> $activities
 * @property int|null $activities_count
 * @property \Modules\Ptv\Models\Profile|null $creator
 * @property \Modules\Ptv\Models\Profile|null $updater
 * @property \Illuminate\Database\Eloquent\Collection<int, \Modules\Incentivi\Models\Workgroup> $workgroups
 * @property int|null $workgroups_count
 * @property string $tipologia
 * @property-read \Modules\Incentivi\Models\EmployeeWorkgroup|\Modules\Incentivi\Models\ActivityEmployee|null $pivot
 * @property-read string|null $full_name
 *
 * @method static \Modules\Incentivi\Database\Factories\EmployeeFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Employee newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Employee newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Employee query()
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereCodiceFiscale($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereCognome($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereMatricola($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereNome($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee wherePosizioneInail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereSesso($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereUpdatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Employee ofWorkgroupId(int $workgroup_id)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Employee whereTipologia($value)
 *
 * @mixin \Eloquent
 */
class Employee extends BaseModel
{


    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = ['matricola', 'cognome', 'nome', 'sesso', 'codice_fiscale', 'posizione_inail', 'tipologia'];

    /**
     * The accessors to append to the model's array form.
     *
     * @var list<string>
     */
    protected $appends = ['full_name'];

    /**
     * Casts the model's attributes.
     */
    public function casts(): array
    {
        return [
            'sesso' => GenderEnum::class,
        ];
    }

    /**
     * Get the activities for the employee.
     */
    public function activities(): BelongsToMany
    {
        return $this->belongsToManyX(Activity::class);
    }

    /**
     * Get the workgroups for the employee.
     */
    public function workgroups(): BelongsToMany
    {
        return $this->belongsToManyX(Workgroup::class);
    }

    /**
     * Scope a query to only include employees of a given workgroup.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     */
    public function scopeOfWorkgroupId($query, int $workgroup_id): void
    {
        // $query->where('type', $type);
    }

    /**
     * Get the employee's full name.
     */
    public function getFullNameAttribute(?string $value): ?string
    {
        return "$this->cognome $this->nome";
    }
}
