<?php

declare(strict_types=1);

namespace Modules\Performance\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Carbon;
use Modules\Ptv\Enums\WorkerType;
use Spatie\EloquentSortable\SortableTrait;
use Modules\Ptv\Models\Option as PtvOption;
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
class Option extends PtvOption
{
    protected $connection = 'performance';
}
