<?php

/**
 * @see https://tomasvotruba.com/blog/2021/01/04/phpstan-abstract-parent-generics-dummies/
 */

declare(strict_types=1);

namespace Modules\Performance\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Carbon;
use Modules\Performance\Enums\WorkerType;
use Modules\Performance\Models\Traits\FunctionTrait;
use Modules\Performance\Models\Traits\MutatorTrait;
use Modules\Performance\Models\Traits\RelationshipTrait;
use Modules\Sigma\Models\Ana10f;
use Modules\Sigma\Models\Anag;
use Modules\Sigma\Models\Asz00k1;
use Modules\Sigma\Models\Qua00f;
use Modules\Sigma\Models\Rep00f;
use Modules\Sigma\Models\Repart;
use Modules\Sigma\Models\Sto00f;
// ---------- traits
use Modules\Sigma\Models\Tqu00f;
use Modules\Sigma\Models\Traits\SchedaTrait;
use Modules\Sigma\Models\Traits\SigmaModelTrait;
use Modules\Xot\Traits\Updater;

/**
 * @template TEntity as object
 *
 * @property int $id
 * @property int $ente
 * @property int|null $matr
 * @property string|null $cognome
 * @property string|null $nome
 * @property string|null $email
 * @property int|null $stabi
 * @property int|null $repar
 * @property int|null $stabival
 * @property int|null $reparval
 * @property string|null $stabi_txt
 * @property string|null $repar_txt
 * @property int|null $disci
 * @property string|null $disci_txt
 * @property int|null $rep2kd
 * @property int|null $rep2ka
 * @property int|null $posiz
 * @property int|null $propro
 * @property int|null $posfun
 * @property string|null $categoria_eco
 * @property int|null $qua2kd
 * @property int|null $qua2ka
 * @property int|null $dal
 * @property int|null $al
 * @property int|null $anno
 * @property int|null $giornitempodet
 * @property int|null $ha_diritto
 * @property string|null $motivo
 * @property string|null $esperienza_acquisita
 * @property string|null $risultati_ottenuti
 * @property string|null $arricchimento_professionale
 * @property string|null $impegno
 * @property string|null $qualita_prestazione
 * @property string|null $totale_punteggio
 * @property string|null $lista_auth
 * @property string|null $peso_esperienza_acquisita
 * @property string|null $peso_risultati_ottenuti
 * @property string|null $peso_arricchimento_professionale
 * @property string|null $peso_impegno
 * @property string|null $peso_qualita_prestazione
 * @property string|null $datemod
 * @property string|null $note
 * @property string|null $oree
 * @property string|null $oret
 * @property string|null $perc_parttime
 * @property string|null $perc_parttimepond
 * @property int|null $gg_parttimevert
 * @property string|null $ore_assenza
 * @property string|null $giorni_assenza
 * @property string|null $giorni_presenza
 * @property string|null $categ_coeff
 * @property string|null $quota_teorica
 * @property string|null $budget_assegnato
 * @property string|null $quota_effettiva
 * @property string|null $resti
 * @property string|null $resti_pond
 * @property string|null $importo_totale
 * @property string|null $gg_totale_sigma
 * @property string|null $gg_validi_sigma
 * @property string|null $gg_assenz_sigma
 * @property string|null $decurtazione_perc
 * @property int|null $gg_tempo_determinato
 * @property int|null $gg_posiz_1_in_sede
 * @property int|null $gg_assenza_anno
 * @property int|null $gg_presenza_anno
 * @property string|null $ore_assenza_anno
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $created_by
 * @property string|null $updated_by
 * @property string|null $posiz_txt
 * @property int|null $clafun
 * @property int|null $disci1
 * @property string|null $disci1_txt
 * @property int|null $gg_ruolo
 * @property string|null $last_data_assunz
 * @property string|null $perc_parttime_anno
 * @property string|null $perc_parttime_dalal
 * @property int|null $gg_parttimevert_anno
 * @property int|null $gg_parttimevert_dalal
 * @property string|null $perc_parttimepond_anno
 * @property string|null $perc_parttimepond_dalal
 * @property int|null $gg_presenza_dalal
 * @property string|null $gg_assenza_dalal
 * @property string|null $hh_assenza_anno
 * @property string|null $hh_assenza_dalal
 * @property string|null $lang
 * @property int|null $excellence
 * @property int|null $codqua
 * @property int|null $cont
 * @property int|null $tipco
 * @property string|null $posizione_eco
 * @property Collection|Sto00f[] $Sto00fYear
 * @property int|null $sto00f_year_count
 * @property Ana10f|null $ana10f
 * @property Anag|null $anag
 * @property Collection|Asz00k1[] $asz00k1Year
 * @property int|null $asz00k1_year_count
 * @property Collection|Individuale[] $cards
 * @property int|null $cards_count
 * @property Collection|IndividualeAssenze[] $codiciAssenze
 * @property int|null $codici_assenze_count
 * @property CriteriEsclusione[] $criteriEsclusione
 * @property int|null $criteri_esclusione_count
 * @property CriteriMaggiorazione|null $criteriMaggiorazione
 * @property Collection|CriteriOption[] $criteriOptions
 * @property int|null $criteri_options_count
 * @property Collection|CriteriValutazione[] $criteriValutazione
 * @property int|null $criteri_valutazione_count
 * @property mixed $gg_p_time_vert_year
 * @property mixed $perc_p_time_daterange
 * @property mixed $perc_p_time_year
 * @property mixed $post_type
 * @property mixed $titolo_di_studio
 * @property Collection|MyLog[] $mailInviate
 * @property int|null $mail_inviate_count
 * @property Collection|MyLog[] $myLogs
 * @property int|null $my_logs_count
 * @property Collection|Option[] $options
 * @property int|null $options_count
 * @property IndividualePesi|null $peso
 * @property Collection|Qua00f[] $qua00f
 * @property int|null $qua00f_count
 * @property Collection|Qua00f[] $qua00fDaterange
 * @property int|null $qua00f_daterange_count
 * @property Collection|Qua00f[] $qua00fYear
 * @property int|null $qua00f_year_count
 * @property Collection|Rep00f[] $rep00f
 * @property int|null $rep00f_count
 * @property Collection|Repart[] $reparts
 * @property int|null $reparts_count
 * @property StabiDirigente|null $stabiDirigente
 * @property Collection|Sto00f[] $sto00f
 * @property int|null $sto00f_count
 * @property IndividualeTotStabi|null $totStabi
 * @property Tqu00f|null $tqu00f
 * @property WorkerType $type
 */
