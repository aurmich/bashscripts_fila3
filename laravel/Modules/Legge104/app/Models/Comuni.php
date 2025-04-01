<?php

declare(strict_types=1);

namespace Modules\Sigma\Models;

use Illuminate\Database\Eloquent\Builder;

/**
 * Modules\Sigma\Models\Comuni.
 *
 * @property int $id
 * @property string|null $comune
 * @property string|null $descom
 * @property string|null $provin
 * @property string|null $codcap
 *
 * @method static Builder|Comuni newModelQuery()
 * @method static Builder|Comuni newQuery()
 * @method static Builder|Comuni query()
 * @method static Builder|Comuni whereCodcap($value)
 * @method static Builder|Comuni whereComune($value)
 * @method static Builder|Comuni whereDescom($value)
 * @method static Builder|Comuni whereId($value)
 * @method static Builder|Comuni whereProvin($value)
 *
 * @mixin \Eloquent
 */
class Comuni extends BaseModel
{
    protected $table = 'comuni';
}
