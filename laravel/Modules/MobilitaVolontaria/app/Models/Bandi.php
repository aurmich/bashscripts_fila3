<?php

declare(strict_types=1);

namespace Modules\MobilitaVolontaria\Models;

use Modules\MobilitaVolontaria\Database\Factories\BandiFactory;
use Illuminate\Database\Eloquent\Builder;
/**
 * Modules\MobilitaVolontaria\Models\Bandi.
 *
 * @method static \Modules\MobilitaVolontaria\Database\Factories\BandiFactory factory($count = null, $state = [])
 * @method static Builder|Bandi newModelQuery()
 * @method static Builder|Bandi newQuery()
 * @method static Builder|Bandi query()
 * @mixin \Eloquent
 */
class Bandi extends BaseModel {
    protected $fillable = ['id', 'comune'];
}
