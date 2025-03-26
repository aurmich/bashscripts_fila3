<?php

declare(strict_types=1);

namespace Modules\Sigma\Models;

use Illuminate\Database\Eloquent\Builder;

/**
 * Modules\Sigma\Models\Fun00l1.
 *
 * @property int $id
 * @property string|null $propro
 * @property string|null $posfun
 * @property string|null $despro
 *
 * @method static Builder|Fun00l1 newModelQuery()
 * @method static Builder|Fun00l1 newQuery()
 * @method static Builder|Fun00l1 query()
 * @method static Builder|Fun00l1 whereDespro($value)
 * @method static Builder|Fun00l1 whereId($value)
 * @method static Builder|Fun00l1 wherePosfun($value)
 * @method static Builder|Fun00l1 wherePropro($value)
 *
 * @mixin \Eloquent
 */
class Fun00l1 extends BaseModel
{
    protected $table = 'fun00l1';
}
