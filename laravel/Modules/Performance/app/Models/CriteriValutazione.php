<?php

declare(strict_types=1);

namespace Modules\Performance\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Carbon;
use Modules\Ptv\Enums\WorkerType;
use Modules\Xot\Traits\Updater;
use Spatie\EloquentSortable\SortableTrait;
use Modules\Ptv\Models\CriteriValutazione as PtvCriteriValutazione;
/**
 * Modules\Performance\Models\CriteriValutazione.
 *
 * @property int $id
 * @property int $id_padre
 * @property string|null $nome
 * @property string|null $label
 * @property string|null $descr
 * @property string|null $post_type
 * @property int|null $posizione
 * @property int|null $anno
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $created_by
 * @property string|null $updated_by
 *
 * @method static Builder|CriteriValutazione newModelQuery()
 * @method static Builder|CriteriValutazione newQuery()
 * @method static Builder|CriteriValutazione query()
 * @method static Builder|CriteriValutazione whereAnno($value)
 * @method static Builder|CriteriValutazione whereCreatedAt($value)
 * @method static Builder|CriteriValutazione whereCreatedBy($value)
 * @method static Builder|CriteriValutazione whereDescr($value)
 * @method static Builder|CriteriValutazione whereId($value)
 * @method static Builder|CriteriValutazione whereIdPadre($value)
 * @method static Builder|CriteriValutazione whereLabel($value)
 * @method static Builder|CriteriValutazione whereNome($value)
 * @method static Builder|CriteriValutazione wherePosizione($value)
 * @method static Builder|CriteriValutazione wherePostType($value)
 * @method static Builder|CriteriValutazione whereUpdatedAt($value)
 * @method static Builder|CriteriValutazione whereUpdatedBy($value)
 *
 * @mixin \Eloquent
 */
class CriteriValutazione extends PtvCriteriValutazione
{
    protected $connection = 'performance';
    
}
