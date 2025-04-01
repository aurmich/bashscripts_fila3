<?php

declare(strict_types=1);

namespace Modules\Sigma\Models;

use Illuminate\Database\Eloquent\Builder;

/**
 * Modules\Sigma\Models\Fun00f.
 *
 * @property int $id
 * @property int|null $propro
 * @property int|null $posfun
 * @property string|null $despro
 *
 * @method static Builder|Fun00f newModelQuery()
 * @method static Builder|Fun00f newQuery()
 * @method static Builder|Fun00f query()
 * @method static Builder|Fun00f whereDespro($value)
 * @method static Builder|Fun00f whereId($value)
 * @method static Builder|Fun00f wherePosfun($value)
 * @method static Builder|Fun00f wherePropro($value)
 *
 * @mixin \Eloquent
 */
class Fun00f extends BaseModel
{
    protected $table = 'fun00f';
}