abstract class BaseIndividualeModel extends Model
{
    use FunctionTrait;
    use MutatorTrait;
    use RelationshipTrait;
    use SchedaTrait;
    use SigmaModelTrait;
    use Updater;

    public string $from_field = 'dal';

    public string $to_field = 'al';

    /** @var string */
    protected $connection = 'performance';

    /** @var string */
    protected $table = 'performance_individuale';

    protected $fillable = ['id', 'ente', 'matr', 'cognome', 'nome', 'email',
        'propro', 'posfun', 'categoria_eco', 'posiz', 'posiz_txt',
        'clafun', 'stabi', 'stabi_txt', 'repar', 'repar_txt', 'stabival',
        'reparval',
        'gg_posiz_1_in_sede', 'gg_presenza_anno',
        'disci1', 'disci1_txt', 'rep2kd', 'rep2ka', 'qua2kd',
        'qua2ka',  'dal', 'al', 'anno',
        'esperienza_acquisita', 'peso_esperienza_acquisita',
        'risultati_ottenuti', 'peso_risultati_ottenuti',
        'arricchimento_professionale', 'peso_arricchimento_professionale',
        'impegno', 'peso_impegno', 'qualita_prestazione', 'peso_qualita_prestazione',
        'totale_punteggio',
        'ha_diritto', 'motivo',
        'excellence',
        'perc_parttime_anno', 'perc_parttime_dalal',
        'gg_parttimevert_anno', 'gg_parttimevert_dalal',
        'perc_parttimepond_anno', 'perc_parttimepond_dalal',
        'codqua', 'cont', 'tipco', 'posizione_eco',
        'last_data_assunz',
        'gg_presenza_anno', 'gg_presenza_dalal',
        'gg_assenza_anno', 'gg_assenza_dalal',
        'hh_assenza_anno', 'hh_assenza_anno',
        'post_type', 'type',
    ];

    /** @return array<string, string>  */
    public function casts(): array
    {
        return [
            'type' => WorkerType::class,
            'ente' => 'integer',
            'matr' => 'integer',
            'disci1' => 'integer',
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
            'excellence' => 'bool',
        ];
    }

