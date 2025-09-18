<?php

declare(strict_types=1);

namespace Modules\Mensa\Models;

use Illuminate\Database\Eloquent\Builder;

/**
 * Modules\Mensa\Models\CentroTorri.
 *
 * @method static \Modules\Mensa\Database\Factories\CentroTorriFactory factory($count = null, $state = [])
 * @method static Builder|CentroTorri newModelQuery()
 * @method static Builder|CentroTorri newQuery()
 * @method static Builder|CentroTorri query()
 *
 * @mixin \Eloquent
 */
class CentroTorri extends BaseModel
{
    protected $fillable = ['id', 'matricola', 'cognome', 'nome', 'numero_di_badge', 'badge_intero', 'field', 'field1', 'field11'];
}
