<?php

declare(strict_types=1);

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
 * @property int|null $anno
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $created_by
 * @property string|null $updated_by
 *
 * @method static \Modules\Progressioni\Database\Factories\CriteriOptionFactory factory($count = null, $state = [])
 * @method static Builder|CriteriOption newModelQuery()
 * @method static Builder|CriteriOption newQuery()
 * @method static Builder|CriteriOption query()
 * @method static Builder|CriteriOption whereAnno($value)
 * @method static Builder|CriteriOption whereCreatedAt($value)
 * @method static Builder|CriteriOption whereCreatedBy($value)
 * @method static Builder|CriteriOption whereId($value)
 * @method static Builder|CriteriOption whereName($value)
 * @method static Builder|CriteriOption whereType($value)
 * @method static Builder|CriteriOption whereUpdatedAt($value)
 * @method static Builder|CriteriOption whereUpdatedBy($value)
 * @method static Builder|CriteriOption whereValue($value)
 *
 * @mixin \Eloquent
 */
class CriteriOption extends BaseModel
{
    /**
     * Undocumented variable.
     *
     * @var array
     */
    protected $fillable = ['id', 'name', 'value', 'type', 'anno', 'note'];

    // end search
    // -------------------------
} // end class
