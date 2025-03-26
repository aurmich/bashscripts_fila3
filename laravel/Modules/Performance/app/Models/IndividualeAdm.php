<?php

declare(strict_types=1);

namespace Modules\Performance\Models;

// ---------- models -------
// ----------traits ---
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
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
use Modules\Sigma\Models\Traits\SigmaModelTrait;
use Modules\Sigma\Models\Wstr01lx;
// ---- services ---
// passare ad arrayservice
use Modules\Xot\Traits\Updater;

/**
 * Modules\Performance\Models\IndividualeAdm.
 *
 * @property int $id
 * @property string|null $type
 * @property string|null $post_type
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
 * @property string|null $ore_assenza_anno
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $created_by
 * @property string|null $updated_by
 * @property string|null $posiz_txt
 * @property int|null $clafun
 * @property int|null $disci1
 * @property string|null $disci1_txt
 * @property int $gg_ruolo
 * @property int|null $last_data_assunz
 * @property string|null $perc_parttime_anno
 * @property string|null $perc_parttime_dalal
 * @property int|null $gg_parttimevert_anno
 * @property int|null $gg_parttimevert_dalal
 * @property float|null $perc_parttimepond_anno
 * @property string|null $perc_parttimepond_dalal
 * @property int|null $gg_presenza_dalal
 * @property int|null $gg_assenza_dalal
 * @property float|null $hh_assenza_anno
 * @property float|null $hh_assenza_dalal
 * @property string|null $lang
 * @property int|null $excellence
 * @property int|null $codqua
 * @property int|null $cont
 * @property int|null $tipco
 * @property string|null $posizione_eco
 * @property float $gg_anno
 * @property-read Collection<int, Sto00f> $Sto00fYear
 * @property-read int|null $sto00f_year_count
 * @property-read Collection<int, Ana02f> $ana02f
 * @property-read int|null $ana02f_count
 * @property-read Ana10f|null $ana10f
 * @property-read Anag|null $anag
 * @property-read Collection<int, Asz00f> $asz00f
 * @property-read int|null $asz00f_count
 * @property-read Collection<int, Asz00k1> $asz00k1
 * @property-read int|null $asz00k1_count
 * @property-read Collection<int, Asz00k1> $asz00k1Year
 * @property-read int|null $asz00k1_year_count
 * @property-read Collection<int, \Modules\Performance\Models\Individuale> $cards
 * @property-read int|null $cards_count
 * @property-read Collection<int, \Modules\Performance\Models\IndividualeAssenze> $codiciAssenze
 * @property-read int|null $codici_assenze_count
 * @property-read Collection<int, \Modules\Performance\Models\CriteriEsclusione> $criteriEsclusione
 * @property-read int|null $criteri_esclusione_count
 * @property-read \Modules\Performance\Models\CriteriMaggiorazione|null $criteriMaggiorazione
 * @property-read Collection<int, \Modules\Performance\Models\CriteriOption> $criteriOptions
 * @property-read int|null $criteri_options_count
 * @property-read Collection<int, \Modules\Performance\Models\CriteriValutazione> $criteriValutazione
 * @property-read int|null $criteri_valutazione_count
 * @property-read int|float $gg_p_time_vert_year
 * @property-read int|float $perc_p_time_daterange
 * @property-read int|float $perc_p_time_year
 * @property-read mixed $titolo_di_studio
 * @property-read Collection<int, \Modules\Performance\Models\MyLog> $mailInviate
 * @property-read int|null $mail_inviate_count
 * @property-read Collection<int, \Modules\Performance\Models\MyLog> $myLogs
 * @property-read int|null $my_logs_count
 * @property-read Collection<int, \Modules\Performance\Models\Option> $options
 * @property-read int|null $options_count
 * @property-read Collection<int, IndividualeAdm> $otherWinnerRows
 * @property-read int|null $other_winner_rows_count
 * @property-read \Modules\Performance\Models\IndividualePesi|null $peso
 * @property-read \Modules\Performance\Models\IndividualePoPesi|null $pesoPo
 * @property-read Collection<int, Qua00f> $qua00f
 * @property-read int|null $qua00f_count
 * @property-read Collection<int, Qua00f> $qua00fDaterange
 * @property-read int|null $qua00f_daterange_count
 * @property-read Collection<int, Qua00f> $qua00fYear
 * @property-read int|null $qua00f_year_count
 * @property-read Collection<int, Qua03f> $qua03f
 * @property-read int|null $qua03f_count
 * @property-read Collection<int, Rep00f> $rep00f
 * @property-read int|null $rep00f_count
 * @property-read Collection<int, Repart> $reparts
 * @property-read int|null $reparts_count
 * @property-read \Modules\Performance\Models\StabiDirigente|null $stabiDirigente
 * @property-read Collection<int, Sto00f> $sto00f
 * @property-read int|null $sto00f_count
 * @property-read \Modules\Performance\Models\IndividualeTotStabi|null $totStabi
 * @property-read Tqu00f|null $tqu00f
 * @property-read Collection<int, Wstr01lx> $wstr01lx
 * @property-read int|null $wstr01lx_count
 * @property-read Collection<int, Wstr01lx> $wstr01lxYear
 * @property-read int|null $wstr01lx_year_count
 *
 * @method static Builder|IndividualeAdm newModelQuery()
 * @method static Builder|IndividualeAdm newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BaseIndividualeModel ofDate(int $date)
 * @method static \Illuminate\Database\Eloquent\Builder|BaseIndividualeModel ofEnteYear(int $ente, int $year)
 * @method static \Illuminate\Database\Eloquent\Builder|BaseIndividualeModel ofQuarter(int $quarter, int $year)
 * @method static \Illuminate\Database\Eloquent\Builder|BaseIndividualeModel ofRangeDate(int $date_start, int $date_end)
 * @method static \Illuminate\Database\Eloquent\Builder|BaseIndividualeModel ofYear(int $year)
 * @method static Builder|IndividualeAdm query()
 * @method static Builder|IndividualeAdm whereAl($value)
 * @method static Builder|IndividualeAdm whereAnno($value)
 * @method static Builder|IndividualeAdm whereArricchimentoProfessionale($value)
 * @method static Builder|IndividualeAdm whereBudgetAssegnato($value)
 * @method static Builder|IndividualeAdm whereCategCoeff($value)
 * @method static Builder|IndividualeAdm whereCategoriaEco($value)
 * @method static Builder|IndividualeAdm whereClafun($value)
 * @method static Builder|IndividualeAdm whereCodqua($value)
 * @method static Builder|IndividualeAdm whereCognome($value)
 * @method static Builder|IndividualeAdm whereCont($value)
 * @method static Builder|IndividualeAdm whereCreatedAt($value)
 * @method static Builder|IndividualeAdm whereCreatedBy($value)
 * @method static Builder|IndividualeAdm whereDal($value)
 * @method static Builder|IndividualeAdm whereDatemod($value)
 * @method static Builder|IndividualeAdm whereDecurtazionePerc($value)
 * @method static Builder|IndividualeAdm whereDisci($value)
 * @method static Builder|IndividualeAdm whereDisci1($value)
 * @method static Builder|IndividualeAdm whereDisci1Txt($value)
 * @method static Builder|IndividualeAdm whereDisciTxt($value)
 * @method static Builder|IndividualeAdm whereEmail($value)
 * @method static Builder|IndividualeAdm whereEnte($value)
 * @method static Builder|IndividualeAdm whereEsperienzaAcquisita($value)
 * @method static Builder|IndividualeAdm whereExcellence($value)
 * @method static Builder|IndividualeAdm whereGgAnno($value)
 * @method static Builder|IndividualeAdm whereGgAssenzSigma($value)
 * @method static Builder|IndividualeAdm whereGgAssenzaAnno($value)
 * @method static Builder|IndividualeAdm whereGgAssenzaDalal($value)
 * @method static Builder|IndividualeAdm whereGgParttimevert($value)
 * @method static Builder|IndividualeAdm whereGgParttimevertAnno($value)
 * @method static Builder|IndividualeAdm whereGgParttimevertDalal($value)
 * @method static Builder|IndividualeAdm whereGgPosiz1InSede($value)
 * @method static Builder|IndividualeAdm whereGgPresenzaAnno($value)
 * @method static Builder|IndividualeAdm whereGgPresenzaDalal($value)
 * @method static Builder|IndividualeAdm whereGgRuolo($value)
 * @method static Builder|IndividualeAdm whereGgTempoDeterminato($value)
 * @method static Builder|IndividualeAdm whereGgTotaleSigma($value)
 * @method static Builder|IndividualeAdm whereGgValidiSigma($value)
 * @method static Builder|IndividualeAdm whereGiorniAssenza($value)
 * @method static Builder|IndividualeAdm whereGiorniPresenza($value)
 * @method static Builder|IndividualeAdm whereGiornitempodet($value)
 * @method static Builder|IndividualeAdm whereHaDiritto($value)
 * @method static Builder|IndividualeAdm whereHhAssenzaAnno($value)
 * @method static Builder|IndividualeAdm whereHhAssenzaDalal($value)
 * @method static Builder|IndividualeAdm whereId($value)
 * @method static Builder|IndividualeAdm whereImpegno($value)
 * @method static Builder|IndividualeAdm whereImportoTotale($value)
 * @method static Builder|IndividualeAdm whereLang($value)
 * @method static Builder|IndividualeAdm whereLastDataAssunz($value)
 * @method static Builder|IndividualeAdm whereListaAuth($value)
 * @method static Builder|IndividualeAdm whereMatr($value)
 * @method static Builder|IndividualeAdm whereMotivo($value)
 * @method static Builder|IndividualeAdm whereNome($value)
 * @method static Builder|IndividualeAdm whereNote($value)
 * @method static Builder|IndividualeAdm whereOreAssenza($value)
 * @method static Builder|IndividualeAdm whereOreAssenzaAnno($value)
 * @method static Builder|IndividualeAdm whereOree($value)
 * @method static Builder|IndividualeAdm whereOret($value)
 * @method static Builder|IndividualeAdm wherePercParttime($value)
 * @method static Builder|IndividualeAdm wherePercParttimeAnno($value)
 * @method static Builder|IndividualeAdm wherePercParttimeDalal($value)
 * @method static Builder|IndividualeAdm wherePercParttimepond($value)
 * @method static Builder|IndividualeAdm wherePercParttimepondAnno($value)
 * @method static Builder|IndividualeAdm wherePercParttimepondDalal($value)
 * @method static Builder|IndividualeAdm wherePesoArricchimentoProfessionale($value)
 * @method static Builder|IndividualeAdm wherePesoEsperienzaAcquisita($value)
 * @method static Builder|IndividualeAdm wherePesoImpegno($value)
 * @method static Builder|IndividualeAdm wherePesoQualitaPrestazione($value)
 * @method static Builder|IndividualeAdm wherePesoRisultatiOttenuti($value)
 * @method static Builder|IndividualeAdm wherePosfun($value)
 * @method static Builder|IndividualeAdm wherePosiz($value)
 * @method static Builder|IndividualeAdm wherePosizTxt($value)
 * @method static Builder|IndividualeAdm wherePosizioneEco($value)
 * @method static Builder|IndividualeAdm wherePostType($value)
 * @method static Builder|IndividualeAdm wherePropro($value)
 * @method static Builder|IndividualeAdm whereQua2ka($value)
 * @method static Builder|IndividualeAdm whereQua2kd($value)
 * @method static Builder|IndividualeAdm whereQualitaPrestazione($value)
 * @method static Builder|IndividualeAdm whereQuotaEffettiva($value)
 * @method static Builder|IndividualeAdm whereQuotaTeorica($value)
 * @method static Builder|IndividualeAdm whereRep2ka($value)
 * @method static Builder|IndividualeAdm whereRep2kd($value)
 * @method static Builder|IndividualeAdm whereRepar($value)
 * @method static Builder|IndividualeAdm whereReparTxt($value)
 * @method static Builder|IndividualeAdm whereReparval($value)
 * @method static Builder|IndividualeAdm whereResti($value)
 * @method static Builder|IndividualeAdm whereRestiPond($value)
 * @method static Builder|IndividualeAdm whereRisultatiOttenuti($value)
 * @method static Builder|IndividualeAdm whereSchedaType($value)
 * @method static Builder|IndividualeAdm whereStabi($value)
 * @method static Builder|IndividualeAdm whereStabiTxt($value)
 * @method static Builder|IndividualeAdm whereStabival($value)
 * @method static Builder|IndividualeAdm whereTipco($value)
 * @method static Builder|IndividualeAdm whereTotalePunteggio($value)
 * @method static Builder|IndividualeAdm whereUpdatedAt($value)
 * @method static Builder|IndividualeAdm whereUpdatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BaseIndividualeModel withDays(int $date_min, int $date_max)
 * @method static \Illuminate\Database\Eloquent\Builder|BaseIndividualeModel withTotPunt()
 *
 * @mixin \Eloquent
 */
