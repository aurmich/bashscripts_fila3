<?php

declare(strict_types=1);

namespace Modules\Performance\Models;

// ---------- models -------
// ----------traits ---
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Carbon;
use Modules\Sigma\Models\Ana02f;
use Modules\Sigma\Models\Ana10f;
use Modules\Sigma\Models\Anag;
use Modules\Sigma\Models\Asz00f;
use Modules\Sigma\Models\Asz00k1;
use Modules\Sigma\Models\Qua00f;
use Modules\Sigma\Models\Qua03f;
use Modules\Sigma\Models\Rep00f;
use Modules\Sigma\Models\Repart;
use Modules\Sigma\Models\Sto00f;
use Modules\Sigma\Models\Tqu00f;
use Modules\Sigma\Models\Wstr01lx;
use Parental\HasChildren;

/**
 * Modules\Performance\Models\Individuale.
 *
 * @property int                                                             $id
 * @property string|null                                                     $type
 * @property string|null                                                     $post_type
 * @property int                                                             $ente
 * @property int|null                                                        $matr
 * @property string|null                                                     $cognome
 * @property string|null                                                     $nome
 * @property string|null                                                     $email
 * @property int|null                                                        $stabi
 * @property int|null                                                        $repar
 * @property int|null                                                        $stabival
 * @property int|null                                                        $reparval
 * @property string|null                                                     $stabi_txt
 * @property string|null                                                     $repar_txt
 * @property int|null                                                        $disci
 * @property string|null                                                     $disci_txt
 * @property int|null                                                        $rep2kd
 * @property int|null                                                        $rep2ka
 * @property int|null                                                        $posiz
 * @property int|null                                                        $propro
 * @property int|null                                                        $posfun
 * @property string|null                                                     $categoria_eco
 * @property int|null                                                        $qua2kd
 * @property int|null                                                        $qua2ka
 * @property int|null                                                        $dal
 * @property int|null                                                        $al
 * @property int|null                                                        $anno
 * @property int|null                                                        $giornitempodet
 * @property int                                                             $ha_diritto
 * @property string|null                                                     $motivo
 * @property string|null                                                     $esperienza_acquisita
 * @property string|null                                                     $risultati_ottenuti
 * @property string|null                                                     $arricchimento_professionale
 * @property string|null                                                     $impegno
 * @property string|null                                                     $qualita_prestazione
 * @property float|null                                                      $totale_punteggio
 * @property string|null                                                     $lista_auth
 * @property float|null                                                      $peso_esperienza_acquisita
 * @property float|null                                                      $peso_risultati_ottenuti
 * @property float|null                                                      $peso_arricchimento_professionale
 * @property float|null                                                      $peso_impegno
 * @property float|null                                                      $peso_qualita_prestazione
 * @property string|null                                                     $datemod
 * @property string|null                                                     $note
 * @property string|null                                                     $oree
 * @property string|null                                                     $oret
 * @property float|null                                                      $perc_parttime
 * @property string|null                                                     $perc_parttimepond
 * @property int|null                                                        $gg_parttimevert
 * @property string|null                                                     $ore_assenza
 * @property string|null                                                     $giorni_assenza
 * @property string|null                                                     $giorni_presenza
 * @property string|null                                                     $categ_coeff
 * @property string|null                                                     $quota_teorica
 * @property string|null                                                     $budget_assegnato
 * @property string|null                                                     $quota_effettiva
 * @property string|null                                                     $resti
 * @property string|null                                                     $resti_pond
 * @property string|null                                                     $importo_totale
 * @property string|null                                                     $gg_totale_sigma
 * @property string|null                                                     $gg_validi_sigma
 * @property string|null                                                     $gg_assenz_sigma
 * @property string|null                                                     $decurtazione_perc
 * @property int                                                             $gg_tempo_determinato
 * @property int|null                                                        $gg_posiz_1_in_sede
 * @property int                                                             $gg_assenza_anno
 * @property int                                                             $gg_presenza_anno
 * @property string|null                                                     $ore_assenza_anno
 * @property Carbon|null                                                     $created_at
 * @property Carbon|null                                                     $updated_at
 * @property string|null                                                     $created_by
 * @property string|null                                                     $updated_by
 * @property string|null                                                     $posiz_txt
 * @property int|null                                                        $clafun
 * @property int|null                                                        $disci1
 * @property string|null                                                     $disci1_txt
 * @property int                                                             $gg_ruolo
 * @property int|null                                                        $last_data_assunz
 * @property string|null                                                     $perc_parttime_anno
 * @property string|null                                                     $perc_parttime_dalal
 * @property int|null                                                        $gg_parttimevert_anno
 * @property int|null                                                        $gg_parttimevert_dalal
 * @property float|null                                                      $perc_parttimepond_anno
 * @property string|null                                                     $perc_parttimepond_dalal
 * @property int|null                                                        $gg_presenza_dalal
 * @property int|null                                                        $gg_assenza_dalal
 * @property float|null                                                      $hh_assenza_anno
 * @property float|null                                                      $hh_assenza_dalal
 * @property string|null                                                     $lang
 * @property int|null                                                        $excellence
 * @property int|null                                                        $codqua
 * @property int|null                                                        $cont
 * @property int|null                                                        $tipco
 * @property string|null                                                     $posizione_eco
 * @property float                                                           $gg_anno
 * @property Collection<int, Sto00f>                                         $Sto00fYear
 * @property int|null                                                        $sto00f_year_count
 * @property Collection<int, Ana02f>                                         $ana02f
 * @property int|null                                                        $ana02f_count
 * @property Ana10f|null                                                     $ana10f
 * @property Anag|null                                                       $anag
 * @property Collection<int, Asz00f>                                         $asz00f
 * @property int|null                                                        $asz00f_count
 * @property Collection<int, Asz00k1>                                        $asz00k1
 * @property int|null                                                        $asz00k1_count
 * @property Collection<int, Asz00k1>                                        $asz00k1Year
 * @property int|null                                                        $asz00k1_year_count
 * @property Collection<int, Individuale>                                    $cards
 * @property int|null                                                        $cards_count
 * @property Collection<int, \Modules\Performance\Models\IndividualeAssenze> $codiciAssenze
 * @property int|null                                                        $codici_assenze_count
 * @property Collection<int, \Modules\Performance\Models\CriteriEsclusione>  $criteriEsclusione
 * @property int|null                                                        $criteri_esclusione_count
 * @property CriteriMaggiorazione|null                                       $criteriMaggiorazione
 * @property Collection<int, \Modules\Performance\Models\CriteriOption>      $criteriOptions
 * @property int|null                                                        $criteri_options_count
 * @property Collection<int, \Modules\Performance\Models\CriteriValutazione> $criteriValutazione
 * @property int|null                                                        $criteri_valutazione_count
 * @property int|float                                                       $gg_p_time_vert_year
 * @property int|float                                                       $perc_p_time_daterange
 * @property int|float                                                       $perc_p_time_year
 * @property mixed                                                           $titolo_di_studio
 * @property Collection<int, \Modules\Performance\Models\MyLog>              $mailInviate
 * @property int|null                                                        $mail_inviate_count
 * @property Collection<int, \Modules\Performance\Models\MyLog>              $myLogs
 * @property int|null                                                        $my_logs_count
 * @property Collection<int, \Modules\Performance\Models\Option>             $options
 * @property int|null                                                        $options_count
 * @property Collection<int, Individuale>                                    $otherWinnerRows
 * @property int|null                                                        $other_winner_rows_count
 * @property IndividualePesi|null                                            $peso
 * @property IndividualePoPesi|null                                          $pesoPo
 * @property Collection<int, Qua00f>                                         $qua00f
 * @property int|null                                                        $qua00f_count
 * @property Collection<int, Qua00f>                                         $qua00fDaterange
 * @property int|null                                                        $qua00f_daterange_count
 * @property Collection<int, Qua00f>                                         $qua00fYear
 * @property int|null                                                        $qua00f_year_count
 * @property Collection<int, Qua03f>                                         $qua03f
 * @property int|null                                                        $qua03f_count
 * @property Collection<int, Rep00f>                                         $rep00f
 * @property int|null                                                        $rep00f_count
 * @property Collection<int, Repart>                                         $reparts
 * @property int|null                                                        $reparts_count
 * @property StabiDirigente|null                                             $stabiDirigente
 * @property Collection<int, Sto00f>                                         $sto00f
 * @property int|null                                                        $sto00f_count
 * @property IndividualeTotStabi|null                                        $totStabi
 * @property Tqu00f|null                                                     $tqu00f
 * @property Collection<int, Wstr01lx>                                       $wstr01lx
 * @property int|null                                                        $wstr01lx_count
 * @property Collection<int, Wstr01lx>                                       $wstr01lxYear
 * @property int|null                                                        $wstr01lx_year_count
 *
 * @method static Builder|Individuale                                        newModelQuery()
 * @method static Builder|Individuale                                        newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BaseIndividualeModel ofDate(int $date)
 * @method static \Illuminate\Database\Eloquent\Builder|BaseIndividualeModel ofEnteYear(int $ente, int $year)
 * @method static \Illuminate\Database\Eloquent\Builder|BaseIndividualeModel ofQuarter(int $quarter, int $year)
 * @method static \Illuminate\Database\Eloquent\Builder|BaseIndividualeModel ofRangeDate(int $date_start, int $date_end)
 * @method static \Illuminate\Database\Eloquent\Builder|BaseIndividualeModel ofYear(int $year)
 * @method static Builder|Individuale                                        query()
 * @method static Builder|Individuale                                        whereAl($value)
 * @method static Builder|Individuale                                        whereAnno($value)
 * @method static Builder|Individuale                                        whereArricchimentoProfessionale($value)
 * @method static Builder|Individuale                                        whereBudgetAssegnato($value)
 * @method static Builder|Individuale                                        whereCategCoeff($value)
 * @method static Builder|Individuale                                        whereCategoriaEco($value)
 * @method static Builder|Individuale                                        whereClafun($value)
 * @method static Builder|Individuale                                        whereCodqua($value)
 * @method static Builder|Individuale                                        whereCognome($value)
 * @method static Builder|Individuale                                        whereCont($value)
 * @method static Builder|Individuale                                        whereCreatedAt($value)
 * @method static Builder|Individuale                                        whereCreatedBy($value)
 * @method static Builder|Individuale                                        whereDal($value)
 * @method static Builder|Individuale                                        whereDatemod($value)
 * @method static Builder|Individuale                                        whereDecurtazionePerc($value)
 * @method static Builder|Individuale                                        whereDisci($value)
 * @method static Builder|Individuale                                        whereDisci1($value)
 * @method static Builder|Individuale                                        whereDisci1Txt($value)
 * @method static Builder|Individuale                                        whereDisciTxt($value)
 * @method static Builder|Individuale                                        whereEmail($value)
 * @method static Builder|Individuale                                        whereEnte($value)
 * @method static Builder|Individuale                                        whereEsperienzaAcquisita($value)
 * @method static Builder|Individuale                                        whereExcellence($value)
 * @method static Builder|Individuale                                        whereGgAnno($value)
 * @method static Builder|Individuale                                        whereGgAssenzSigma($value)
 * @method static Builder|Individuale                                        whereGgAssenzaAnno($value)
 * @method static Builder|Individuale                                        whereGgAssenzaDalal($value)
 * @method static Builder|Individuale                                        whereGgParttimevert($value)
 * @method static Builder|Individuale                                        whereGgParttimevertAnno($value)
 * @method static Builder|Individuale                                        whereGgParttimevertDalal($value)
 * @method static Builder|Individuale                                        whereGgPosiz1InSede($value)
 * @method static Builder|Individuale                                        whereGgPresenzaAnno($value)
 * @method static Builder|Individuale                                        whereGgPresenzaDalal($value)
 * @method static Builder|Individuale                                        whereGgRuolo($value)
 * @method static Builder|Individuale                                        whereGgTempoDeterminato($value)
 * @method static Builder|Individuale                                        whereGgTotaleSigma($value)
 * @method static Builder|Individuale                                        whereGgValidiSigma($value)
 * @method static Builder|Individuale                                        whereGiorniAssenza($value)
 * @method static Builder|Individuale                                        whereGiorniPresenza($value)
 * @method static Builder|Individuale                                        whereGiornitempodet($value)
 * @method static Builder|Individuale                                        whereHaDiritto($value)
 * @method static Builder|Individuale                                        whereHhAssenzaAnno($value)
 * @method static Builder|Individuale                                        whereHhAssenzaDalal($value)
 * @method static Builder|Individuale                                        whereId($value)
 * @method static Builder|Individuale                                        whereImpegno($value)
 * @method static Builder|Individuale                                        whereImportoTotale($value)
 * @method static Builder|Individuale                                        whereLang($value)
 * @method static Builder|Individuale                                        whereLastDataAssunz($value)
 * @method static Builder|Individuale                                        whereListaAuth($value)
 * @method static Builder|Individuale                                        whereMatr($value)
 * @method static Builder|Individuale                                        whereMotivo($value)
 * @method static Builder|Individuale                                        whereNome($value)
 * @method static Builder|Individuale                                        whereNote($value)
 * @method static Builder|Individuale                                        whereOreAssenza($value)
 * @method static Builder|Individuale                                        whereOreAssenzaAnno($value)
 * @method static Builder|Individuale                                        whereOree($value)
 * @method static Builder|Individuale                                        whereOret($value)
 * @method static Builder|Individuale                                        wherePercParttime($value)
 * @method static Builder|Individuale                                        wherePercParttimeAnno($value)
 * @method static Builder|Individuale                                        wherePercParttimeDalal($value)
 * @method static Builder|Individuale                                        wherePercParttimepond($value)
 * @method static Builder|Individuale                                        wherePercParttimepondAnno($value)
 * @method static Builder|Individuale                                        wherePercParttimepondDalal($value)
 * @method static Builder|Individuale                                        wherePesoArricchimentoProfessionale($value)
 * @method static Builder|Individuale                                        wherePesoEsperienzaAcquisita($value)
 * @method static Builder|Individuale                                        wherePesoImpegno($value)
 * @method static Builder|Individuale                                        wherePesoQualitaPrestazione($value)
 * @method static Builder|Individuale                                        wherePesoRisultatiOttenuti($value)
 * @method static Builder|Individuale                                        wherePosfun($value)
 * @method static Builder|Individuale                                        wherePosiz($value)
 * @method static Builder|Individuale                                        wherePosizTxt($value)
 * @method static Builder|Individuale                                        wherePosizioneEco($value)
 * @method static Builder|Individuale                                        wherePostType($value)
 * @method static Builder|Individuale                                        wherePropro($value)
 * @method static Builder|Individuale                                        whereQua2ka($value)
 * @method static Builder|Individuale                                        whereQua2kd($value)
 * @method static Builder|Individuale                                        whereQualitaPrestazione($value)
 * @method static Builder|Individuale                                        whereQuotaEffettiva($value)
 * @method static Builder|Individuale                                        whereQuotaTeorica($value)
 * @method static Builder|Individuale                                        whereRep2ka($value)
 * @method static Builder|Individuale                                        whereRep2kd($value)
 * @method static Builder|Individuale                                        whereRepar($value)
 * @method static Builder|Individuale                                        whereReparTxt($value)
 * @method static Builder|Individuale                                        whereReparval($value)
 * @method static Builder|Individuale                                        whereResti($value)
 * @method static Builder|Individuale                                        whereRestiPond($value)
 * @method static Builder|Individuale                                        whereRisultatiOttenuti($value)
 * @method static Builder|Individuale                                        whereSchedaType($value)
 * @method static Builder|Individuale                                        whereStabi($value)
 * @method static Builder|Individuale                                        whereStabiTxt($value)
 * @method static Builder|Individuale                                        whereStabival($value)
 * @method static Builder|Individuale                                        whereTipco($value)
 * @method static Builder|Individuale                                        whereTotalePunteggio($value)
 * @method static Builder|Individuale                                        whereUpdatedAt($value)
 * @method static Builder|Individuale                                        whereUpdatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BaseIndividualeModel withDays(int $date_min, int $date_max)
 * @method static \Illuminate\Database\Eloquent\Builder|BaseIndividualeModel withTotPunt()
 *
 * @mixin \Eloquent
 */
