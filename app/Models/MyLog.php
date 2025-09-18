<?php

declare(strict_types=1);

<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
namespace Modules\IndennitaCondizioniLavoro\Models;
=======
namespace Modules\IndennitaResponsabilita\Models;
>>>>>>> e0005d7d (first)

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Carbon;
use Modules\Ptv\Models\MyLog as PtvMyLogModel;

/**
<<<<<<< HEAD
 * Modules\IndennitaCondizioniLavoro\Models\MyLog.
=======
 * Modules\IndennitaResponsabilita\Models\MyLog.
>>>>>>> e0005d7d (first)
=======
namespace Modules\Progressioni\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Carbon;

/**
 * Modules\Progressioni\Models\MyLog.
>>>>>>> bcab6efe (first)
=======
namespace Modules\Performance\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Carbon;
use Modules\Xot\Traits\Updater;

/**
 * Modules\Performance\Models\MyLog.
>>>>>>> 961ad402 (first)
=======
namespace Modules\Ptv\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\Xot\Traits\Updater;

/**
 * Modules\Ptv\Models\MyLog.
 *
 * @method static \Modules\Ptv\Database\Factories\MyLogFactory factory($count = null, $state = [])
 * @method static Builder|MyLog newModelQuery()
 * @method static Builder|MyLog newQuery()
 * @method static Builder|MyLog query()
>>>>>>> dc18abbe (first)
 *
 * @property int $id
 * @property int|null $id_tbl
 * @property string|null $tbl
 * @property int|null $id_approvaz
 * @property string|null $note
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> dc18abbe (first)
 * @property string|null $obj
 * @property string|null $act
 * @property array|null $data
 * @property string|null $datemod
 * @property string|null $handle
<<<<<<< HEAD
<<<<<<< HEAD
=======
 * @property array|null $data
 * @property string|null $datemod
 * @property string|null $handle
>>>>>>> 961ad402 (first)
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $created_by
 * @property string|null $updated_by
<<<<<<< HEAD
 * @property string|null $deleted_at
 * @property string|null $deleted_by
 * @property string|null $deleted_ip
 * @property string|null $created_ip
 * @property string|null $updated_ip
=======
 * @property string|null $created_by
 * @property string|null $updated_by
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
>>>>>>> bcab6efe (first)
 *
 * @method static \Modules\Ptv\Database\Factories\MyLogFactory factory($count = null, $state = [])
 * @method static Builder|MyLog newModelQuery()
 * @method static Builder|MyLog newQuery()
 * @method static Builder|MyLog query()
 * @method static Builder|MyLog whereAct($value)
 * @method static Builder|MyLog whereCreatedAt($value)
 * @method static Builder|MyLog whereCreatedBy($value)
<<<<<<< HEAD
 * @method static Builder|MyLog whereCreatedIp($value)
 * @method static Builder|MyLog whereData($value)
 * @method static Builder|MyLog whereDatemod($value)
 * @method static Builder|MyLog whereDeletedAt($value)
 * @method static Builder|MyLog whereDeletedBy($value)
 * @method static Builder|MyLog whereDeletedIp($value)
=======
 * @method static Builder|MyLog whereData($value)
 * @method static Builder|MyLog whereDatemod($value)
>>>>>>> bcab6efe (first)
=======
 *
 * @method static Builder|MyLog newModelQuery()
 * @method static Builder|MyLog newQuery()
 * @method static Builder|MyLog query()
 * @method static Builder|MyLog whereCreatedAt($value)
 * @method static Builder|MyLog whereCreatedBy($value)
 * @method static Builder|MyLog whereData($value)
 * @method static Builder|MyLog whereDatemod($value)
>>>>>>> 961ad402 (first)
=======
 * @property string|null $post_type
 * @property int|null $post_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $created_by
 * @property string|null $updated_by
 *
 * @method static Builder|MyLog whereAct($value)
 * @method static Builder|MyLog whereCreatedAt($value)
 * @method static Builder|MyLog whereCreatedBy($value)
 * @method static Builder|MyLog whereData($value)
 * @method static Builder|MyLog whereDatemod($value)
>>>>>>> dc18abbe (first)
 * @method static Builder|MyLog whereHandle($value)
 * @method static Builder|MyLog whereId($value)
 * @method static Builder|MyLog whereIdApprovaz($value)
 * @method static Builder|MyLog whereIdTbl($value)
 * @method static Builder|MyLog whereNote($value)
<<<<<<< HEAD
<<<<<<< HEAD
 * @method static Builder|MyLog whereObj($value)
 * @method static Builder|MyLog whereTbl($value)
 * @method static Builder|MyLog whereUpdatedAt($value)
 * @method static Builder|MyLog whereUpdatedBy($value)
<<<<<<< HEAD
 * @method static Builder|MyLog whereUpdatedIp($value)
 *
 * @mixin \Eloquent
 */
