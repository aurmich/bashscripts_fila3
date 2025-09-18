<?php

declare(strict_types=1);

namespace Modules\MobilitaVolontaria\Models;

use Modules\MobilitaVolontaria\Database\Factories\DichiarazioneFactory;
use Illuminate\Database\Eloquent\Builder;
/**
 * Modules\MobilitaVolontaria\Models\Dichiarazione.
 *
 * @method static \Modules\MobilitaVolontaria\Database\Factories\DichiarazioneFactory factory($count = null, $state = [])
 * @method static Builder|Dichiarazione newModelQuery()
 * @method static Builder|Dichiarazione newQuery()
 * @method static Builder|Dichiarazione query()
 * @mixin \Eloquent
 */
class Dichiarazione extends BaseModel {
    protected $fillable = ['id', 'codice_fiscale'];
}
