<?php

declare(strict_types=1);

namespace Modules\Performance\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;
use Illuminate\Validation\Rule;

/**
 * @property int $id
 * @property int $performance_id
 * @property int $criteri_id
 * @property float $valutazione
 * @property string $note
 * @property string $created_by
 * @property string $updated_by
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property-read Performance $performance
 * @property-read CriteriValutazione $criteri
 *
 * @mixin Model
 */
class PerformanceComportamenti extends Model
{
    /** @var string */
    protected $table = 'performance_comportamenti';

    /** @var array<int, string> */
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
        'id' => 'integer',
        'performance_id' => 'integer',
        'criteri_id' => 'integer',
        'valutazione' => 'float',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /** @return array<string, mixed> */
    public function rules(): array
    {
        return [
            'performance_id' => ['required', 'integer', 'exists:performance,id'],
            'criteri_id' => ['required', 'integer', 'exists:criteri_valutazione,id'],
            'valutazione' => ['required', 'numeric', 'min:0', 'max:100'],
            'note' => ['required', 'string', 'max:1000'],
            'created_by' => ['required', 'string', 'max:255'],
            'updated_by' => ['required', 'string', 'max:255'],
        ];
    }

    /**
     * Relazione con la performance
     * @return BelongsTo<Performance, PerformanceComportamenti>
     */
    public function performance(): BelongsTo
    {
        return $this->belongsTo(Performance::class);
    }

    /**
     * Relazione con i criteri di valutazione
     * @return BelongsTo<CriteriValutazione, PerformanceComportamenti>
     */
    public function criteri(): BelongsTo
    {
        return $this->belongsTo(CriteriValutazione::class, 'criteri_id');
    }

    /**
     * Filtra i comportamenti in base ai parametri forniti
     * @param array<string, mixed> $input
     * @return Builder<PerformanceComportamenti>
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