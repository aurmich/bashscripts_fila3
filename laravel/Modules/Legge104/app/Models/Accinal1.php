<?php

declare(strict_types=1);

namespace Modules\Sigma\Models;

use Illuminate\Database\Eloquent\Builder;

/**
 * Modules\Sigma\Models\Accinal1.
 *
 * @property int $id
 * @property int $ente
 * @property int $matr
 * @property int $datass
 * @property int $impina
 * @property string $impeur
 * @property string $accann
 * @property int $accaa
 * @property int $accmm
 *
 * @method static Builder|Accinal1 newModelQuery()
 * @method static Builder|Accinal1 newQuery()
 * @method static Builder|Accinal1 query()
 * @method static Builder|Accinal1 whereAccaa($value)
 * @method static Builder|Accinal1 whereAccann($value)
 * @method static Builder|Accinal1 whereAccmm($value)
 * @method static Builder|Accinal1 whereDatass($value)
 * @method static Builder|Accinal1 whereEnte($value)
 * @method static Builder|Accinal1 whereId($value)
 * @method static Builder|Accinal1 whereImpeur($value)
 * @method static Builder|Accinal1 whereImpina($value)
 * @method static Builder|Accinal1 whereMatr($value)
 *
 * @mixin \Eloquent
 */
class Accinal1 extends BaseModel
{
    protected $table = 'accinal1';
}