    /**
     * @return HasMany<Individuale, BaseIndividualeModel>
     */
    public function cards(): HasMany
    {
        return $this->hasMany(Individuale::class, 'matr', 'matr')
            ->where('ente', $this->ente)
            ->where('anno', $this->anno);
    }

    /**
     * @return HasMany<IndividualeAssenze, BaseIndividualeModel>
     */
    public function codiciAssenze(): HasMany
    {
        return $this->hasMany(IndividualeAssenze::class, 'matr', 'matr')
            ->where('ente', $this->ente)
            ->where('anno', $this->anno);
    }

    /**
     * @return HasMany<CriteriEsclusione, BaseIndividualeModel>
     */
    public function criteriEsclusione(): HasMany
    {
        return $this->hasMany(CriteriEsclusione::class, 'anno', 'anno');
    }

    /**
     * @return BelongsTo<CriteriMaggiorazione, self>
     */
    public function criteriMaggiorazione(): BelongsTo
    {
        return $this->belongsTo(CriteriMaggiorazione::class, 'matr', 'matr')
            ->where('ente', $this->ente)
            ->where('anno', $this->anno);
    }

    /**
     * @return HasMany<CriteriOption, BaseIndividualeModel>
     */
    public function criteriOptions(): HasMany
    {
        return $this->hasMany(CriteriOption::class, 'anno', 'anno');
    }

    /**
     * @return HasMany<CriteriValutazione, BaseIndividualeModel>
     */
    public function criteriValutazione(): HasMany
    {
        return $this->hasMany(CriteriValutazione::class, 'anno', 'anno');
    }

    /**
     * @return HasMany<MyLog, BaseIndividualeModel>
     */
    public function mailInviate(): HasMany
    {
        return $this->hasMany(MyLog::class, 'id_tbl', 'id')
            ->where('tbl', $this->getTable());
    }

    /**
     * @return HasMany<MyLog, BaseIndividualeModel>
     */
    public function myLogs(): HasMany
    {
        return $this->hasMany(MyLog::class, 'id_tbl', 'id')
            ->where('tbl', $this->getTable());
    }

    /**
     * @return HasMany<Option, BaseIndividualeModel>
     */
    public function options(): HasMany
    {
        return $this->hasMany(Option::class, 'anno', 'anno');
    }

    /**
     * @return HasMany<Individuale, BaseIndividualeModel>
     */
    public function otherWinnerRows(): HasMany
    {
        return $this->hasMany(Individuale::class, 'matr', 'matr')
            ->where('ente', $this->ente)
            ->where('anno', $this->anno);
    }

    /**
     * @return BelongsTo<IndividualePesi, self>
     */
    public function peso(): BelongsTo
    {
        return $this->belongsTo(IndividualePesi::class, 'matr', 'matr')
            ->where('ente', $this->ente)
            ->where('anno', $this->anno);
    }

    /**
     * @return BelongsTo<IndividualePoPesi, self>
     */
    public function pesoPo(): BelongsTo
    {
        return $this->belongsTo(IndividualePoPesi::class, 'matr', 'matr')
            ->where('ente', $this->ente)
            ->where('anno', $this->anno);
    }

    /**
     * @return BelongsTo<StabiDirigente, self>
     */
    public function stabiDirigente(): BelongsTo
    {
        return $this->belongsTo(StabiDirigente::class, 'stabi', 'stabi')
            ->where('ente', $this->ente)
            ->where('anno', $this->anno);
    }

    /**
     * @return BelongsTo<IndividualeTotStabi, self>
     */
    public function totStabi(): BelongsTo
    {
        return $this->belongsTo(IndividualeTotStabi::class, 'stabi', 'stabi')
            ->where('ente', $this->ente)
            ->where('anno', $this->anno);
    }

    /**
     * @param array<string, mixed> $input
     * @return Builder<self>
     */
    public function filter(array $input = []): Builder
    {
        $query = static::query();

        if (isset($input['ente'])) {
            $query->where('ente', $input['ente']);
        }

        if (isset($input['matr'])) {
            $query->where('matr', $input['matr']);
        }

        if (isset($input['anno'])) {
            $query->where('anno', $input['anno']);
        }

        return $query;
    }
}
