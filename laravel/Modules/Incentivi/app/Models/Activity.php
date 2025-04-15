<?php

declare(strict_types=1);

namespace Modules\Incentivi\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * @property int $id
 * @property string $nome
 * @property string $tipo
 * @property int $quota_percentuale
 * @property int|null $importo
 * @property string $anno_competenza
 * @property int|null $project_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $updated_by
 * @property string|null $created_by
 * @property \Modules\Ptv\Models\Profile|null $creator
 * @property ActivityEmployee $pivot
 * @property \Illuminate\Database\Eloquent\Collection<int, \Modules\Incentivi\Models\Employee> $employees
 * @property int|null $employees_count
 * @property Project|null $project
 * @property \Modules\Ptv\Models\Profile|null $updater
 *
 * @method static \Modules\Incentivi\Database\Factories\ActivityFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Activity newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Activity newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Activity query()
 * @method static \Illuminate\Database\Eloquent\Builder|Activity whereAnnoCompetenza($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Activity whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Activity whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Activity whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Activity whereImporto($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Activity whereNome($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Activity whereProjectId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Activity whereQuotaPercentuale($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Activity whereTipo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Activity whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Activity whereUpdatedBy($value)
 *
 * @property int $appartiene_a_liquidazione_a_fasi
 * @property string|null $liquidazione_fasi
 * @property-read int|null $workgroup_id
 *
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Activity whereAppartieneALiquidazioneAFasi($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Activity whereLiquidazioneFasi($value)
 *
 * @mixin \Eloquent
 */
class Activity extends BaseModel
{
    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'nome',
        'tipo',
        'quota_percentuale',
        'importo',
        'anno_competenza',
        'appartiene_a_liquidazione_a_fasi',
        'liquidazione_fasi',
        'project_id',
    ];

    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }

    public function employees(): BelongsToMany
    {
        /*
        $pivot_class = ActivityEmployee::class;
        $pivot = app($pivot_class);
        $pivot_fields = $pivot->getFillable();

        return $this
            ->belongsToManyX(Employee::class)
            ->using($pivot_class)
            ->withPivot($pivot_fields)
            ->withTimestamps();
            */
        return $this
            ->belongsToManyX(Employee::class);
    }

    // mutators

    public function getWorkgroupIdAttribute(?int $value): ?int
    {
        if ($value != null) {
            return $value;
        }

        // dddx($this->project);
        return $this->project?->workgroup_id;
    }
}
