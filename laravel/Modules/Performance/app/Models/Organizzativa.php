<?php

declare(strict_types=1);

namespace Modules\Performance\Models;

// --- traits ---
use Illuminate\Support\Carbon;
use Modules\Sigma\Models\Anag;
use Modules\Xot\Traits\Updater;
use Modules\Sigma\Models\Ana02f;
use Modules\Sigma\Models\Ana10f;
use Modules\Sigma\Models\Asz00f;
use Modules\Sigma\Models\Qua00f;
use Modules\Sigma\Models\Qua03f;
use Modules\Sigma\Models\Rep00f;
use Modules\Sigma\Models\Repart;
use Modules\Sigma\Models\Sto00f;
use Modules\Sigma\Models\Tqu00f;
use Modules\Sigma\Models\Asz00k1;
use Modules\Sigma\Models\Wstr01lx;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Modules\Sigma\Models\Traits\SchedaTrait;
use Modules\Sigma\Models\Traits\SigmaModelTrait;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Modules\Performance\Models\Traits\MutatorTrait;
use Modules\Performance\Models\Traits\FunctionTrait;
use Modules\Ptv\Models\Traits\HasCriteriValutazione;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Modules\Performance\Models\Traits\RelationshipTrait;

/**
 * Modules\Performance\Models\Organizzativa.
 *
 * @property int $id
 * @property string|null $type
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
 * @property int $ha_diritto
 * @property string|null $motivo
 * @property string|null $esperienza_acquisita
 * @property string|null $risultati_ottenuti
 * @property string|null $arricchimento_professionale
 * @property string|null $impegno
 * @property string|null $qualita_prestazione
 * @property float|null $totale_punteggio
 * @property string|null $lista_auth
 * @property float|null $peso_esperienza_acquisita
 * @property float|null $peso_risultati_ottenuti
 * @property float|null $peso_arricchimento_professionale
 * @property float|null $peso_impegno
 * @property float|null $peso_qualita_prestazione
 * @property string|null $datemod
 * @property string|null $note
 * @property string|null $oree
 * @property string|null $oret
 * @property float|null $perc_parttime
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
 * @property int $gg_tempo_determinato
 * @property int|null $gg_posiz_1_in_sede
 * @property int $gg_assenza_anno
 * @property int $gg_presenza_anno
 * @property int $gg_ruolo
 * @property int|null $last_data_assunz
 * @property string|null $ore_assenza_anno
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $created_by
 * @property string|null $updated_by
 * @property string|null $posiz_txt
 * @property int|null $clafun
 * @property int|null $disci1
 * @property string|null $disci1_txt
 * @property int|null $gg_assenza_dalal
 * @property float|null $hh_assenza_anno
 * @property float|null $hh_assenza_dalal
 * @property string|null $gg_parttimevert_anno
 * @property float|null $perc_parttimepond_anno
 * @property string|null $perc_parttimepond_dalal
 * @property string|null $gg_parttimevert_dalal
 * @property string|null $gg_presenza_dalal
 * @property string|null $perc_parttime_dalal
 * @property string|null $perc_parttime_anno
 * @property string|null $posizione_eco
 * @property float $gg_anno
 * @property float|null $tot Total value
 * @property Collection<int, Sto00f> $Sto00fYear
 * @property int|null $sto00f_year_count
 * @property Collection<int, Ana02f> $ana02f
 * @property int|null $ana02f_count
 * @property Ana10f|null $ana10f
 * @property Anag|null $anag
 * @property Collection<int, Asz00f> $asz00f
 * @property int|null $asz00f_count
 * @property Collection<int, Asz00k1> $asz00k1
 * @property int|null $asz00k1_count
 * @property Collection<int, Asz00k1> $asz00k1Year
 * @property int|null $asz00k1_year_count
 * @property Collection<int, \Modules\Performance\Models\Individuale> $cards
 * @property int|null $cards_count
 * @property Collection<int, \Modules\Performance\Models\IndividualeAssenze> $codiciAssenze
 * @property int|null $codici_assenze_count
 * @property Collection<int, \Modules\Performance\Models\CriteriEsclusione> $criteriEsclusione
 * @property int|null $criteri_esclusione_count
 * @property CriteriMaggiorazione|null $criteriMaggiorazione
 * @property Collection<int, \Modules\Performance\Models\CriteriOption> $criteriOptions
 * @property int|null $criteri_options_count
 * @property Collection<int, \Modules\Performance\Models\CriteriValutazione> $criteriValutazione
 * @property int|null $criteri_valutazione_count
 * @property mixed $codqua
 * @property mixed $cont
 * @property int|float $gg_p_time_vert_year
 * @property int|float $perc_p_time_daterange
 * @property int|float $perc_p_time_year
 * @property string|null $post_type
 * @property mixed $tipco
 * @property mixed $titolo_di_studio
 * @property Collection<int, \Modules\Performance\Models\MyLog> $mailInviate
 * @property int|null $mail_inviate_count
 * @property Collection<int, \Modules\Performance\Models\MyLog> $myLogs
 * @property int|null $my_logs_count
 * @property Collection<int, \Modules\Performance\Models\Option> $options
 * @property int|null $options_count
 * @property Collection<int, Organizzativa> $otherWinnerRows
 * @property int|null $other_winner_rows_count
 * @property IndividualePesi|null $peso
 * @property IndividualePoPesi|null $pesoPo
 * @property Collection<int, Qua00f> $qua00f
 * @property int|null $qua00f_count
 * @property Collection<int, Qua00f> $qua00fDaterange
 * @property int|null $qua00f_daterange_count
 * @property Collection<int, Qua00f> $qua00fYear
 * @property int|null $qua00f_year_count
 * @property Collection<int, Qua03f> $qua03f
 * @property int|null $qua03f_count
 * @property Collection<int, Rep00f> $rep00f
 * @property int|null $rep00f_count
 * @property Collection<int, Repart> $reparts
 * @property int|null $reparts_count
 * @property StabiDirigente|null $stabiDirigente
 * @property Collection<int, Sto00f> $sto00f
 * @property int|null $sto00f_count
 * @property IndividualeTotStabi|null $totStabi
 * @property Tqu00f|null $tqu00f
 * @property Collection<int, Wstr01lx> $wstr01lx
 * @property int|null $wstr01lx_count
 * @property Collection<int, Wstr01lx> $wstr01lxYear
 * @property int|null $wstr01lx_year_count
 *
 * @method static Builder|Organizzativa newModelQuery()
 * @method static Builder|Organizzativa newQuery()
 * @method static Builder|Organizzativa ofDate(int $date)
 * @method static Builder|Organizzativa ofEnteYear(int $ente, int $year)
 * @method static Builder|Organizzativa ofQuarter(int $quarter, int $year)
 * @method static Builder|Organizzativa ofRangeDate(int $date_start, int $date_end)
 * @method static Builder|Organizzativa ofYear(int $year)
 * @method static Builder|Organizzativa query()
 * @method static Builder|Organizzativa whereAl($value)
 * @method static Builder|Organizzativa whereAnno($value)
 * @method static Builder|Organizzativa whereArricchimentoProfessionale($value)
 * @method static Builder|Organizzativa whereBudgetAssegnato($value)
 * @method static Builder|Organizzativa whereCategCoeff($value)
 * @method static Builder|Organizzativa whereCategoriaEco($value)
 * @method static Builder|Organizzativa whereClafun($value)
 * @method static Builder|Organizzativa whereCognome($value)
 * @method static Builder|Organizzativa whereCreatedAt($value)
 * @method static Builder|Organizzativa whereCreatedBy($value)
 * @method static Builder|Organizzativa whereDal($value)
 * @method static Builder|Organizzativa whereDatemod($value)
 * @method static Builder|Organizzativa whereDecurtazionePerc($value)
 * @method static Builder|Organizzativa whereDisci($value)
 * @method static Builder|Organizzativa whereDisci1($value)
 * @method static Builder|Organizzativa whereDisci1Txt($value)
 * @method static Builder|Organizzativa whereDisciTxt($value)
 * @method static Builder|Organizzativa whereEmail($value)
 * @method static Builder|Organizzativa whereEnte($value)
 * @method static Builder|Organizzativa whereEsperienzaAcquisita($value)
 * @method static Builder|Organizzativa whereGgAnno($value)
 * @method static Builder|Organizzativa whereGgAssenzSigma($value)
 * @method static Builder|Organizzativa whereGgAssenzaAnno($value)
 * @method static Builder|Organizzativa whereGgAssenzaDalal($value)
 * @method static Builder|Organizzativa whereGgParttimevert($value)
 * @method static Builder|Organizzativa whereGgParttimevertAnno($value)
 * @method static Builder|Organizzativa whereGgParttimevertDalal($value)
 * @method static Builder|Organizzativa whereGgPosiz1InSede($value)
 * @method static Builder|Organizzativa whereGgPresenzaAnno($value)
 * @method static Builder|Organizzativa whereGgPresenzaDalal($value)
 * @method static Builder|Organizzativa whereGgRuolo($value)
 * @method static Builder|Organizzativa whereGgTempoDeterminato($value)
 * @method static Builder|Organizzativa whereGgTotaleSigma($value)
 * @method static Builder|Organizzativa whereGgValidiSigma($value)
 * @method static Builder|Organizzativa whereGiorniAssenza($value)
 * @method static Builder|Organizzativa whereGiorniPresenza($value)
 * @method static Builder|Organizzativa whereGiornitempodet($value)
 * @method static Builder|Organizzativa whereHaDiritto($value)
 * @method static Builder|Organizzativa whereHhAssenzaAnno($value)
 * @method static Builder|Organizzativa whereHhAssenzaDalal($value)
 * @method static Builder|Organizzativa whereId($value)
 * @method static Builder|Organizzativa whereImpegno($value)
 * @method static Builder|Organizzativa whereImportoTotale($value)
 * @method static Builder|Organizzativa whereLastDataAssunz($value)
 * @method static Builder|Organizzativa whereListaAuth($value)
 * @method static Builder|Organizzativa whereMatr($value)
 * @method static Builder|Organizzativa whereMotivo($value)
 * @method static Builder|Organizzativa whereNome($value)
 * @method static Builder|Organizzativa whereNote($value)
 * @method static Builder|Organizzativa whereOreAssenza($value)
 * @method static Builder|Organizzativa whereOreAssenzaAnno($value)
 * @method static Builder|Organizzativa whereOree($value)
 * @method static Builder|Organizzativa whereOret($value)
 * @method static Builder|Organizzativa wherePercParttime($value)
 * @method static Builder|Organizzativa wherePercParttimeAnno($value)
 * @method static Builder|Organizzativa wherePercParttimeDalal($value)
 * @method static Builder|Organizzativa wherePercParttimepond($value)
 * @method static Builder|Organizzativa wherePercParttimepondAnno($value)
 * @method static Builder|Organizzativa wherePercParttimepondDalal($value)
 * @method static Builder|Organizzativa wherePesoArricchimentoProfessionale($value)
 * @method static Builder|Organizzativa wherePesoEsperienzaAcquisita($value)
 * @method static Builder|Organizzativa wherePesoImpegno($value)
 * @method static Builder|Organizzativa wherePesoQualitaPrestazione($value)
 * @method static Builder|Organizzativa wherePesoRisultatiOttenuti($value)
 * @method static Builder|Organizzativa wherePosfun($value)
 * @method static Builder|Organizzativa wherePosiz($value)
 * @method static Builder|Organizzativa wherePosizTxt($value)
 * @method static Builder|Organizzativa wherePosizioneEco($value)
 * @method static Builder|Organizzativa wherePropro($value)
 * @method static Builder|Organizzativa whereQua2ka($value)
 * @method static Builder|Organizzativa whereQua2kd($value)
 * @method static Builder|Organizzativa whereQualitaPrestazione($value)
 * @method static Builder|Organizzativa whereQuotaEffettiva($value)
 * @method static Builder|Organizzativa whereQuotaTeorica($value)
 * @method static Builder|Organizzativa whereRep2ka($value)
 * @method static Builder|Organizzativa whereRep2kd($value)
 * @method static Builder|Organizzativa whereRepar($value)
 * @method static Builder|Organizzativa whereReparTxt($value)
 * @method static Builder|Organizzativa whereReparval($value)
 * @method static Builder|Organizzativa whereResti($value)
 * @method static Builder|Organizzativa whereRestiPond($value)
 * @method static Builder|Organizzativa whereRisultatiOttenuti($value)
 * @method static Builder|Organizzativa whereSchedaType($value)
 * @method static Builder|Organizzativa whereStabi($value)
 * @method static Builder|Organizzativa whereStabiTxt($value)
 * @method static Builder|Organizzativa whereStabival($value)
 * @method static Builder|Organizzativa whereTotalePunteggio($value)
 * @method static Builder|Organizzativa whereUpdatedAt($value)
 * @method static Builder|Organizzativa whereUpdatedBy($value)
 * @method static Builder|Organizzativa withDays(int $date_min, int $date_max)
 * @method static Builder|Organizzativa withTotPunt()
 *
 * @mixin \Eloquent
 */
