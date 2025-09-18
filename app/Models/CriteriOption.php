<?php

declare(strict_types=1);

<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> f3d4311a (Squashed 'laravel/Modules/Progressioni/' content from commit 72d99eef1)
namespace Modules\Progressioni\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Carbon;

/**
 * Modules\Progressioni\Models\CriteriOption.
 *
 * @property int $id
 * @property string|null $name
 * @property string|Carbon|\Carbon\Carbon|null $value
 * @property string|null $type
<<<<<<< HEAD
=======
namespace Modules\Performance\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Carbon;
use Modules\Xot\Traits\Updater;

/**
 * Modules\Performance\Models\CriteriOption.
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $value
>>>>>>> 961ad402 (first)
=======
>>>>>>> f3d4311a (Squashed 'laravel/Modules/Progressioni/' content from commit 72d99eef1)
 * @property int|null $anno
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $created_by
 * @property string|null $updated_by
 *
<<<<<<< HEAD
<<<<<<< HEAD
 * @method static \Modules\Progressioni\Database\Factories\CriteriOptionFactory factory($count = null, $state = [])
=======
>>>>>>> 961ad402 (first)
=======
 * @method static \Modules\Progressioni\Database\Factories\CriteriOptionFactory factory($count = null, $state = [])
>>>>>>> f3d4311a (Squashed 'laravel/Modules/Progressioni/' content from commit 72d99eef1)
 * @method static Builder|CriteriOption newModelQuery()
 * @method static Builder|CriteriOption newQuery()
 * @method static Builder|CriteriOption query()
 * @method static Builder|CriteriOption whereAnno($value)
 * @method static Builder|CriteriOption whereCreatedAt($value)
 * @method static Builder|CriteriOption whereCreatedBy($value)
 * @method static Builder|CriteriOption whereId($value)
 * @method static Builder|CriteriOption whereName($value)
<<<<<<< HEAD
<<<<<<< HEAD
 * @method static Builder|CriteriOption whereType($value)
=======
>>>>>>> 961ad402 (first)
=======
 * @method static Builder|CriteriOption whereType($value)
>>>>>>> f3d4311a (Squashed 'laravel/Modules/Progressioni/' content from commit 72d99eef1)
 * @method static Builder|CriteriOption whereUpdatedAt($value)
 * @method static Builder|CriteriOption whereUpdatedBy($value)
 * @method static Builder|CriteriOption whereValue($value)
 *
 * @mixin \Eloquent
 */
class CriteriOption extends BaseModel
{
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> f3d4311a (Squashed 'laravel/Modules/Progressioni/' content from commit 72d99eef1)
    /**
     * Undocumented variable.
     *
     * @var array
     */
    protected $fillable = ['id', 'name', 'value', 'type', 'anno', 'note'];
<<<<<<< HEAD
=======
    protected $fillable = ['id', 'name', 'value', 'anno'];

    protected $table = 'criteri_options';

    // use Updater;
    // protected $connection = 'performance'; // this will use the specified database connection
    // public $timestamps    = true;
    // protected $dates      = [
    //    'created_at',
    //    'updated_at',
    // ];
>>>>>>> 961ad402 (first)
=======
>>>>>>> f3d4311a (Squashed 'laravel/Modules/Progressioni/' content from commit 72d99eef1)

    // end search
    // -------------------------
} // end class
