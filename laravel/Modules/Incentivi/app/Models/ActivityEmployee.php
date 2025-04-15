<?php

declare(strict_types=1);

namespace Modules\Incentivi\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property string $id
 * @property int $activity_id
 * @property int $employee_id
 * @property int|null $project_id
 * @property int $percentuale_attivita_dipendente
 * @property string $importo_attivita_dipendente
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $updated_by
 * @property string|null $created_by
 * @property \Modules\Ptv\Models\Profile|null $creator
 * @property \Modules\Ptv\Models\Profile|null $updater
 *
 * @method static \Illuminate\Database\Eloquent\Builder|ActivityEmployee newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ActivityEmployee newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ActivityEmployee query()
 * @method static \Illuminate\Database\Eloquent\Builder|ActivityEmployee whereActivityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ActivityEmployee whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ActivityEmployee whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ActivityEmployee whereEmployeeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ActivityEmployee whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ActivityEmployee whereImportoAttivitaDipendente($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ActivityEmployee wherePercentualeAttivitaDipendente($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ActivityEmployee whereProjectId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ActivityEmployee whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ActivityEmployee whereUpdatedBy($value)
 *
 * @property-read \Modules\Incentivi\Models\Activity $activity
 * @property-read \Modules\Incentivi\Models\Employee $employee
 *
 * @mixin \Eloquent
 */
class ActivityEmployee extends BasePivot
{
    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'activity_id',
        'employee_id',
        'project_id',
        'percentuale_attivita_dipendente',
        'importo_attivita_dipendente',
    ];

    public function activity(): BelongsTo
    {
        return $this->belongsTo(Activity::class);
    }

    public function employee(): BelongsTo
    {
        return $this->belongsTo(Employee::class);
    }
}
