<?php

declare(strict_types=1);

namespace Modules\Performance\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Modules\Performance\Models\Valutatore
 *
 * @property int $id
 * @property string $nome_diri Nome del dirigente
 * @property string $ente Codice ente
 * @property string $matr Matricola
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Valutatore newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Valutatore newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Valutatore query()
 */
class Valutatore extends Model
{
    protected $table = 'valutatori';

    protected $fillable = [
        'nome_diri',
        'ente',
        'matr',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
}
