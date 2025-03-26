<?php

declare(strict_types=1);

namespace Modules\Sigma\Models;

use Illuminate\Database\Eloquent\Builder;

/**
 * Modules\Sigma\Models\Ali00f.
 *
 * @property int $id
 * @property string|null $anno
 * @property string|null $mese
 * @property string|null $ali1
 *
 * @method static Builder|Ali00f newModelQuery()
 * @method static Builder|Ali00f newQuery()
 * @method static Builder|Ali00f query()
 * @method static Builder|Ali00f whereAli1($value)
 * @method static Builder|Ali00f whereAnno($value)
 * @method static Builder|Ali00f whereId($value)
 * @method static Builder|Ali00f whereMese($value)
 *
 * @mixin \Eloquent
 */
class Ali00f extends BaseModel
{
    protected $table = 'ali00f';
}
