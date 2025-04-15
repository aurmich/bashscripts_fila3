<?php

declare(strict_types=1);

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
 *
 * @property int $id
 * @property int|null $id_tbl
 * @property string|null $tbl
 * @property int|null $id_approvaz
 * @property string|null $note
 * @property string|null $obj
 * @property string|null $act
 * @property array|null $data
 * @property string|null $datemod
 * @property string|null $handle
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
 * @method static Builder|MyLog whereHandle($value)
 * @method static Builder|MyLog whereId($value)
 * @method static Builder|MyLog whereIdApprovaz($value)
 * @method static Builder|MyLog whereIdTbl($value)
 * @method static Builder|MyLog whereNote($value)
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
    protected $fillable = [
        'id',
        'id_tbl',
        'tbl',
        'id_approvaz',
        'note',
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
}
