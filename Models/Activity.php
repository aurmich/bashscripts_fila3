<?php
/**
 * ---.
 */

declare(strict_types=1);

namespace Modules\Activity\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder as EloquentBuilder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Spatie\Activitylog\Models\Activity as SpatieActivity;

/**
 * Modules\Activity\Models\Activity.
 *
 * @property int $id
 * @property string|null $log_name
 * @property string $description
 * @property string|null $subject_type
 * @property int|null $subject_id
 * @property string|null $causer_type
 * @property int|null $causer_id
 * @property Collection|null $properties
 * @property string|null $batch_uuid
 * @property string|null $event
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> 5d7c9b9 (Fixed typo in Activity model.)
 * @property string|null $created_by
 * @property string|null $updated_by
 * @property Model|Eloquent $causer
 * @property Collection $changes
 * @property Model|Eloquent $subject
 *
 * @method static EloquentBuilder|Activity causedBy(\Illuminate\Database\Eloquent\Model $causer)
 * @method static EloquentBuilder|Activity forBatch(string $batchUuid)
 * @method static EloquentBuilder|Activity forEvent(string $event)
 * @method static EloquentBuilder|Activity forSubject(\Illuminate\Database\Eloquent\Model $subject)
 * @method static EloquentBuilder|Activity hasBatch()
 * @method static EloquentBuilder|Activity inLog(...$logNames)
<<<<<<< HEAD
=======
 * @property string|null                     $created_by
 * @property string|null                     $updated_by
 * @property Model|\Eloquent                 $causer
 * @property Collection                      $changes
 * @property Model|\Eloquent                 $subject
 *
 * @method static Builder|Activity                               causedBy(\Illuminate\Database\Eloquent\Model $causer)
 * @method static Builder|Activity                               forBatch(string $batchUuid)
 * @method static Builder|Activity                               forEvent(string $event)
 * @method static Builder|Activity                               forSubject(\Illuminate\Database\Eloquent\Model $subject)
 * @method static Builder|Activity                               hasBatch()
 * @method static Builder|Activity                               inLog(...$logNames)
>>>>>>> 7352755 (up)
=======
>>>>>>> 5d7c9b9 (Fixed typo in Activity model.)
 * @method static \Illuminate\Database\Eloquent\Builder|Activity newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Activity newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Activity query()
 * @method static \Illuminate\Database\Eloquent\Builder|Activity whereBatchUuid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Activity whereCauserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Activity whereCauserType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Activity whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Activity whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Activity whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Activity whereEvent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Activity whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Activity whereLogName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Activity whereProperties($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Activity whereSubjectId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Activity whereSubjectType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Activity whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Activity whereUpdatedBy($value)
 *
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> 5d7c9b9 (Fixed typo in Activity model.)
 * @property Model|Eloquent $causer
 * @property Collection $changes
 * @property Model|Eloquent $subject
 *
 * @method static EloquentBuilder|Activity causedBy(\Illuminate\Database\Eloquent\Model $causer)
 * @method static EloquentBuilder|Activity forBatch(string $batchUuid)
 * @method static EloquentBuilder|Activity forEvent(string $event)
 * @method static EloquentBuilder|Activity forSubject(\Illuminate\Database\Eloquent\Model $subject)
 * @method static EloquentBuilder|Activity hasBatch()
 * @method static EloquentBuilder|Activity inLog(...$logNames)
 * @method static \Illuminate\Database\Eloquent\Builder|Activity newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Activity newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Activity query()
<<<<<<< HEAD
<<<<<<< HEAD
 *
 * @property string|null $deleted_at
 * @property string|null $deleted_by
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Activity whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Activity whereDeletedBy($value)
 *
=======
=======
 * @property Model|\Eloquent $causer
 * @property Collection      $changes
 * @property Model|\Eloquent $subject
 *
 * @method static Builder|Activity                               causedBy(\Illuminate\Database\Eloquent\Model $causer)
 * @method static Builder|Activity                               forBatch(string $batchUuid)
 * @method static Builder|Activity                               forEvent(string $event)
 * @method static Builder|Activity                               forSubject(\Illuminate\Database\Eloquent\Model $subject)
 * @method static Builder|Activity                               hasBatch()
 * @method static Builder|Activity                               inLog(...$logNames)
 * @method static \Illuminate\Database\Eloquent\Builder|Activity newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Activity newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Activity query()
 *
>>>>>>> 7352755 (up)
=======
 *
>>>>>>> 5d7c9b9 (Fixed typo in Activity model.)
 * @property string|null $deleted_at
 * @property string|null $deleted_by
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Activity whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Activity whereDeletedBy($value)
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> 67f9cf7 (up)
=======
 *
>>>>>>> 7352755 (up)
=======
 *
>>>>>>> 5d7c9b9 (Fixed typo in Activity model.)
 * @mixin \Eloquent
 * @mixin Eloquent
 */
class Activity extends SpatieActivity
{
    /**
     * @var array<string>
     *
     * @psalm-var list{'id', 'log_name', 'description', 'subject_type', 'event', 'subject_id', 'causer_type', 'causer_id', 'properties', 'batch_uuid', 'created_at', 'updated_at'}
     */
    protected $fillable = ['id', 'log_name', 'description', 'subject_type', 'event', 'subject_id', 'causer_type', 'causer_id', 'properties', 'batch_uuid', 'created_at', 'updated_at'];

<<<<<<< HEAD
    // /**
    //  * @var array<string>
    //  *
    //  * @psalm-var list{'field_name'}
    //  */
    // protected $attributes = [
    //     'field_name',
    // ];
=======
    /**
     * @var array<string>
     *
     * @psalm-var list{'field_name'}
     */
    protected $attributes = [
        'field_name',
    ];
>>>>>>> 7352755 (up)

    /** @var string */
    protected $connection = 'activity';
}