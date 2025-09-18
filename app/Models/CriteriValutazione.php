<?php

declare(strict_types=1);

<<<<<<< HEAD
namespace Modules\Progressioni\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Carbon;
use Modules\Xot\Traits\Updater;

/**
 * Modules\Progressioni\Models\CriteriValutazione.
 *
 * @property int $id
 * @property int $parent_id
 * @property string|null $name
=======
namespace Modules\Performance\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Carbon;
use Modules\Performance\Enums\WorkerType;
use Modules\Xot\Traits\Updater;
use Spatie\EloquentSortable\SortableTrait;

/**
 * Modules\Performance\Models\CriteriValutazione.
 *
 * @property int $id
 * @property int $id_padre
 * @property string|null $nome
>>>>>>> 961ad402 (first)
 * @property string|null $label
 * @property string|null $descr
 * @property string|null $post_type
 * @property int|null $posizione
 * @property int|null $anno
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $created_by
 * @property string|null $updated_by
 *
<<<<<<< HEAD
 * @method static \Modules\Progressioni\Database\Factories\CriteriValutazioneFactory factory($count = null, $state = [])
=======
>>>>>>> 961ad402 (first)
 * @method static Builder|CriteriValutazione newModelQuery()
 * @method static Builder|CriteriValutazione newQuery()
 * @method static Builder|CriteriValutazione query()
 * @method static Builder|CriteriValutazione whereAnno($value)
 * @method static Builder|CriteriValutazione whereCreatedAt($value)
 * @method static Builder|CriteriValutazione whereCreatedBy($value)
 * @method static Builder|CriteriValutazione whereDescr($value)
 * @method static Builder|CriteriValutazione whereId($value)
<<<<<<< HEAD
 * @method static Builder|CriteriValutazione whereLabel($value)
 * @method static Builder|CriteriValutazione whereName($value)
 * @method static Builder|CriteriValutazione whereParentId($value)
=======
 * @method static Builder|CriteriValutazione whereIdPadre($value)
 * @method static Builder|CriteriValutazione whereLabel($value)
 * @method static Builder|CriteriValutazione whereNome($value)
>>>>>>> 961ad402 (first)
 * @method static Builder|CriteriValutazione wherePosizione($value)
 * @method static Builder|CriteriValutazione wherePostType($value)
 * @method static Builder|CriteriValutazione whereUpdatedAt($value)
 * @method static Builder|CriteriValutazione whereUpdatedBy($value)
 *
 * @mixin \Eloquent
 */
class CriteriValutazione extends BaseModel
{
<<<<<<< HEAD
    protected $fillable = ['id', 'parent_id', 'name', 'label', 'descr', 'post_type', 'posizione', 'anno'];
=======
    use SortableTrait;

    /** @var array<string, string|bool> */
    public $sortable = [
        'order_column_name' => 'posizione',
        'sort_when_creating' => true,
    ];

    protected $fillable = ['id', 'id_padre', 'nome', 'label', 'descr', 'posizione', 'anno'];
>>>>>>> 961ad402 (first)

    protected $table = 'criteri_valutazione';

    // use Updater;
    // protected $connection = 'performance'; // this will use the specified database connection
    // public $timestamps= false;
    /*
    protected $dates = [
        'created_at',
        'updated_at',
        ];
    */
<<<<<<< HEAD
=======

    /** @return array<string, string>  */
    public function casts(): array
    {
        return [
            'post_type' => WorkerType::class,
        ];
    }
>>>>>>> 961ad402 (first)
}
