<?php

declare(strict_types=1);

namespace Modules\Sigma\Models;

use Illuminate\Database\Eloquent\Builder;

/**
 * Modules\Sigma\Models\Gapmtrf.
 *
 * @property int $id
 * @property string|null $qent1
 * @property string|null $qtip1
 * @property string|null $qmatr
 * @property string|null $qdes1
 * @property string|null $qabi1
 *
 * @method static Builder|Gapmtrf newModelQuery()
 * @method static Builder|Gapmtrf newQuery()
 * @method static Builder|Gapmtrf query()
 * @method static Builder|Gapmtrf whereId($value)
 * @method static Builder|Gapmtrf whereQabi1($value)
 * @method static Builder|Gapmtrf whereQdes1($value)
 * @method static Builder|Gapmtrf whereQent1($value)
 * @method static Builder|Gapmtrf whereQmatr($value)
 * @method static Builder|Gapmtrf whereQtip1($value)
 *
 * @mixin \Eloquent
 */
class Gapmtrf extends BaseModel
{
    protected $table = 'gapmtrf';
}
