<?php

declare(strict_types=1);

namespace Modules\Sigma\Models;

use Illuminate\Database\Eloquent\Builder;

/**
 * Modules\Sigma\Models\Ymen00f.
 *
 * @property int $id
 * @property string|null $flanme
 * @property string|null $cdmnme
 * @property string|null $descme
 * @property string|null $sinfme
 * @property string|null $mnpgme
 *
 * @method static Builder|Ymen00f newModelQuery()
 * @method static Builder|Ymen00f newQuery()
 * @method static Builder|Ymen00f query()
 * @method static Builder|Ymen00f whereCdmnme($value)
 * @method static Builder|Ymen00f whereDescme($value)
 * @method static Builder|Ymen00f whereFlanme($value)
 * @method static Builder|Ymen00f whereId($value)
 * @method static Builder|Ymen00f whereMnpgme($value)
 * @method static Builder|Ymen00f whereSinfme($value)
 *
 * @mixin \Eloquent
 */
class Ymen00f extends BaseModel
{
    protected $table = 'ymen00f';
}