class MyLog extends PtvMyLogModel
{
<<<<<<< HEAD
    protected $connection = 'indennita_condizioni_lavoro'; // this will use the specified database connection
=======
    protected $connection = 'indennita_responsabilita'; // this will use the specified database connection

    // -------------------------------------------------
>>>>>>> e0005d7d (first)
=======
 *
 * @mixin \Eloquent
 */
class MyLog extends \Modules\Ptv\Models\MyLog
{
    protected $connection = 'progressione'; // this will use the specified database connection
>>>>>>> bcab6efe (first)
=======
 * @method static Builder|MyLog whereTbl($value)
 * @method static Builder|MyLog whereUpdatedAt($value)
 * @method static Builder|MyLog whereUpdatedBy($value)
 *
 * @mixin \Eloquent
 */
class MyLog extends BaseModel
{
=======
 * @method static Builder|MyLog whereObj($value)
 * @method static Builder|MyLog wherePostId($value)
 * @method static Builder|MyLog wherePostType($value)
 * @method static Builder|MyLog whereTbl($value)
 * @method static Builder|MyLog whereUpdatedAt($value)
 * @method static Builder|MyLog whereUpdatedBy($value)
 *
 * @property-read \Modules\Ptv\Models\Profile|null $creator
 * @property-read \Modules\Ptv\Models\Profile|null $updater
 *
 * @mixin \Eloquent
 */
class MyLog extends Model
{
    use HasFactory;
    use Updater;

    protected $table = 'mylog';

    // public $timestamps= false;
>>>>>>> dc18abbe (first)
    protected $fillable = [
        'id',
        'id_tbl',
        'tbl',
        'id_approvaz',
        'note',
<<<<<<< HEAD
        'data',
        'datemod',
        'handle',
        'act',
        'model_id',
        'model_type',
    ];

    protected $table = 'mylog';

    // use Updater;

    // protected $connection = 'performance'; // this will use the specified database connection
    // public $timestamps= false;
    /*
    protected $dates = [
        'created_at',
        'updated_at',
    ];
    */

    protected $casts = [
        'data' => 'array',
    ];

    public function _data()
    {
        // echo '<pre>';print_r($obj);echo '</pre>';die();
        return unserialize($this->data);
    }

    // -------------------------------------------------
>>>>>>> 961ad402 (first)
=======
        'obj',
        'act',
        'data',
        'datemod',
        'handle',
    ];

    public function casts(): array
    {
        return [

            'data' => 'array',
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
            'deleted_at' => 'datetime',

        ];
    }

    public function _data(): array|object
    {
        // echo '<pre>';print_r($obj);echo '</pre>';die();
        return unserialize($this->getAttribute('data'));
    }

    // -------------------------------------------------
    /**
     * Create a new factory instance for the model.
     */
    protected static function newFactory(): Factory
    {
        // static o self
        return app(\Modules\Xot\Actions\Factory\GetFactoryAction::class)->execute(static::class);
    }
>>>>>>> dc18abbe (first)
}
