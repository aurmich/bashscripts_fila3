<?php

declare(strict_types=1);

namespace Modules\Progressioni\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;
use Modules\Ptv\Models\Contracts\CriteriEsclusioneContract;

/**
 * Modules\Progressioni\Models\CriteriEsclusione.
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $field_name
 * @property string|null $op
 * @property string|null $value
 * @property string|null $type
 * @property int|null $anno
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $created_by
 * @property string|null $updated_by
 *
 * @method static \Modules\Progressioni\Database\Factories\CriteriEsclusioneFactory factory($count = null, $state = [])
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
 * @method static Builder|CriteriEsclusione whereType($value)
 * @method static Builder|CriteriEsclusione whereUpdatedAt($value)
 * @method static Builder|CriteriEsclusione whereUpdatedBy($value)
 * @method static Builder|CriteriEsclusione whereValue($value)
 *
 * @mixin \Eloquent
 */
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
} // end class
