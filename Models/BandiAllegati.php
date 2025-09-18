<?php

declare(strict_types=1);

namespace Modules\MobilitaVolontaria\Models;

use Modules\MobilitaVolontaria\Database\Factories\BandiAllegatiFactory;
use Illuminate\Database\Eloquent\Builder;
/**
 * Modules\MobilitaVolontaria\Models\BandiAllegati.
 *
 * @method static \Modules\MobilitaVolontaria\Database\Factories\BandiAllegatiFactory factory($count = null, $state = [])
 * @method static Builder|BandiAllegati newModelQuery()
 * @method static Builder|BandiAllegati newQuery()
 * @method static Builder|BandiAllegati query()
 * @mixin \Eloquent
 */
class BandiAllegati extends BaseModel {
    protected $fillable = ['id', 'id_bandi'];
}
