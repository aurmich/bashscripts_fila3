<?php

declare(strict_types=1);

namespace Modules\Performance\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int $id
 * @property int $performance_id
 * @property int $criteri_id
 * @property float $valutazione
 * @property string $note
 * @property string $created_by
 * @property string $updated_by
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \Modules\Performance\Models\Performance $performance
 * @property-read \Modules\Performance\Models\CriteriValutazione $criteri
 */
class PerformanceObiettivi extends Model
{
    /** @var list<string> */
    protected $fillable = [
        'performance_id',
        'criteri_id',
        'valutazione',
        'note',
        'created_by',
        'updated_by',
    ];

    /** @var array<string, string> */
    protected $casts = [
        'performance_id' => 'integer',
        'criteri_id' => 'integer',
        'valutazione' => 'float',
    ];

    protected $table = 'performance_obiettivi';

    public function performance(): BelongsTo
    {
        return $this->belongsTo(Performance::class);
    }

    public function criteri(): BelongsTo
    {
        return $this->belongsTo(CriteriValutazione::class, 'criteri_id');
    }

    /**
     * @param array<string, mixed> $input
     * @return Builder<Model>
     */
    public function filter(array $input = []): Builder
    {
        $query = static::query();

        if (isset($input['performance_id'])) {
            $query->where('performance_id', $input['performance_id']);
        }

        if (isset($input['criteri_id'])) {
            $query->where('criteri_id', $input['criteri_id']);
        }

        return $query;
    }
} 