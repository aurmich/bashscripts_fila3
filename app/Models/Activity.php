<?php

declare(strict_types=1);

<<<<<<< HEAD
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
=======
namespace Modules\Activity\Models;

/**
 * Class Activity.
 * 
 * This class extends the BaseActivity model to represent activities in the application.
 *
 * @property int $id
 * @property string|null $log_name
 * @property string $description
 * @property string|null $subject_type
 * @property int|null $subject_id
 * @property string|null $causer_type
 * @property string $causer_id
 * @property \Illuminate\Support\Collection<array-key, mixed>|null $properties
 * @property string|null $batch_uuid
 * @property string|null $event
>>>>>>> 793bd7f9 (Squashed 'laravel/Modules/Activity/' content from commit 40cd7abb1)
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $updated_by
 * @property string|null $created_by
<<<<<<< HEAD
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
            ->belongsToMany(Employee::class)
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
=======
 * @property string|null $deleted_at
 * @property string|null $deleted_by
 * @property-read \Illuminate\Database\Eloquent\Model|\Eloquent $causer
 * @property-read \Illuminate\Support\Collection $changes
 * @property-read \Illuminate\Database\Eloquent\Model|\Eloquent|null $subject
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Activity causedBy(\Illuminate\Database\Eloquent\Model $causer)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Activity forBatch(string $batchUuid)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Activity forEvent(string $event)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Activity forSubject(\Illuminate\Database\Eloquent\Model $subject)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Activity hasBatch()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Activity inLog(...$logNames)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Activity newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Activity newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Activity query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Activity whereBatchUuid($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Activity whereCauserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Activity whereCauserType($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Activity whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Activity whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Activity whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Activity whereDeletedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Activity whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Activity whereEvent($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Activity whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Activity whereLogName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Activity whereProperties($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Activity whereSubjectId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Activity whereSubjectType($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Activity whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Activity whereUpdatedBy($value)
 * @mixin \Eloquent
 */
class Activity extends BaseActivity
{
    /** @var list<string> */
    protected $fillable = [
        'id',
        'log_name',
        'description',
        'subject_type',
        'event',
        'subject_id',
        'causer_type',
        'causer_id',
        'properties',
        'batch_uuid',
        'created_at',
        'updated_at',
    ];

    protected $connection = 'activity';

    // Additional methods or relationships can be defined here as needed
>>>>>>> 793bd7f9 (Squashed 'laravel/Modules/Activity/' content from commit 40cd7abb1)
}
