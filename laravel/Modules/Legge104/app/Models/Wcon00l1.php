<?php

declare(strict_types=1);

namespace Modules\Sigma\Models;

use Illuminate\Database\Eloquent\Builder;

/**
 * Modules\Sigma\Models\Wcon00l1.
 *
 * @property int $id
 * @property string|null $enteap
 * @property string|null $wndtda
 * @property string|null $wnmatr
 * @property string|null $wncom1
 * @property string|null $wncom2
 *
 * @method static Builder|Wcon00l1 newModelQuery()
 * @method static Builder|Wcon00l1 newQuery()
 * @method static Builder|Wcon00l1 query()
 * @method static Builder|Wcon00l1 whereEnteap($value)
 * @method static Builder|Wcon00l1 whereId($value)
 * @method static Builder|Wcon00l1 whereWncom1($value)
 * @method static Builder|Wcon00l1 whereWncom2($value)
 * @method static Builder|Wcon00l1 whereWndtda($value)
 * @method static Builder|Wcon00l1 whereWnmatr($value)
 *
 * @mixin \Eloquent
 */
class Wcon00l1 extends BaseModel
{
    protected $table = 'wcon00l1';
}
