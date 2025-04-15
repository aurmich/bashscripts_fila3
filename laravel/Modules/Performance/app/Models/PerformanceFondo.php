<?php

declare(strict_types=1);

namespace Modules\Performance\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Carbon;
use Modules\Xot\Traits\Updater;

/**
 * Modules\Performance\Models\PerformanceFondo.
 *
 * @property int $id
 * @property float|null $quota_individuale
 * @property float|null $quota_organizzativa
 * @property int|null $anno
 * @property string|null $note
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $created_by
 * @property string|null $updated_by
 *
 * @method static Builder|PerformanceFondo newModelQuery()
 * @method static Builder|PerformanceFondo newQuery()
 * @method static Builder|PerformanceFondo query()
 * @method static Builder|PerformanceFondo whereAnno($value)
 * @method static Builder|PerformanceFondo whereCreatedAt($value)
 * @method static Builder|PerformanceFondo whereCreatedBy($value)
 * @method static Builder|PerformanceFondo whereId($value)
 * @method static Builder|PerformanceFondo whereNote($value)
 * @method static Builder|PerformanceFondo whereQuotaIndividuale($value)
 * @method static Builder|PerformanceFondo whereQuotaOrganizzativa($value)
 * @method static Builder|PerformanceFondo whereUpdatedAt($value)
 * @method static Builder|PerformanceFondo whereUpdatedBy($value)
 *
 * @mixin \Eloquent
 */
class PerformanceFondo extends BaseModel
{
    protected $fillable = [
        'id',
        'quota_individuale',
        'quota_organizzativa',
        'anno',
        'note',
        // 'created_at',
        // 'updated_at',
        // 'created_by',
        // 'updated_by'
    ];

    protected $table = 'fondo_performance';

    // use Updater;
    // protected $connection = 'performance'; // this will use the specified database connection

    // public $timestamps= false;
    /*
    protected $dates = [
        'created_at',
        'updated_at',
        ];
    */
    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        // 'is_admin' => 'boolean',
        'quota_individuale' => 'float',
        'quota_organizzativa' => 'float',
        'anno' => 'int',
        // 'tot' => 'float',
    ];

    // -------------------------
}
