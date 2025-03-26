<?php

declare(strict_types=1);

namespace Modules\Sigma\Models;

use Illuminate\Database\Eloquent\Builder;

/**
 * Modules\Sigma\Models\Varc01l.
 *
 * @property int $id
 * @property string|null $enteap
 * @property string|null $vaannu
 * @property string|null $vamatr
 * @property string|null $vadel
 * @property string|null $vaoold
 * @property string|null $vaonew
 *
 * @method static Builder|Varc01l newModelQuery()
 * @method static Builder|Varc01l newQuery()
 * @method static Builder|Varc01l query()
 * @method static Builder|Varc01l whereEnteap($value)
 * @method static Builder|Varc01l whereId($value)
 * @method static Builder|Varc01l whereVaannu($value)
 * @method static Builder|Varc01l whereVadel($value)
 * @method static Builder|Varc01l whereVamatr($value)
 * @method static Builder|Varc01l whereVaonew($value)
 * @method static Builder|Varc01l whereVaoold($value)
 *
 * @mixin \Eloquent
 */
class Varc01l extends BaseModel
{
    protected $table = 'varc01l';
}
