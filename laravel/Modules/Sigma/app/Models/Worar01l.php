<?php

declare(strict_types=1);

namespace Modules\Sigma\Models;

use Illuminate\Database\Eloquent\Builder;

/**
 * Modules\Sigma\Models\Worar01l.
 *
 * @property int $id
 * @property int|null $enteap
 * @property string|null $orannu
 * @property string|null $orcodi
 * @property int|null $ordal
 * @property int|null $oral
 * @property string|null $wsc3b
 *
 * @method static Builder|Worar01l newModelQuery()
 * @method static Builder|Worar01l newQuery()
 * @method static Builder|Worar01l query()
 * @method static Builder|Worar01l whereEnteap($value)
 * @method static Builder|Worar01l whereId($value)
 * @method static Builder|Worar01l whereOral($value)
 * @method static Builder|Worar01l whereOrannu($value)
 * @method static Builder|Worar01l whereOrcodi($value)
 * @method static Builder|Worar01l whereOrdal($value)
 * @method static Builder|Worar01l whereWsc3b($value)
 *
 * @mixin \Eloquent
 */
class Worar01l extends BaseModel
{
    protected $table = 'worar01l';
}
