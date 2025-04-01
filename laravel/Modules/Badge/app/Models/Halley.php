<?php

declare(strict_types=1);

namespace Modules\Badge\Models;

use Illuminate\Database\Eloquent\Builder;

/**
 * Modules\Badge\Models\Halley.
 *
 * @method static \Modules\Badge\Database\Factories\HalleyFactory factory($count = null, $state = [])
 * @method static Builder|Halley newModelQuery()
 * @method static Builder|Halley newQuery()
 * @method static Builder|Halley query()
 *
 * @mixin \Eloquent
 */
class Halley extends BaseModel
{
    protected $fillable = ['id', 'data', 'uscita', 'matr', 'ora'];
}
