<?php

declare(strict_types=1);

namespace Modules\Sigma\Models;

use Illuminate\Database\Eloquent\Builder;

/**
 * Modules\Sigma\Models\Wstr0f.
 *
 * @property int $id
 * @property int|null $ente
 * @property int|null $matr
 * @property int|null $repst2
 * @property int|null $repre2
 * @property string|null $wcat
 * @property int|null $wcod1
 * @property int|null $wcod2
 * @property int|null $wvoce
 * @property string|null $wqta
 * @property int|null $wimp
 * @property int|null $waa
 * @property int|null $wmm
 *
 * @method static Builder|Wstr0f newModelQuery()
 * @method static Builder|Wstr0f newQuery()
 * @method static Builder|Wstr0f query()
 * @method static Builder|Wstr0f whereEnte($value)
 * @method static Builder|Wstr0f whereId($value)
 * @method static Builder|Wstr0f whereMatr($value)
 * @method static Builder|Wstr0f whereRepre2($value)
 * @method static Builder|Wstr0f whereRepst2($value)
 * @method static Builder|Wstr0f whereWaa($value)
 * @method static Builder|Wstr0f whereWcat($value)
 * @method static Builder|Wstr0f whereWcod1($value)
 * @method static Builder|Wstr0f whereWcod2($value)
 * @method static Builder|Wstr0f whereWimp($value)
 * @method static Builder|Wstr0f whereWmm($value)
 * @method static Builder|Wstr0f whereWqta($value)
 * @method static Builder|Wstr0f whereWvoce($value)
 *
 * @mixin \Eloquent
 */
class Wstr0f extends BaseModel
{
    protected $table = 'wstr0f';
}