class Individuale extends BaseIndividualeModel
{
    use HasChildren;

    /** @var string */
    protected $connection = 'performance';

    /** @var string */
    protected $table = 'performance_individuale';

    /** @var array<string> */
    protected $fillable = [
        'type', 'post_type', 'ente', 'matr', 'cognome', 'nome', 'email',
        'stabi', 'repar', 'stabival', 'reparval', 'stabi_txt', 'repar_txt',
        'disci', 'disci_txt', 'rep2kd', 'rep2ka', 'posiz', 'propro', 'posfun',
        'categoria_eco', 'qua2kd', 'qua2ka', 'dal', 'al', 'anno',
        'giornitempodet', 'ha_diritto', 'motivo', 'esperienza_acquisita',
        'risultati_ottenuti', 'arricchimento_professionale', 'impegno',
        'qualita_prestazione', 'totale_punteggio', 'lista_auth',
        'peso_esperienza_acquisita', 'peso_risultati_ottenuti',
        'peso_arricchimento_professionale', 'peso_impegno',
        'peso_qualita_prestazione', 'datemod', 'note', 'oree', 'oret',
        'perc_parttime', 'perc_parttimepond', 'gg_parttimevert', 'ore_assenza',
        'giorni_assenza', 'giorni_presenza', 'categ_coeff', 'quota_teorica',
        'budget_assegnato', 'quota_effettiva', 'resti', 'resti_pond',
        'importo_totale', 'gg_totale_sigma', 'gg_validi_sigma',
        'gg_assenz_sigma', 'decurtazione_perc', 'gg_tempo_determinato',
        'gg_posiz_1_in_sede', 'gg_assenza_anno', 'gg_presenza_anno',
        'ore_assenza_anno', 'created_by', 'updated_by', 'posiz_txt', 'clafun',
        'disci1', 'disci1_txt', 'gg_ruolo', 'last_data_assunz',
        'perc_parttime_anno', 'perc_parttime_dalal', 'gg_parttimevert_anno',
        'gg_parttimevert_dalal', 'perc_parttimepond_anno',
        'perc_parttimepond_dalal', 'gg_presenza_dalal', 'gg_assenza_dalal',
        'hh_assenza_anno', 'hh_assenza_dalal', 'lang', 'excellence', 'codqua',
        'cont', 'tipco', 'posizione_eco', 'gg_anno',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    public function casts(): array
    {
        return [
            'stabi' => 'integer',
            'repar' => 'integer',
            'stabival' => 'integer',
            'reparval' => 'integer',
            'disci' => 'integer',
            'rep2kd' => 'integer',
            'rep2ka' => 'integer',
            'posiz' => 'integer',
            'propro' => 'integer',
            'posfun' => 'integer',
            'qua2kd' => 'integer',
            'qua2ka' => 'integer',
            'dal' => 'integer',
            'al' => 'integer',
            'anno' => 'integer',
            'giornitempodet' => 'integer',
            'ha_diritto' => 'integer',
            'gg_parttimevert' => 'integer',
            'gg_tempo_determinato' => 'integer',
            'gg_posiz_1_in_sede' => 'integer',
            'gg_assenza_anno' => 'integer',
            'gg_presenza_anno' => 'integer',
            'gg_ruolo' => 'integer',
            'last_data_assunz' => 'integer',
            'gg_parttimevert_anno' => 'integer',
            'gg_parttimevert_dalal' => 'integer',
            'gg_presenza_dalal' => 'integer',
            'gg_assenza_dalal' => 'integer',
            'hh_assenza_anno' => 'float',
            'hh_assenza_dalal' => 'float',
            'codqua' => 'integer',
            'cont' => 'integer',
            'tipco' => 'integer',
            'gg_anno' => 'float',
            'peso_esperienza_acquisita' => 'float',
            'peso_risultati_ottenuti' => 'float',
            'peso_arricchimento_professionale' => 'float',
            'peso_impegno' => 'float',
            'peso_qualita_prestazione' => 'float',
            'totale_punteggio' => 'float',
            'perc_parttime' => 'float',
            'perc_parttime_anno' => 'float',
            'perc_parttime_dalal' => 'float',
            'perc_parttimepond_anno' => 'float',
            'perc_parttimepond_dalal' => 'float',
        ];
    }

    protected array $childTypes = [
        'po' => IndividualePo::class,
        'dip' => IndividualeDip::class,
    ];

    /**
     * @return HasMany<Individuale>
     */
    public function cards(): HasMany
    {
        return $this->hasMany(self::class, 'individuale_id');
    }

   

    /**
     * @return HasMany<CriteriEsclusione>
     */
    public function criteriEsclusione(): HasMany
    {
        return $this->hasMany(CriteriEsclusione::class, 'individuale_id');
    }

    /**
     * @return BelongsTo<CriteriMaggiorazione, self>
     */
    public function criteriMaggiorazione(): BelongsTo
    {
        return $this->belongsTo(CriteriMaggiorazione::class, 'individuale_id');
    }

    /**
     * @return HasMany<CriteriOption>
     */
    public function criteriOptions(): HasMany
    {
        return $this->hasMany(CriteriOption::class, 'individuale_id');
    }

    

    /**
     * @return HasMany<MyLog>
     */
    public function mailInviate(): HasMany
    {
        return $this->hasMany(MyLog::class, 'individuale_id');
    }

  
   
    /**
     * @return HasMany<Individuale>
     */
    public function otherWinnerRows(): HasMany
    {
        return $this->hasMany(self::class, 'individuale_id');
    }

    /**
     * @return BelongsTo<IndividualePesi, self>
     */
    public function peso(): BelongsTo
    {
        return $this->belongsTo(IndividualePesi::class, 'individuale_id');
    }

    /**
     * @return BelongsTo<IndividualePoPesi, self>
     */
    public function pesoPo(): BelongsTo
    {
        return $this->belongsTo(IndividualePoPesi::class, 'individuale_id');
    }

    /**
     * @return BelongsTo<StabiDirigente, self>
     */
    public function stabiDirigente(): BelongsTo
    {
        return $this->belongsTo(StabiDirigente::class, 'individuale_id');
    }

    /**
     * @return BelongsTo<IndividualeTotStabi, self>
     */
    public function totStabi(): BelongsTo
    {
        return $this->belongsTo(IndividualeTotStabi::class, 'individuale_id');
    }

    /**
     * Get the valutatore (evaluator) associated with this record.
     *
     * @return BelongsTo<Valutatore, self>
     */
    public function valutatore(): BelongsTo
    {
        return $this->belongsTo(Valutatore::class, ['ente', 'matr'], ['ente', 'matr']);
    }

    /*
     * @return Builder<self>
     */
    /*
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

        if (isset($input['stabi'])) {
            $query->where('stabi', $input['stabi']);
        }

        if (isset($input['repar'])) {
            $query->where('repar', $input['repar']);
        }

        if (isset($input['disci'])) {
            $query->where('disci', $input['disci']);
        }

        if (isset($input['posiz'])) {
            $query->where('posiz', $input['posiz']);
        }

        if (isset($input['propro'])) {
            $query->where('propro', $input['propro']);
        }

        if (isset($input['posfun'])) {
            $query->where('posfun', $input['posfun']);
        }

        if (isset($input['categoria_eco'])) {
            $query->where('categoria_eco', $input['categoria_eco']);
        }

        if (isset($input['qua2kd'])) {
            $query->where('qua2kd', $input['qua2kd']);
        }

        if (isset($input['qua2ka'])) {
            $query->where('qua2ka', $input['qua2ka']);
        }

        if (isset($input['dal'])) {
            $query->where('dal', $input['dal']);
        }

        if (isset($input['al'])) {
            $query->where('al', $input['al']);
        }

        if (isset($input['giornitempodet'])) {
            $query->where('giornitempodet', $input['giornitempodet']);
        }

        if (isset($input['ha_diritto'])) {
            $query->where('ha_diritto', $input['ha_diritto']);
        }

        if (isset($input['motivo'])) {
            $query->where('motivo', $input['motivo']);
        }

        if (isset($input['esperienza_acquisita'])) {
            $query->where('esperienza_acquisita', $input['esperienza_acquisita']);
        }

        if (isset($input['risultati_ottenuti'])) {
            $query->where('risultati_ottenuti', $input['risultati_ottenuti']);
        }

        if (isset($input['arricchimento_professionale'])) {
            $query->where('arricchimento_professionale', $input['arricchimento_professionale']);
        }

        if (isset($input['impegno'])) {
            $query->where('impegno', $input['impegno']);
        }

        if (isset($input['qualita_prestazione'])) {
            $query->where('qualita_prestazione', $input['qualita_prestazione']);
        }

        if (isset($input['totale_punteggio'])) {
            $query->where('totale_punteggio', $input['totale_punteggio']);
        }

        if (isset($input['lista_auth'])) {
            $query->where('lista_auth', $input['lista_auth']);
        }

        if (isset($input['peso_esperienza_acquisita'])) {
            $query->where('peso_esperienza_acquisita', $input['peso_esperienza_acquisita']);
        }

        if (isset($input['peso_risultati_ottenuti'])) {
            $query->where('peso_risultati_ottenuti', $input['peso_risultati_ottenuti']);
        }

        if (isset($input['peso_arricchimento_professionale'])) {
            $query->where('peso_arricchimento_professionale', $input['peso_arricchimento_professionale']);
        }

        if (isset($input['peso_impegno'])) {
            $query->where('peso_impegno', $input['peso_impegno']);
        }

        if (isset($input['peso_qualita_prestazione'])) {
            $query->where('peso_qualita_prestazione', $input['peso_qualita_prestazione']);
        }

        if (isset($input['datemod'])) {
            $query->where('datemod', $input['datemod']);
        }

        if (isset($input['note'])) {
            $query->where('note', $input['note']);
        }

        if (isset($input['oree'])) {
            $query->where('oree', $input['oree']);
        }

        if (isset($input['oret'])) {
            $query->where('oret', $input['oret']);
        }

        if (isset($input['perc_parttime'])) {
            $query->where('perc_parttime', $input['perc_parttime']);
        }

        if (isset($input['perc_parttimepond'])) {
            $query->where('perc_parttimepond', $input['perc_parttimepond']);
        }

        if (isset($input['gg_parttimevert'])) {
            $query->where('gg_parttimevert', $input['gg_parttimevert']);
        }

        if (isset($input['ore_assenza'])) {
            $query->where('ore_assenza', $input['ore_assenza']);
        }

        if (isset($input['giorni_assenza'])) {
            $query->where('giorni_assenza', $input['giorni_assenza']);
        }

        if (isset($input['giorni_presenza'])) {
            $query->where('giorni_presenza', $input['giorni_presenza']);
        }

        if (isset($input['categ_coeff'])) {
            $query->where('categ_coeff', $input['categ_coeff']);
        }

        if (isset($input['quota_teorica'])) {
            $query->where('quota_teorica', $input['quota_teorica']);
        }

        if (isset($input['budget_assegnato'])) {
            $query->where('budget_assegnato', $input['budget_assegnato']);
        }

        if (isset($input['quota_effettiva'])) {
            $query->where('quota_effettiva', $input['quota_effettiva']);
        }

        if (isset($input['resti'])) {
            $query->where('resti', $input['resti']);
        }

        if (isset($input['resti_pond'])) {
            $query->where('resti_pond', $input['resti_pond']);
        }

        if (isset($input['importo_totale'])) {
            $query->where('importo_totale', $input['importo_totale']);
        }

        if (isset($input['gg_totale_sigma'])) {
            $query->where('gg_totale_sigma', $input['gg_totale_sigma']);
        }

        if (isset($input['gg_validi_sigma'])) {
            $query->where('gg_validi_sigma', $input['gg_validi_sigma']);
        }

        if (isset($input['gg_assenz_sigma'])) {
            $query->where('gg_assenz_sigma', $input['gg_assenz_sigma']);
        }

        if (isset($input['decurtazione_perc'])) {
            $query->where('decurtazione_perc', $input['decurtazione_perc']);
        }

        if (isset($input['gg_tempo_determinato'])) {
            $query->where('gg_tempo_determinato', $input['gg_tempo_determinato']);
        }

        if (isset($input['gg_posiz_1_in_sede'])) {
            $query->where('gg_posiz_1_in_sede', $input['gg_posiz_1_in_sede']);
        }

        if (isset($input['gg_assenza_anno'])) {
            $query->where('gg_assenza_anno', $input['gg_assenza_anno']);
        }

        if (isset($input['gg_presenza_anno'])) {
            $query->where('gg_presenza_anno', $input['gg_presenza_anno']);
        }

        if (isset($input['ore_assenza_anno'])) {
            $query->where('ore_assenza_anno', $input['ore_assenza_anno']);
        }

        if (isset($input['created_by'])) {
            $query->where('created_by', $input['created_by']);
        }

        if (isset($input['updated_by'])) {
            $query->where('updated_by', $input['updated_by']);
        }

        if (isset($input['posiz_txt'])) {
            $query->where('posiz_txt', $input['posiz_txt']);
        }

        if (isset($input['clafun'])) {
            $query->where('clafun', $input['clafun']);
        }

        if (isset($input['disci1'])) {
            $query->where('disci1', $input['disci1']);
        }

        if (isset($input['disci1_txt'])) {
            $query->where('disci1_txt', $input['disci1_txt']);
        }

        if (isset($input['gg_ruolo'])) {
            $query->where('gg_ruolo', $input['gg_ruolo']);
        }

        if (isset($input['last_data_assunz'])) {
            $query->where('last_data_assunz', $input['last_data_assunz']);
        }

        if (isset($input['perc_parttime_anno'])) {
            $query->where('perc_parttime_anno', $input['perc_parttime_anno']);
        }

        if (isset($input['perc_parttime_dalal'])) {
            $query->where('perc_parttime_dalal', $input['perc_parttime_dalal']);
        }

        if (isset($input['gg_parttimevert_anno'])) {
            $query->where('gg_parttimevert_anno', $input['gg_parttimevert_anno']);
        }

        if (isset($input['gg_parttimevert_dalal'])) {
            $query->where('gg_parttimevert_dalal', $input['gg_parttimevert_dalal']);
        }

        if (isset($input['perc_parttimepond_anno'])) {
            $query->where('perc_parttimepond_anno', $input['perc_parttimepond_anno']);
        }

        if (isset($input['perc_parttimepond_dalal'])) {
            $query->where('perc_parttimepond_dalal', $input['perc_parttimepond_dalal']);
        }

        if (isset($input['gg_presenza_dalal'])) {
            $query->where('gg_presenza_dalal', $input['gg_presenza_dalal']);
        }

        if (isset($input['gg_assenza_dalal'])) {
            $query->where('gg_assenza_dalal', $input['gg_assenza_dalal']);
        }

        if (isset($input['hh_assenza_anno'])) {
            $query->where('hh_assenza_anno', $input['hh_assenza_anno']);
        }

        if (isset($input['hh_assenza_dalal'])) {
            $query->where('hh_assenza_dalal', $input['hh_assenza_dalal']);
        }

        if (isset($input['lang'])) {
            $query->where('lang', $input['lang']);
        }

        if (isset($input['excellence'])) {
            $query->where('excellence', $input['excellence']);
        }

        if (isset($input['codqua'])) {
            $query->where('codqua', $input['codqua']);
        }

        if (isset($input['cont'])) {
            $query->where('cont', $input['cont']);
        }

        if (isset($input['tipco'])) {
            $query->where('tipco', $input['tipco']);
        }

        if (isset($input['posizione_eco'])) {
            $query->where('posizione_eco', $input['posizione_eco']);
        }

        if (isset($input['gg_anno'])) {
            $query->where('gg_anno', $input['gg_anno']);
        }

        return $query;
    }
    */
}
