<?php

declare(strict_types=1);

namespace Modules\Performance\Models;

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
use Modules\Sigma\Models\Wstr01lx;
use Parental\HasParent;


/**
 * Modules\Performance\Models\IndividualeRegionale.
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
 * @property-read Collection<int, IndividualeRegionale> $mails
 * @property-read int|null $mails_count
 * @property-read Collection<int, \Modules\Performance\Models\MyLog> $myLogs
 * @property-read int|null $my_logs_count
 * @property-read Collection<int, \Modules\Performance\Models\Option> $options
 * @property-read int|null $options_count
 * @property-read Collection<int, IndividualeRegionale> $otherWinnerRows
 * @property-read int|null $other_winner_rows_count
 * @property-read \Modules\Performance\Models\IndividualePesi|null $peso
 * @property-read \Modules\Performance\Models\IndividualePoPesi|null $pesoPo
 * @property-read Collection<int, Qua00f> $qua00f
 * @property-read int|null $qua00f_count
 * @property-read Collection<int, Qua00f> $qua00fDaterange
 * @property-read int|null $qua00f_daterange_count
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
 * @method static Builder|IndividualeRegionale newModelQuery()
 * @method static Builder|IndividualeRegionale newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BaseIndividualeModel ofDate(int $date)
 * @method static \Illuminate\Database\Eloquent\Builder|BaseIndividualeModel ofEnteYear(int $ente, int $year)
 * @method static \Illuminate\Database\Eloquent\Builder|BaseIndividualeModel ofQuarter(int $quarter, int $year)
 * @method static \Illuminate\Database\Eloquent\Builder|BaseIndividualeModel ofRangeDate(int $date_start, int $date_end)
 * @method static \Illuminate\Database\Eloquent\Builder|BaseIndividualeModel ofYear(int $year)
 * @method static Builder|IndividualeRegionale query()
 * @method static Builder|IndividualeRegionale whereAl($value)
 * @method static Builder|IndividualeRegionale whereAnno($value)
 * @method static Builder|IndividualeRegionale whereArricchimentoProfessionale($value)
 * @method static Builder|IndividualeRegionale whereBudgetAssegnato($value)
 * @method static Builder|IndividualeRegionale whereCategCoeff($value)
 * @method static Builder|IndividualeRegionale whereCategoriaEco($value)
 * @method static Builder|IndividualeRegionale whereClafun($value)
 * @method static Builder|IndividualeRegionale whereCodqua($value)
 * @method static Builder|IndividualeRegionale whereCognome($value)
 * @method static Builder|IndividualeRegionale whereCont($value)
 * @method static Builder|IndividualeRegionale whereCreatedAt($value)
 * @method static Builder|IndividualeRegionale whereCreatedBy($value)
 * @method static Builder|IndividualeRegionale whereDal($value)
 * @method static Builder|IndividualeRegionale whereDatemod($value)
 * @method static Builder|IndividualeRegionale whereDecurtazionePerc($value)
 * @method static Builder|IndividualeRegionale whereDisci($value)
 * @method static Builder|IndividualeRegionale whereDisci1($value)
 * @method static Builder|IndividualeRegionale whereDisci1Txt($value)
 * @method static Builder|IndividualeRegionale whereDisciTxt($value)
 * @method static Builder|IndividualeRegionale whereEmail($value)
 * @method static Builder|IndividualeRegionale whereEnte($value)
 * @method static Builder|IndividualeRegionale whereEsperienzaAcquisita($value)
 * @method static Builder|IndividualeRegionale whereExcellence($value)
 * @method static Builder|IndividualeRegionale whereGgAnno($value)
 * @method static Builder|IndividualeRegionale whereGgAssenzSigma($value)
 * @method static Builder|IndividualeRegionale whereGgAssenzaAnno($value)
 * @method static Builder|IndividualeRegionale whereGgAssenzaDalal($value)
 * @method static Builder|IndividualeRegionale whereGgParttimevert($value)
 * @method static Builder|IndividualeRegionale whereGgParttimevertAnno($value)
 * @method static Builder|IndividualeRegionale whereGgParttimevertDalal($value)
 * @method static Builder|IndividualeRegionale whereGgPosiz1InSede($value)
 * @method static Builder|IndividualeRegionale whereGgPresenzaAnno($value)
 * @method static Builder|IndividualeRegionale whereGgPresenzaDalal($value)
 * @method static Builder|IndividualeRegionale whereGgRuolo($value)
 * @method static Builder|IndividualeRegionale whereGgTempoDeterminato($value)
 * @method static Builder|IndividualeRegionale whereGgTotaleSigma($value)
 * @method static Builder|IndividualeRegionale whereGgValidiSigma($value)
 * @method static Builder|IndividualeRegionale whereGiorniAssenza($value)
 * @method static Builder|IndividualeRegionale whereGiorniPresenza($value)
 * @method static Builder|IndividualeRegionale whereGiornitempodet($value)
 * @method static Builder|IndividualeRegionale whereHaDiritto($value)
 * @method static Builder|IndividualeRegionale whereHhAssenzaAnno($value)
 * @method static Builder|IndividualeRegionale whereHhAssenzaDalal($value)
 * @method static Builder|IndividualeRegionale whereId($value)
 * @method static Builder|IndividualeRegionale whereImpegno($value)
 * @method static Builder|IndividualeRegionale whereImportoTotale($value)
 * @method static Builder|IndividualeRegionale whereLang($value)
 * @method static Builder|IndividualeRegionale whereLastDataAssunz($value)
 * @method static Builder|IndividualeRegionale whereListaAuth($value)
 * @method static Builder|IndividualeRegionale whereMatr($value)
 * @method static Builder|IndividualeRegionale whereMotivo($value)
 * @method static Builder|IndividualeRegionale whereNome($value)
 * @method static Builder|IndividualeRegionale whereNote($value)
 * @method static Builder|IndividualeRegionale whereOreAssenza($value)
 * @method static Builder|IndividualeRegionale whereOreAssenzaAnno($value)
 * @method static Builder|IndividualeRegionale whereOree($value)
 * @method static Builder|IndividualeRegionale whereOret($value)
 * @method static Builder|IndividualeRegionale wherePercParttime($value)
 * @method static Builder|IndividualeRegionale wherePercParttimeAnno($value)
 * @method static Builder|IndividualeRegionale wherePercParttimeDalal($value)
 * @method static Builder|IndividualeRegionale wherePercParttimepond($value)
 * @method static Builder|IndividualeRegionale wherePercParttimepondAnno($value)
 * @method static Builder|IndividualeRegionale wherePercParttimepondDalal($value)
 * @method static Builder|IndividualeRegionale wherePesoArricchimentoProfessionale($value)
 * @method static Builder|IndividualeRegionale wherePesoEsperienzaAcquisita($value)
 * @method static Builder|IndividualeRegionale wherePesoImpegno($value)
 * @method static Builder|IndividualeRegionale wherePesoQualitaPrestazione($value)
 * @method static Builder|IndividualeRegionale wherePesoRisultatiOttenuti($value)
 * @method static Builder|IndividualeRegionale wherePosfun($value)
 * @method static Builder|IndividualeRegionale wherePosiz($value)
 * @method static Builder|IndividualeRegionale wherePosizTxt($value)
 * @method static Builder|IndividualeRegionale wherePosizioneEco($value)
 * @method static Builder|IndividualeRegionale wherePostType($value)
 * @method static Builder|IndividualeRegionale wherePropro($value)
 * @method static Builder|IndividualeRegionale whereQua2ka($value)
 * @method static Builder|IndividualeRegionale whereQua2kd($value)
 * @method static Builder|IndividualeRegionale whereQualitaPrestazione($value)
 * @method static Builder|IndividualeRegionale whereQuotaEffettiva($value)
 * @method static Builder|IndividualeRegionale whereQuotaTeorica($value)
 * @method static Builder|IndividualeRegionale whereRep2ka($value)
 * @method static Builder|IndividualeRegionale whereRep2kd($value)
 * @method static Builder|IndividualeRegionale whereRepar($value)
 * @method static Builder|IndividualeRegionale whereReparTxt($value)
 * @method static Builder|IndividualeRegionale whereReparval($value)
 * @method static Builder|IndividualeRegionale whereResti($value)
 * @method static Builder|IndividualeRegionale whereRestiPond($value)
 * @method static Builder|IndividualeRegionale whereRisultatiOttenuti($value)
 * @method static Builder|IndividualeRegionale whereSchedaType($value)
 * @method static Builder|IndividualeRegionale whereStabi($value)
 * @method static Builder|IndividualeRegionale whereStabiTxt($value)
 * @method static Builder|IndividualeRegionale whereStabival($value)
 * @method static Builder|IndividualeRegionale whereTipco($value)
 * @method static Builder|IndividualeRegionale whereTotalePunteggio($value)
 * @method static Builder|IndividualeRegionale whereUpdatedAt($value)
 * @method static Builder|IndividualeRegionale whereUpdatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BaseIndividualeModel withDays(int $date_min, int $date_max)
 * @method static \Illuminate\Database\Eloquent\Builder|BaseIndividualeModel withTotPunt()
 *
 * @mixin \Eloquent
 */
class IndividualeRegionale extends Individuale
{
    use HasParent;

    public function mails()
    {
        $stabi = request()->input('stabi', '');
        $repar = request()->input('repar', '');
        $this->anno = request()->input('year', '');

        return $this->hasMany(self::class, 'anno', 'anno')
            ->where('stabi', $stabi)
            ->where('repar', $repar);
        // ->where('post_type', 'individuale_regionale')
        // ->where('disci1', 203)
        //    ->where('totale_punteggio','>',0)
    }
}