class Organizzativa extends BaseModel
{
    use FunctionTrait;
    use MutatorTrait;
    use RelationshipTrait;
    use SchedaTrait;
    use SigmaModelTrait;
    use Updater;
    use HasCriteriValutazione;

    public string $from_field = 'dal';

    public string $to_field = 'al';

    protected $connection = 'performance';
    protected $table = 'performance_organizzativa';

    protected $fillable = [
        'id', 'ente', 'matr', 'cognome', 'nome', 'email', 'propro', 'posfun',
        'categoria_eco', 'posiz', 'posiz_txt', 'clafun', 'stabi', 'stabi_txt',
        'repar', 'repar_txt', 'stabival', 'reparval',
        'gg_fuori_sede', 'n_gg_fuori_sede', 'gg_aspettative_in_sede', 'gg_aspettative_fuori_sede',
        'gg_posiz_1_in_sede', 'gg_presenza_anno', 'gg_assenza_anno', 'rep003', 'disci1', 'disci1_txt',
        'rep2kd', 'rep2ka', 'qua2kd', 'qua2ka', 'st2kas', 'st2kdi', 'dal', 'al', 'gg', 'anno',
        'esperienza_acquisita', 'peso_esperienza_acquisita', 'risultati_ottenuti', 'peso_risultati_ottenuti',
        'arricchimento_professionale', 'peso_arricchimento_professionale', 'impegno', 'peso_impegno',
        'qualita_prestazione', 'peso_qualita_prestazione', 'totale', 'totale_pond',
        'ha_diritto', 'motivo', 'gg_aspettative_pond_in_sede', 'gg_aspettative_pond_fuori_sede',
        'categoria_ecoval', 'posfunval', 'gg_cateco_in_sede', 'gg_cateco_fuori_sede',
        'gg_cateco_posfun_in_sede', 'gg_cateco_posfun_fuori_sede', 'gg_cateco_no_posfun_in_sede', 'gg_cateco_no_posfun_fuori_sede',
        'gg_no_cateco_in_sede', 'gg_no_cateco_fuori_sede', 'gg_no_cateco_posfun_in_sede', 'gg_no_cateco_posfun_fuori_sede',
        'gg_tot_pond', 'asz2ka', 'gg_presenze_in_anno', 'gg_assenze_in_anno', 'ore_assenze_in_anno',
        'vincitore', 'last_data_assunz', 'type',
        'gg_assenza_dalal', 'hh_assenza_dalal',
        /*
        'gg_in_sede', 'n_gg_in_sede',
        */
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    public function casts(): array
    {
        return array_merge(parent::casts(), [
            'id' => 'integer',
            'ente' => 'integer',
            'matr' => 'integer',
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
            'totale_punteggio' => 'float',
            'peso_esperienza_acquisita' => 'float',
            'peso_risultati_ottenuti' => 'float',
            'peso_arricchimento_professionale' => 'float',
            'peso_impegno' => 'float',
            'peso_qualita_prestazione' => 'float',
            'perc_parttime' => 'float',
            'perc_parttimepond' => 'float',
            'gg_parttimevert' => 'integer',
            'gg_tempo_determinato' => 'integer',
            'gg_posiz_1_in_sede' => 'integer',
            'gg_assenza_anno' => 'integer',
            'gg_presenza_anno' => 'integer',
            'gg_ruolo' => 'integer',
            'last_data_assunz' => 'integer',
            'clafun' => 'integer',
            'disci1' => 'integer',
            'gg_assenza_dalal' => 'integer',
            'hh_assenza_anno' => 'float',
            'hh_assenza_dalal' => 'float',
            'gg_parttimevert_anno' => 'integer',
            'perc_parttimepond_anno' => 'float',
            'perc_parttimepond_dalal' => 'float',
            'gg_parttimevert_dalal' => 'integer',
            'gg_presenza_dalal' => 'integer',
            'perc_parttime_dalal' => 'float',
            'perc_parttime_anno' => 'float',
            'gg_anno' => 'float'
        ]);
    }

    /**
     * @return HasMany<IndividualeAssenze>
     */
    public function assenze(): HasMany
    {
        return $this->hasMany(IndividualeAssenze::class, 'anno', 'anno');
    }

    public function listaCodiciAspettative(): string
    {
        return $this->assenze()
            ->get()
            ->map(static fn ($item): string => $item->tipo.'-'.$item->codice)
            ->implode(',');
    }

    public function aszEff(): HasMany
    {
        $lista_codici_aspettative = $this->listaCodiciAspettative();

        $asz = $this->asz()
            ->whereRaw('find_in_set(concat(asztip,"-",aszcod),"'.$lista_codici_aspettative.'")');

        // $asz->ddRawSql();
        return $asz;
    }

    /**
     * @return HasMany<Asz00k1>
     */
    public function asz(): HasMany
    {
        $tbl = app(Asz00k1::class)->getTable();

        return $this->hasMany(Asz00k1::class, 'matr', 'matr')
            ->where($tbl.'.ente', $this->ente)
            ->whereRaw($tbl.'.aszann=""')
            ->where('asz2kd', '>', $this->getDateMin());
    }

    public function getDateMin(): int
    {
        return $this->anno * 10000 + 0101;
    }

    public function getDateMax(): int
    {
        return $this->anno * 10000 + 1231;
    }

    /**
     * @return HasMany<Individuale, Organizzativa>
     */
    public function cards(): HasMany
    {
        return $this->hasMany(Individuale::class, 'matr', 'matr')
            ->where('ente', $this->ente)
            ->where('anno', $this->anno);
    }

    /**
     * @return HasMany<IndividualeAssenze, Organizzativa>
     */
    public function codiciAssenze(): HasMany
    {
        return $this->hasMany(IndividualeAssenze::class, 'matr', 'matr')
            ->where('ente', $this->ente)
            ->where('anno', $this->anno);
    }

    /**
     * @return HasMany<CriteriEsclusione, Organizzativa>
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
        return $this->belongsTo(CriteriMaggiorazione::class, 'organizzativa_id');
    }

    /**
     * @return HasMany<CriteriOption, Organizzativa>
     */
    public function criteriOptions(): HasMany
    {
        return $this->hasMany(CriteriOption::class, 'anno', 'anno');
    }

   
    /**
     * @return HasMany<MyLog, Organizzativa>
     */
    public function mailInviate(): HasMany
    {
        return $this->hasMany(MyLog::class, 'id_tbl', 'id')
            ->where('tbl', $this->getTable());
    }

   

    /**
     * @return HasMany<Option, Organizzativa>
     */
    public function options(): HasMany
    {
        return $this->hasMany(Option::class, 'anno', 'anno');
    }

    /**
     * @return HasMany<self>
     */
    public function otherWinnerRows(): HasMany
    {
        return $this->hasMany(self::class, 'matr', 'matr')
            ->where('ente', $this->ente)
            ->where('anno', $this->anno)
            ->where('id', '!=', $this->id);
    }

    /**
     * @return BelongsTo<IndividualePesi, self>
     */
    public function peso(): BelongsTo
    {
        return $this->belongsTo(IndividualePesi::class, 'organizzativa_id');
    }

    /**
     * @return BelongsTo<IndividualePoPesi, self>
     */
    public function pesoPo(): BelongsTo
    {
        return $this->belongsTo(IndividualePoPesi::class, 'organizzativa_id');
    }

    /**
     * @return BelongsTo<StabiDirigente, self>
     */
    public function stabiDirigente(): BelongsTo
    {
        return $this->belongsTo(StabiDirigente::class, 'organizzativa_id');
    }

    /**
     * @return BelongsTo<IndividualeTotStabi, self>
     */
    public function totStabi(): BelongsTo
    {
        return $this->belongsTo(IndividualeTotStabi::class, 'organizzativa_id');
    }

    /**
     * @param array<string, mixed> $input
     * @return Builder<self>
     */
    public function filter(array $input): Builder
    {
        return $this->query()
            ->when($input['ente'] ?? null, fn ($query, $ente) => $query->where('ente', $ente))
            ->when($input['anno'] ?? null, fn ($query, $anno) => $query->where('anno', $anno))
            ->when($input['matr'] ?? null, fn ($query, $matr) => $query->where('matr', $matr))
            ->when($input['stabi'] ?? null, fn ($query, $stabi) => $query->where('stabi', $stabi))
            ->when($input['repar'] ?? null, fn ($query, $repar) => $query->where('repar', $repar))
            ->when($input['disci'] ?? null, fn ($query, $disci) => $query->where('disci', $disci))
            ->when($input['posiz'] ?? null, fn ($query, $posiz) => $query->where('posiz', $posiz))
            ->when($input['propro'] ?? null, fn ($query, $propro) => $query->where('propro', $propro))
            ->when($input['posfun'] ?? null, fn ($query, $posfun) => $query->where('posfun', $posfun))
            ->when($input['categoria_eco'] ?? null, fn ($query, $categoria_eco) => $query->where('categoria_eco', $categoria_eco))
            ->when($input['qua2kd'] ?? null, fn ($query, $qua2kd) => $query->where('qua2kd', $qua2kd))
            ->when($input['qua2ka'] ?? null, fn ($query, $qua2ka) => $query->where('qua2ka', $qua2ka))
            ->when($input['dal'] ?? null, fn ($query, $dal) => $query->where('dal', $dal))
            ->when($input['al'] ?? null, fn ($query, $al) => $query->where('al', $al))
            ->when($input['giornitempodet'] ?? null, fn ($query, $giornitempodet) => $query->where('giornitempodet', $giornitempodet))
            ->when($input['ha_diritto'] ?? null, fn ($query, $ha_diritto) => $query->where('ha_diritto', $ha_diritto))
            ->when($input['motivo'] ?? null, fn ($query, $motivo) => $query->where('motivo', $motivo))
            ->when($input['esperienza_acquisita'] ?? null, fn ($query, $esperienza_acquisita) => $query->where('esperienza_acquisita', $esperienza_acquisita))
            ->when($input['risultati_ottenuti'] ?? null, fn ($query, $risultati_ottenuti) => $query->where('risultati_ottenuti', $risultati_ottenuti))
            ->when($input['arricchimento_professionale'] ?? null, fn ($query, $arricchimento_professionale) => $query->where('arricchimento_professionale', $arricchimento_professionale))
            ->when($input['impegno'] ?? null, fn ($query, $impegno) => $query->where('impegno', $impegno))
            ->when($input['qualita_prestazione'] ?? null, fn ($query, $qualita_prestazione) => $query->where('qualita_prestazione', $qualita_prestazione))
            ->when($input['totale_punteggio'] ?? null, fn ($query, $totale_punteggio) => $query->where('totale_punteggio', $totale_punteggio))
            ->when($input['lista_auth'] ?? null, fn ($query, $lista_auth) => $query->where('lista_auth', $lista_auth))
            ->when($input['peso_esperienza_acquisita'] ?? null, fn ($query, $peso_esperienza_acquisita) => $query->where('peso_esperienza_acquisita', $peso_esperienza_acquisita))
            ->when($input['peso_risultati_ottenuti'] ?? null, fn ($query, $peso_risultati_ottenuti) => $query->where('peso_risultati_ottenuti', $peso_risultati_ottenuti))
            ->when($input['peso_arricchimento_professionale'] ?? null, fn ($query, $peso_arricchimento_professionale) => $query->where('peso_arricchimento_professionale', $peso_arricchimento_professionale))
            ->when($input['peso_impegno'] ?? null, fn ($query, $peso_impegno) => $query->where('peso_impegno', $peso_impegno))
            ->when($input['peso_qualita_prestazione'] ?? null, fn ($query, $peso_qualita_prestazione) => $query->where('peso_qualita_prestazione', $peso_qualita_prestazione))
            ->when($input['datemod'] ?? null, fn ($query, $datemod) => $query->where('datemod', $datemod))
            ->when($input['note'] ?? null, fn ($query, $note) => $query->where('note', $note))
            ->when($input['oree'] ?? null, fn ($query, $oree) => $query->where('oree', $oree))
            ->when($input['oret'] ?? null, fn ($query, $oret) => $query->where('oret', $oret))
            ->when($input['perc_parttime'] ?? null, fn ($query, $perc_parttime) => $query->where('perc_parttime', $perc_parttime))
            ->when($input['perc_parttimepond'] ?? null, fn ($query, $perc_parttimepond) => $query->where('perc_parttimepond', $perc_parttimepond))
            ->when($input['gg_parttimevert'] ?? null, fn ($query, $gg_parttimevert) => $query->where('gg_parttimevert', $gg_parttimevert))
            ->when($input['ore_assenza'] ?? null, fn ($query, $ore_assenza) => $query->where('ore_assenza', $ore_assenza))
            ->when($input['giorni_assenza'] ?? null, fn ($query, $giorni_assenza) => $query->where('giorni_assenza', $giorni_assenza))
            ->when($input['giorni_presenza'] ?? null, fn ($query, $giorni_presenza) => $query->where('giorni_presenza', $giorni_presenza))
            ->when($input['categ_coeff'] ?? null, fn ($query, $categ_coeff) => $query->where('categ_coeff', $categ_coeff))
            ->when($input['quota_teorica'] ?? null, fn ($query, $quota_teorica) => $query->where('quota_teorica', $quota_teorica))
            ->when($input['budget_assegnato'] ?? null, fn ($query, $budget_assegnato) => $query->where('budget_assegnato', $budget_assegnato))
            ->when($input['quota_effettiva'] ?? null, fn ($query, $quota_effettiva) => $query->where('quota_effettiva', $quota_effettiva))
            ->when($input['resti'] ?? null, fn ($query, $resti) => $query->where('resti', $resti))
            ->when($input['resti_pond'] ?? null, fn ($query, $resti_pond) => $query->where('resti_pond', $resti_pond))
            ->when($input['importo_totale'] ?? null, fn ($query, $importo_totale) => $query->where('importo_totale', $importo_totale))
            ->when($input['gg_totale_sigma'] ?? null, fn ($query, $gg_totale_sigma) => $query->where('gg_totale_sigma', $gg_totale_sigma))
            ->when($input['gg_validi_sigma'] ?? null, fn ($query, $gg_validi_sigma) => $query->where('gg_validi_sigma', $gg_validi_sigma))
            ->when($input['gg_assenz_sigma'] ?? null, fn ($query, $gg_assenz_sigma) => $query->where('gg_assenz_sigma', $gg_assenz_sigma))
            ->when($input['decurtazione_perc'] ?? null, fn ($query, $decurtazione_perc) => $query->where('decurtazione_perc', $decurtazione_perc))
            ->when($input['gg_tempo_determinato'] ?? null, fn ($query, $gg_tempo_determinato) => $query->where('gg_tempo_determinato', $gg_tempo_determinato))
            ->when($input['gg_posiz_1_in_sede'] ?? null, fn ($query, $gg_posiz_1_in_sede) => $query->where('gg_posiz_1_in_sede', $gg_posiz_1_in_sede))
            ->when($input['gg_assenza_anno'] ?? null, fn ($query, $gg_assenza_anno) => $query->where('gg_assenza_anno', $gg_assenza_anno))
            ->when($input['gg_presenza_anno'] ?? null, fn ($query, $gg_presenza_anno) => $query->where('gg_presenza_anno', $gg_presenza_anno))
            ->when($input['gg_ruolo'] ?? null, fn ($query, $gg_ruolo) => $query->where('gg_ruolo', $gg_ruolo))
            ->when($input['last_data_assunz'] ?? null, fn ($query, $last_data_assunz) => $query->where('last_data_assunz', $last_data_assunz))
            ->when($input['ore_assenza_anno'] ?? null, fn ($query, $ore_assenza_anno) => $query->where('ore_assenza_anno', $ore_assenza_anno))
            ->when($input['created_by'] ?? null, fn ($query, $created_by) => $query->where('created_by', $created_by))
            ->when($input['updated_by'] ?? null, fn ($query, $updated_by) => $query->where('updated_by', $updated_by))
            ->when($input['posiz_txt'] ?? null, fn ($query, $posiz_txt) => $query->where('posiz_txt', $posiz_txt))
            ->when($input['clafun'] ?? null, fn ($query, $clafun) => $query->where('clafun', $clafun))
            ->when($input['disci1'] ?? null, fn ($query, $disci1) => $query->where('disci1', $disci1))
            ->when($input['disci1_txt'] ?? null, fn ($query, $disci1_txt) => $query->where('disci1_txt', $disci1_txt))
            ->when($input['gg_assenza_dalal'] ?? null, fn ($query, $gg_assenza_dalal) => $query->where('gg_assenza_dalal', $gg_assenza_dalal))
            ->when($input['hh_assenza_anno'] ?? null, fn ($query, $hh_assenza_anno) => $query->where('hh_assenza_anno', $hh_assenza_anno))
            ->when($input['hh_assenza_dalal'] ?? null, fn ($query, $hh_assenza_dalal) => $query->where('hh_assenza_dalal', $hh_assenza_dalal))
            ->when($input['gg_parttimevert_anno'] ?? null, fn ($query, $gg_parttimevert_anno) => $query->where('gg_parttimevert_anno', $gg_parttimevert_anno))
            ->when($input['perc_parttimepond_anno'] ?? null, fn ($query, $perc_parttimepond_anno) => $query->where('perc_parttimepond_anno', $perc_parttimepond_anno))
            ->when($input['perc_parttimepond_dalal'] ?? null, fn ($query, $perc_parttimepond_dalal) => $query->where('perc_parttimepond_dalal', $perc_parttimepond_dalal))
            ->when($input['gg_parttimevert_dalal'] ?? null, fn ($query, $gg_parttimevert_dalal) => $query->where('gg_parttimevert_dalal', $gg_parttimevert_dalal))
            ->when($input['gg_presenza_dalal'] ?? null, fn ($query, $gg_presenza_dalal) => $query->where('gg_presenza_dalal', $gg_presenza_dalal))
            ->when($input['perc_parttime_dalal'] ?? null, fn ($query, $perc_parttime_dalal) => $query->where('perc_parttime_dalal', $perc_parttime_dalal))
            ->when($input['perc_parttime_anno'] ?? null, fn ($query, $perc_parttime_anno) => $query->where('perc_parttime_anno', $perc_parttime_anno))
            ->when($input['posizione_eco'] ?? null, fn ($query, $posizione_eco) => $query->where('posizione_eco', $posizione_eco))
            ->when($input['gg_anno'] ?? null, fn ($query, $gg_anno) => $query->where('gg_anno', $gg_anno))
            ->when($input['post_type'] ?? null, fn ($query, $post_type) => $query->where('post_type', $post_type))
            ->when($input['titolo_di_studio'] ?? null, fn ($query, $titolo_di_studio) => $query->where('titolo_di_studio', $titolo_di_studio));
    }
}
