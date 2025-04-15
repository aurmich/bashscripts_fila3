<?php

declare(strict_types=1);

namespace Modules\Badge\Models;

use Illuminate\Database\Eloquent\Builder;

/**
 * Modules\Badge\Models\Mensa.
 *
 * @method static \Modules\Badge\Database\Factories\MensaFactory factory($count = null, $state = [])
 * @method static Builder|Mensa newModelQuery()
 * @method static Builder|Mensa newQuery()
 * @method static Builder|Mensa query()
 *
 * @mixin \Eloquent
 */
class Mensa extends BaseModel
{
    protected $fillable = ['id', 'ente', 'matr', 'conome', 'nome', 'propro', 'posfun', 'stabi', 'repar', 'data', 'ora', 'tipo', 'note'];
}
