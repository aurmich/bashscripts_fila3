<?php

declare(strict_types=1);

namespace Modules\Mensa\Models;

use Illuminate\Database\Eloquent\Builder;

/**
 * Modules\Mensa\Models\Mensile.
 *
 * @method static \Modules\Mensa\Database\Factories\MensileFactory factory($count = null, $state = [])
 * @method static Builder|Mensile newModelQuery()
 * @method static Builder|Mensile newQuery()
 * @method static Builder|Mensile query()
 *
 * @mixin \Eloquent
 */
class Mensile extends BaseModel
{
    protected $fillable = ['id', 'clafun', 'smesli', 'sannli', 'cod', 'cassa', 'impoeu', 'contributo'];
}
