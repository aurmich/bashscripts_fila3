<?php

declare(strict_types=1);

namespace Modules\Mensa\Models;

use Illuminate\Database\Eloquent\Builder;

/**
 * Modules\Mensa\Models\MensaManuali.
 *
 * @method static \Modules\Mensa\Database\Factories\MensaManualiFactory factory($count = null, $state = [])
 * @method static Builder|MensaManuali newModelQuery()
 * @method static Builder|MensaManuali newQuery()
 * @method static Builder|MensaManuali query()
 *
 * @mixin \Eloquent
 */
class MensaManuali extends BaseModel
{
    protected $fillable = ['id', 'ente', 'matr', 'cognome', 'nome', 'datat'];
}
