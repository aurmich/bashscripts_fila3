<?php

declare(strict_types=1);

<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> f3d4311a (Squashed 'laravel/Modules/Progressioni/' content from commit 72d99eef1)
namespace Modules\Progressioni\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;
use Modules\Ptv\Models\Contracts\CriteriEsclusioneContract;

/**
 * Modules\Progressioni\Models\CriteriEsclusione.
<<<<<<< HEAD
=======
namespace Modules\Performance\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Carbon;
use Modules\Xot\Traits\Updater;

/**
 * Modules\Performance\Models\CriteriEsclusione.
>>>>>>> 961ad402 (first)
=======
>>>>>>> f3d4311a (Squashed 'laravel/Modules/Progressioni/' content from commit 72d99eef1)
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $field_name
 * @property string|null $op
 * @property string|null $value
<<<<<<< HEAD
<<<<<<< HEAD
 * @property string|null $type
=======
>>>>>>> 961ad402 (first)
=======
 * @property string|null $type
>>>>>>> f3d4311a (Squashed 'laravel/Modules/Progressioni/' content from commit 72d99eef1)
 * @property int|null $anno
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $created_by
 * @property string|null $updated_by
 *
<<<<<<< HEAD
<<<<<<< HEAD
 * @method static \Modules\Progressioni\Database\Factories\CriteriEsclusioneFactory factory($count = null, $state = [])
=======
>>>>>>> 961ad402 (first)
=======
 * @method static \Modules\Progressioni\Database\Factories\CriteriEsclusioneFactory factory($count = null, $state = [])
>>>>>>> f3d4311a (Squashed 'laravel/Modules/Progressioni/' content from commit 72d99eef1)
 * @method static Builder|CriteriEsclusione newModelQuery()
 * @method static Builder|CriteriEsclusione newQuery()
 * @method static Builder|CriteriEsclusione query()
 * @method static Builder|CriteriEsclusione whereAnno($value)
 * @method static Builder|CriteriEsclusione whereCreatedAt($value)
 * @method static Builder|CriteriEsclusione whereCreatedBy($value)
 * @method static Builder|CriteriEsclusione whereFieldName($value)
 * @method static Builder|CriteriEsclusione whereId($value)
 * @method static Builder|CriteriEsclusione whereName($value)
 * @method static Builder|CriteriEsclusione whereOp($value)
<<<<<<< HEAD
<<<<<<< HEAD
 * @method static Builder|CriteriEsclusione whereType($value)
=======
>>>>>>> 961ad402 (first)
=======
 * @method static Builder|CriteriEsclusione whereType($value)
>>>>>>> f3d4311a (Squashed 'laravel/Modules/Progressioni/' content from commit 72d99eef1)
 * @method static Builder|CriteriEsclusione whereUpdatedAt($value)
 * @method static Builder|CriteriEsclusione whereUpdatedBy($value)
 * @method static Builder|CriteriEsclusione whereValue($value)
 *
 * @mixin \Eloquent
 */
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> f3d4311a (Squashed 'laravel/Modules/Progressioni/' content from commit 72d99eef1)
class CriteriEsclusione extends BaseModel implements CriteriEsclusioneContract
{
    protected $fillable = ['id', 'name', 'field_name', 'op', 'value', 'type', 'anno'];

    protected $table = 'criteri_esclusione';

    // -------------------------

    public function schede(): HasMany
    {
        return $this->hasMany(Schede::class, 'anno', 'anno');
    }

    public function criteriOptions(): HasMany
    {
        return $this->hasMany(CriteriOption::class, 'anno', 'anno');
    }

    public function criteriOptionsCollection(): Collection
    {
        $criteriOption = $this
            ->criteriOptions
            ->map(function ($item) {
                $value = '';
                switch ($item->type) {
                    case 'list':
                        $value = explode(',', $item->value);
                        break;
                    case 'int':
                        $value = intval($value);
                        break;
                    case 'date':
                        $value = $item->value;
                        if ($value != null) {
                            $value = Carbon::parse($value);
                        }
                        break;
                    default:
                        dddx($item->type);
                        break;
                }
                $item->value_real = $value;

                return $item;
            })
            ->pluck('value_real', 'name');

        return $criteriOption;
    }
<<<<<<< HEAD
=======
class CriteriEsclusione extends BaseModel
{
    protected $fillable = ['id', 'name', 'field_name', 'op', 'value', 'anno'];

    // use Updater;
    // protected $connection = 'performance'; // this will use the specified database connection
    protected $table = 'criteri_esclusione';

    // public $timestamps = true;
    /*
    protected $dates = [
        'created_at',
        'updated_at',
    ];
    */
    // end search
    // -------------------------
>>>>>>> 961ad402 (first)
=======
>>>>>>> f3d4311a (Squashed 'laravel/Modules/Progressioni/' content from commit 72d99eef1)
} // end class
