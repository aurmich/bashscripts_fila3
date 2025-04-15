<?php

declare(strict_types=1);

namespace Modules\Ptv\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Carbon;
use Modules\Ptv\Enums\WorkerType;
use Spatie\EloquentSortable\SortableTrait;

/**
 * Modules\Performance\Models\Option.
 *
 * @property int $id
 * @property string|null $option_type
 * @property int|null $option_id
 * @property int|null $parent_id
 * @property int|null $pos
 * @property string|null $name
 * @property string|null $value
 * @property string|null $txt
 * @property string|null $txt1
 * @property int|null $year
 * @property Carbon|null $created_at
 * @property string|null $created_by
 * @property Carbon|null $updated_at
 * @property string|null $updated_by
 * @property Collection<int, Option> $sons
 * @property int|null $sons_count
 *
 * @method static Builder|Option newModelQuery()
 * @method static Builder|Option newQuery()
 * @method static Builder|Option query()
 * @method static Builder|Option whereCreatedAt($value)
 * @method static Builder|Option whereCreatedBy($value)
 * @method static Builder|Option whereId($value)
 * @method static Builder|Option whereName($value)
 * @method static Builder|Option whereOptionId($value)
 * @method static Builder|Option whereOptionType($value)
 * @method static Builder|Option whereParentId($value)
 * @method static Builder|Option wherePos($value)
 * @method static Builder|Option whereTxt($value)
 * @method static Builder|Option whereTxt1($value)
 * @method static Builder|Option whereUpdatedAt($value)
 * @method static Builder|Option whereUpdatedBy($value)
 * @method static Builder|Option whereValue($value)
 * @method static Builder|Option whereYear($value)
 *
 * @mixin \Eloquent
 */
class Option extends BaseModel
{
    use SortableTrait;
    use \Staudenmeir\LaravelAdjacencyList\Eloquent\HasRecursiveRelationships;

    /** @var array<string, string|bool> */
    public $sortable = [
        'order_column_name' => 'pos',
        'sort_when_creating' => true,
    ];

    /** @var array<int, string> */
    protected $fillable = [
        'id',
        'option_type', 'option_id',
        'name', 'value', 'year', 'txt', 'txt1',
        'parent_id', 'pos',
    ];

    /** @return array<string, string>  */
    public function casts(): array
    {
        return [
            'option_type' => WorkerType::class,
        ];
    }

    public function attr($name): string
    {
        return 'preso';
    }

    public function sons(): HasMany
    {
        //return $this->hasMany(static::class, 'parent_id', 'id');
        return $this->children();
    }

    public function fillSons(): HasMany
    {
        $sons = $this->sons();
        if ($sons->count() == 0) {
            $pres = self::where('name', $this->name)->where('txt', $this->txt)->where('year', $this->year - 1)->first();
            if (is_iterable($pres?->sons)) {
                foreach ($pres->sons as $son) {
                    self::where('name', $son->name)->where('txt', $son->txt)->where('year', $this->year)->update(['parent_id' => $this->id]);
                }
            }
        }

        return $sons;
    }
}
