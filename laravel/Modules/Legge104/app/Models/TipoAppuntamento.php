<?php

declare(strict_types=1);

namespace Modules\Prenotazioni\Models;

use Illuminate\Database\Eloquent\Builder;

/**
 * Modules\Prenotazioni\Models\TipoAppuntamento.
 *
 * @property int $id
 * @property string|null $nome
 * @property int|null $delta
 *
 * @method static \Modules\Prenotazioni\Database\Factories\TipoAppuntamentoFactory factory($count = null, $state = [])
 * @method static Builder|TipoAppuntamento newModelQuery()
 * @method static Builder|TipoAppuntamento newQuery()
 * @method static Builder|TipoAppuntamento query()
 * @method static Builder|TipoAppuntamento whereDelta($value)
 * @method static Builder|TipoAppuntamento whereId($value)
 * @method static Builder|TipoAppuntamento whereNome($value)
 *
 * @mixin \Eloquent
 */
class TipoAppuntamento extends BaseModel
{
    protected $fillable = ['id', 'nome', 'delta'];
}