class IndividualeAdm extends BaseIndividualeModel
{
    public string $from_field = 'dal';

    public string $to_field = 'al';

    /*
    use Updater;
    use SigmaModelTrait;
    use Traits\RelationshipTrait;
    use Traits\MutatorTrait;
    use Traits\FunctionTrait;

    protected $connection = 'performance'; // this will use the specified database connection
    protected $table      = 'performance_individuale';
    //public $timestamps= false;
    protected $fillable = ['id', 'ente', 'matr', 'cognome', 'nome', 'email', 'propro',
        'posfun', 'categoria_eco', 'posiz', 'posiz_txt', 'clafun', 'stabi', 'stabi_txt',
        'repar', 'repar_txt', 'stabival', 'reparval','gg_posiz_1_in_sede', 'gg_presenza_anno',
        'gg_assenza_anno', 'disci1', 'disci1_txt', 'rep2kd', 'rep2ka', 'qua2kd', 'qua2ka',
        'dal', 'al', 'anno', 'esperienza_acquisita', 'peso_esperienza_acquisita', 'risultati_ottenuti',
        'peso_risultati_ottenuti', 'arricchimento_professionale', 'peso_arricchimento_professionale',
        'impegno', 'peso_impegno', 'qualita_prestazione', 'peso_qualita_prestazione', 'ha_diritto', 'motivo',
        'last_data_assunz','excellence',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];
    */
}
