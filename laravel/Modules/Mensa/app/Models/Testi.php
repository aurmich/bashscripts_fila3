<?php

declare(strict_types=1);

namespace Modules\Mensa\Models;

use Illuminate\Database\Eloquent\Builder;

/**
 * Modules\Mensa\Models\Testi.
 *
 * @method static \Modules\Mensa\Database\Factories\TestiFactory factory($count = null, $state = [])
 * @method static Builder|Testi newModelQuery()
 * @method static Builder|Testi newQuery()
 * @method static Builder|Testi query()
 *
 * @mixin \Eloquent
 */
class Testi extends BaseModel
{
    protected $fillable = ['id', 'testo'];
}
