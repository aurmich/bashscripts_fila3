<?php

declare(strict_types=1);

namespace Modules\Mensa\Models;

use Illuminate\Database\Eloquent\Builder;

/**
 * Modules\Mensa\Models\Cir.
 *
 * @method static \Modules\Mensa\Database\Factories\CirFactory factory($count = null, $state = [])
 * @method static Builder|Cir newModelQuery()
 * @method static Builder|Cir newQuery()
 * @method static Builder|Cir query()
 *
 * @mixin \Eloquent
 */
class Cir extends BaseModel
{
    protected $fillable = ['id'];
}
