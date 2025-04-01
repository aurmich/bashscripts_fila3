<?php

declare(strict_types=1);

namespace Modules\Incentivi\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Modules\Incentivi\Enums\ProjectStatus;


/**
 * @property int $id
 * @property string $nome
 * @property string $tipo
 * @property ProjectStatus $stato
 * @property int $workgroup_id
 * @property string $data_aggiudicazione
 * @property string $data_inizio_esecuzione
 * @property string $data_fine_esecuzione
 * @property string $ente_finanziatore
 * @property string $oggetto
 * @property string $determina
 * @property string $percentuale_fondo
 * @property string $importo_totale
 * @property string $importo_effettivo_fondo
 * @property string $componente_incentivante
 * @property string $componente_innovazione
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $updated_by
 * @property string|null $created_by
 * @property \Illuminate\Database\Eloquent\Collection<int, \Modules\Incentivi\Models\Activity> $activities
 * @property int|null $activities_count
 * @property \Modules\Ptv\Models\Profile|null $creator
 * @property \Modules\Ptv\Models\Profile|null $updater
 * @property Workgroup|null $workgroup
 *
 * @method static \Modules\Incentivi\Database\Factories\ProjectFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Project newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Project newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Project query()
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereComponenteIncentivante($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereComponenteInnovazione($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereDataAggiudicazione($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereDataFineEsecuzione($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereDataInizioEsecuzione($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereDetermina($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereEnteFinanziatore($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereImportoEffettivoFondo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereImportoTotale($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereNome($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereOggetto($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project wherePercentualeFondo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereStato($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereTipo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereUpdatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereWorkgroupId($value)
 *
 * @property string $settore
 * @property string $tipo_liquidazione
 * @property \Illuminate\Database\Eloquent\Collection<int, \Modules\Incentivi\Models\Employee> $employees
 * @property int|null $employees_count
 * @property \Illuminate\Database\Eloquent\Collection<int, \Modules\Incentivi\Models\Settlement> $settlements
 * @property int|null $settlements_count
 *
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Project whereSettore($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Project whereTipoLiquidazione($value)
 *
 * @mixin \Eloquent
 */
class Project extends BaseModel
{
    use \Staudenmeir\EloquentHasManyDeep\HasRelationships;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'nome',
        'tipo',
        'stato',
        'workgroup_id',
        'data_aggiudicazione',
        'data_inizio_esecuzione',
        'data_fine_esecuzione',
        'ente_finanziatore',
        'oggetto',
        'determina',
        'percentuale_fondo',
        'importo_totale',
        'importo_effettivo_fondo',
        'componente_incentivante',
        'componente_innovazione',
        'settore',
    ];

    protected $casts = [
        'stato' => ProjectStatus::class,
    ];

    public function activities(): HasMany
    {
        return $this->hasMany(Activity::class);
    }

    public function workgroup(): BelongsTo
    {
        return $this->belongsTo(Workgroup::class);
    }

    public function employees(): HasManyThrough
    {
        return $this->hasManyThrough(
            related: Employee::class,
            through: EmployeeWorkgroup::class,
            firstKey: 'workgroup_id', // foreign key on EmployeeWorkgroup
            secondKey: 'id', // foreign key on EmployeeWorkgroup
            localKey: 'workgroup_id', // local key on Project
            secondLocalKey: 'employee_id' // local key on EmployeeWorkgroup
        );
    }

    public function phases(): HasMany
    {
        return $this->hasMany(Phase::class);
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\Relation
     */
    public function settlements()
    {
        return $this->hasManyDeepFromRelations($this->phases(), (new Phase())->settlement());
    }
}
