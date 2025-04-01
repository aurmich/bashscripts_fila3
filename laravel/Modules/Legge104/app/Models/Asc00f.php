<?php

declare(strict_types=1);

namespace Modules\Sigma\Models;

use Illuminate\Database\Eloquent\Builder;

/**
 * Modules\Sigma\Models\Asc00f.
 *
 * @property int $id
 * @property string|null $asscon
 * @property string|null $cont
 * @property string|null $voce
 *
 * @method static Builder|Asc00f newModelQuery()
 * @method static Builder|Asc00f newQuery()
 * @method static Builder|Asc00f query()
 * @method static Builder|Asc00f whereAsscon($value)
 * @method static Builder|Asc00f whereCont($value)
 * @method static Builder|Asc00f whereId($value)
 * @method static Builder|Asc00f whereVoce($value)
 *
 * @mixin \Eloquent
 */
class Asc00f extends BaseModel
{
    protected $table = 'asc00f';
}
