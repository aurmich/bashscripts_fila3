<?php

declare(strict_types=1);

namespace Modules\Sigma\Models;

use Illuminate\Database\Eloquent\Builder;

/**
 * Modules\Sigma\Models\Acp01f.
 *
 * @property int $id
 * @property int $ente
 * @property int $matr
 * @property int $predal
 * @property int $prevoc
 * @property int $preimp
 * @property int $preiis
 *
 * @method static Builder|Acp01f newModelQuery()
 * @method static Builder|Acp01f newQuery()
 * @method static Builder|Acp01f query()
 * @method static Builder|Acp01f whereEnte($value)
 * @method static Builder|Acp01f whereId($value)
 * @method static Builder|Acp01f whereMatr($value)
 * @method static Builder|Acp01f wherePredal($value)
 * @method static Builder|Acp01f wherePreiis($value)
 * @method static Builder|Acp01f wherePreimp($value)
 * @method static Builder|Acp01f wherePrevoc($value)
 *
 * @mixin \Eloquent
 */
class Acp01f extends BaseModel
{
    protected $table = 'acp01f';
}
