<?php

declare(strict_types=1);

namespace Modules\IndennitaCondizioniLavoro\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\Pivot;

// ---- traits --
/**
 * Modules\IndennitaCondizioniLavoro\Models\CondizioniLavoroIndennitaTipoDettaglioPivot.
 *
 * @property int $id
 * @property int|null $condizioni_lavoro_id
 * @property int|null $indennita_tipo_dettaglio_id
 * @property int|null $gg
 * @property string|null $note
 * @property-read \Modules\IndennitaCondizioniLavoro\Models\CondizioniLavoro|null $condizioniLavoro
 * @property-read int|float $tot
 * @property-read int|float $tot_x_ptime
 * @property-read \Modules\IndennitaCondizioniLavoro\Models\IndennitaTipoDettaglio|null $indennitaTipoDettaglio
 *
 * @method static Builder|CondizioniLavoroIndennitaTipoDettaglioPivot newModelQuery()
 * @method static Builder|CondizioniLavoroIndennitaTipoDettaglioPivot newQuery()
 * @method static Builder|CondizioniLavoroIndennitaTipoDettaglioPivot query()
 * @method static Builder|CondizioniLavoroIndennitaTipoDettaglioPivot whereCondizioniLavoroId($value)
 * @method static Builder|CondizioniLavoroIndennitaTipoDettaglioPivot whereGg($value)
 * @method static Builder|CondizioniLavoroIndennitaTipoDettaglioPivot whereId($value)
 * @method static Builder|CondizioniLavoroIndennitaTipoDettaglioPivot whereIndennitaTipoDettaglioId($value)
 * @method static Builder|CondizioniLavoroIndennitaTipoDettaglioPivot whereNote($value)
 *
 * @mixin \Eloquent
 */
class CondizioniLavoroIndennitaTipoDettaglioPivot extends Pivot
{
    protected $table = 'condizioni_lavoro_x_indennita_tipo_dettaglio';

    protected $fillable = ['condizioni_lavoro_id', 'indennita_tipo_dettaglio_id', 'gg', 'note'];

    // protected $dates=['created_at','updated_at'];

    // --- relationship ---
    public function condizioniLavoro(): HasOne
    {
        return $this->hasOne(CondizioniLavoro::class, 'id', 'condizioni_lavoro_id');
    }

    public function indennitaTipoDettaglio(): HasOne
    {
        return $this->hasOne(IndennitaTipoDettaglio::class, 'id', 'indennita_tipo_dettaglio_id');
    }

    // ---- mutators --
    public function getTotAttribute($value): int|float
    {
        return $this->gg * $this->indennitaTipoDettaglio->euro_giorno;
    }

    public function getTotXPtimeAttribute($value): int|float
    {
        $tot = $this->tot;
        $ptime = $this->condizioniLavoro->perc_p_time_daterange;

        return $tot * $ptime;
    }
}
