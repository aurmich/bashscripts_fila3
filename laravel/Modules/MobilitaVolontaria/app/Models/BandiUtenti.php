<?php

declare(strict_types=1);

namespace Modules\MobilitaVolontaria\Models;

use Modules\MobilitaVolontaria\Database\Factories\BandiUtentiFactory;
use Illuminate\Database\Eloquent\Builder;
/**
 * Modules\MobilitaVolontaria\Models\BandiUtenti.
 *
 * @method static \Modules\MobilitaVolontaria\Database\Factories\BandiUtentiFactory factory($count = null, $state = [])
 * @method static Builder|BandiUtenti newModelQuery()
 * @method static Builder|BandiUtenti newQuery()
 * @method static Builder|BandiUtenti query()
 * @mixin \Eloquent
 */
class BandiUtenti extends BaseModel {
    protected $fillable = ['id', 'id_bandi'];
}
