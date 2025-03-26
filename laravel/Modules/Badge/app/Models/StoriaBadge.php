<?php

declare(strict_types=1);

namespace Modules\Badge\Models;

use Illuminate\Database\Eloquent\Builder;

/**
 * Modules\Badge\Models\StoriaBadge.
 *
 * @property int $id
 * @property string $ente
 * @property string $matricola
 * @property string $cognome
 * @property string $nome
 * @property string $badge
 * @property string $data
 * @property string|null $note
 * @property string $last_stato
 * @property string $handle
 * @property string $datemod
 * @property-read \Illuminate\Support\Carbon|null $created_at
 * @property-read \Illuminate\Support\Carbon|null $updated_at
 *
 * @method static \Modules\Badge\Database\Factories\StoriaBadgeFactory factory($count = null, $state = [])
 * @method static Builder|StoriaBadge newModelQuery()
 * @method static Builder|StoriaBadge newQuery()
 * @method static Builder|StoriaBadge query()
 * @method static Builder|StoriaBadge whereId($value)
 * @method static Builder|StoriaBadge whereEnte($value)
 * @method static Builder|StoriaBadge whereMatricola($value)
 * @method static Builder|StoriaBadge whereCognome($value)
 * @method static Builder|StoriaBadge whereNome($value)
 * @method static Builder|StoriaBadge whereBadge($value)
 * @method static Builder|StoriaBadge whereData($value)
 * @method static Builder|StoriaBadge whereNote($value)
 * @method static Builder|StoriaBadge whereLastStato($value)
 * @method static Builder|StoriaBadge whereHandle($value)
 * @method static Builder|StoriaBadge whereDatemod($value)
 *
 * @mixin \Eloquent
 */
class StoriaBadge extends BaseModel
{
    /** @var list<string> */
    public $fillable = [
        'id',
        'ente',
        'matricola',
        'cognome',
        'nome',
        'badge',
        'data',
        'note',
        'last_stato',
        'handle',
        'datemod'
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    public function casts(): array
    {
        return [
            'id' => 'integer',
            'data' => 'datetime',
            'datemod' => 'datetime',
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
        ];
    }
}
