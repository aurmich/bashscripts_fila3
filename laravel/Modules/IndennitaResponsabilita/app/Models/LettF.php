<?php

declare(strict_types=1);

namespace Modules\IndennitaResponsabilita\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Modules\IndennitaResponsabilita\Models\Traits\FunctionTrait;
use Modules\IndennitaResponsabilita\Models\Traits\RelationshipTrait;
use Modules\Sigma\Models\Ana02f;
use Modules\Sigma\Models\Ana10f;
use Modules\Sigma\Models\Anag;
use Modules\Sigma\Models\Asz00f;
use Modules\Sigma\Models\Asz00k1;
use Modules\Sigma\Models\Codici;
use Modules\Sigma\Models\Qua00f;
// --- traits ---
use Modules\Sigma\Models\Qua03f;
use Modules\Sigma\Models\Rep00f;
// --- services --
use Modules\Sigma\Models\Repart;
// ---- external models ----
use Modules\Sigma\Models\Sto00f;
use Modules\Sigma\Models\Traits\SchedaTrait;
use Modules\Sigma\Models\Traits\SigmaModelTrait;
use Modules\Sigma\Models\Wstr01lx;
use Modules\Xot\Services\HtmlService;
// use Modules\Xot\Models\Traits\MyLogTrait;
use Modules\Xot\Traits\Updater;
use Validator;

/**
 * Modules\IndennitaResponsabilita\Models\LettF.
 *
 * @property int $id
 * @property int|null $ente
 * @property int|null $matr
 * @property string|null $cognome
 * @property string|null $nome
 * @property string|null $email
 * @property int|null $stabi
 * @property int|null $repar
 * @property string|null $stabi_txt
 * @property string|null $repar_txt
 * @property int|null $rep2kd
 * @property int|null $rep2ka
 * @property int|null $propro
 * @property int|null $posfun
 * @property string|null $despro
 * @property int|null $posiz
 * @property int|null $qua2kd
 * @property int|null $qua2ka
 * @property int|null $tipco
 * @property int|null $codqua
 * @property string|null $qualifica
 * @property int|null $dalx
 * @property int|null $alx
 * @property \Illuminate\Support\Carbon|null $dalf dal retribuzione
 * @property \Illuminate\Support\Carbon|null $alf al retribuzione
 * @property \Illuminate\Support\Carbon|null $dali
 * @property \Illuminate\Support\Carbon|null $ali
 * @property int|null $anno
 * @property int|null $id_quale
 * @property string|null $posizione_lavoro
 * @property int|null $complessita
 * @property int|null $coordinamento
 * @property int|null $responsabilita
 * @property int|float $tot
 * @property int|float $valore_economico_calcolato
 * @property string|null $valore_economico_attribuito
 * @property string|null $archivista_informatico
 * @property string|null $relazioni_pubblico
 * @property string|null $protezione_civile
 * @property string|null $formatore_professionale
 * @property string|null $ha_diritto
 * @property string|null $motivo_escluso
 * @property string|null $datemod
 * @property string|null $handle
 * @property int|null $last_stato
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $created_by
 * @property string|null $updated_by
 * @property string|null $deleted_at
 * @property string|null $deleted_by
 * @property string|null $deleted_ip
 * @property string|null $created_ip
 * @property string|null $updated_ip
 * @property string $categoria_eco
 * @property string $posiz_txt
 * @property string $lang
 * @property int|null $disci1
 * @property int|null $valutatore_id
 * @property \Illuminate\Support\Carbon|null $dal
 * @property \Illuminate\Support\Carbon|null $al
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
 * @property mixed $cont
 * @property mixed $disci1_txt
 * @property int|float $gg_p_time_vert_year
 * @property mixed $gg_parttimevert_anno
 * @property int|null $gg_parttimevert
 * @property mixed $gg_parttimevert_dalal
 * @property mixed $gg_presenza_dalal
 * @property mixed $last_data_assunz
 * @property int|float $perc_p_time_daterange
 * @property int|float $perc_p_time_year
 * @property mixed $perc_parttime_anno
 * @property float|null $perc_parttime
 * @property mixed $perc_parttime_dalal
 * @property float|null $perc_parttimepond_anno
 * @property mixed $perc_parttimepond_dalal
 * @property string|null $posizione_eco
 * @property mixed $titolo_di_studio
 * @property float $valore_economico_effettivo
 * @property Collection<int, \Modules\IndennitaResponsabilita\Models\MyLog> $mailInviate
 * @property int|null $mail_inviate_count
 * @property Collection<int, \Modules\IndennitaResponsabilita\Models\IndennitaResponsabilita> $mails
 * @property int|null $mails_count
 * @property \Staudenmeir\LaravelAdjacencyList\Eloquent\Collection<int, \Modules\IndennitaResponsabilita\Models\Message> $messages
 * @property int|null $messages_count
 * @property Collection<int, \Modules\IndennitaResponsabilita\Models\MyLog> $myLogs
 * @property int|null $my_logs_count
 * @property Collection<int, Qua00f> $qua00fDaterange
 * @property int|null $qua00f_daterange_count
 * @property Collection<int, Qua00f> $qua00fYear
 * @property int|null $qua00f_year_count
 * @property Collection<int, Qua03f> $qua03f
 * @property int|null $qua03f_count
 * @property Collection<int, \Modules\IndennitaResponsabilita\Models\Rating> $ratings
 * @property int|null $ratings_count
 * @property Collection<int, Repart> $reparts
 * @property int|null $reparts_count
 * @property StabiDirigente|null $stabiDirigente
 * @property Collection<int, Sto00f> $sto00f
 * @property int|null $sto00f_count
 * @property Collection<int, Wstr01lx> $wstr01lx
 * @property int|null $wstr01lx_count
 * @property Collection<int, Wstr01lx> $wstr01lxYear
 * @property int|null $wstr01lx_year_count
 *
 * @method static Builder|LettF newModelQuery()
 * @method static Builder|LettF newQuery()
 * @method static Builder|LettF ofDate(int $date)
 * @method static Builder|LettF ofEnteYear(int $ente, int $year)
 * @method static Builder|LettF ofQuarter(int $quarter, int $year)
 * @method static Builder|LettF ofRangeDate(int $date_start, int $date_end)
 * @method static Builder|LettF ofYear(int $year)
 * @method static Builder|LettF query()
 * @method static Builder|LettF whereAl($value)
 * @method static Builder|LettF whereAlf($value)
 * @method static Builder|LettF whereAli($value)
 * @method static Builder|LettF whereAlx($value)
 * @method static Builder|LettF whereAnno($value)
 * @method static Builder|LettF whereArchivistaInformatico($value)
 * @method static Builder|LettF whereCategoriaEco($value)
 * @method static Builder|LettF whereCodqua($value)
 * @method static Builder|LettF whereCognome($value)
 * @method static Builder|LettF whereComplessita($value)
 * @method static Builder|LettF whereCoordinamento($value)
 * @method static Builder|LettF whereCreatedAt($value)
 * @method static Builder|LettF whereCreatedBy($value)
 * @method static Builder|LettF whereCreatedIp($value)
 * @method static Builder|LettF whereDal($value)
 * @method static Builder|LettF whereDalf($value)
 * @method static Builder|LettF whereDali($value)
 * @method static Builder|LettF whereDalx($value)
 * @method static Builder|LettF whereDatemod($value)
 * @method static Builder|LettF whereDeletedAt($value)
 * @method static Builder|LettF whereDeletedBy($value)
 * @method static Builder|LettF whereDeletedIp($value)
 * @method static Builder|LettF whereDespro($value)
 * @method static Builder|LettF whereDisci1($value)
 * @method static Builder|LettF whereEmail($value)
 * @method static Builder|LettF whereEnte($value)
 * @method static Builder|LettF whereFormatoreProfessionale($value)
 * @method static Builder|LettF whereHaDiritto($value)
 * @method static Builder|LettF whereHandle($value)
 * @method static Builder|LettF whereId($value)
 * @method static Builder|LettF whereIdQuale($value)
 * @method static Builder|LettF whereLang($value)
 * @method static Builder|LettF whereLastStato($value)
 * @method static Builder|LettF whereMatr($value)
 * @method static Builder|LettF whereMotivoEscluso($value)
 * @method static Builder|LettF whereNome($value)
 * @method static Builder|LettF wherePosfun($value)
 * @method static Builder|LettF wherePosiz($value)
 * @method static Builder|LettF wherePosizTxt($value)
 * @method static Builder|LettF wherePosizioneLavoro($value)
 * @method static Builder|LettF wherePropro($value)
 * @method static Builder|LettF whereProtezioneCivile($value)
 * @method static Builder|LettF whereQua2ka($value)
 * @method static Builder|LettF whereQua2kd($value)
 * @method static Builder|LettF whereQualifica($value)
 * @method static Builder|LettF whereRelazioniPubblico($value)
 * @method static Builder|LettF whereRep2ka($value)
 * @method static Builder|LettF whereRep2kd($value)
 * @method static Builder|LettF whereRepar($value)
 * @method static Builder|LettF whereReparTxt($value)
 * @method static Builder|LettF whereResponsabilita($value)
 * @method static Builder|LettF whereStabi($value)
 * @method static Builder|LettF whereStabiTxt($value)
 * @method static Builder|LettF whereTipco($value)
 * @method static Builder|LettF whereTot($value)
 * @method static Builder|LettF whereUpdatedAt($value)
 * @method static Builder|LettF whereUpdatedBy($value)
 * @method static Builder|LettF whereUpdatedIp($value)
 * @method static Builder|LettF whereValoreEconomicoAttribuito($value)
 * @method static Builder|LettF whereValoreEconomicoCalcolato($value)
 * @method static Builder|LettF whereValutatoreId($value)
 * @method static Builder|LettF withDays(int $date_min, int $date_max)
 *
 * @mixin \Eloquent
 */
class LettF extends BaseModel
{
    use FunctionTrait;
    use RelationshipTrait;
    // use Updater;
    // use MyLogTrait;
    use SchedaTrait;
    use SigmaModelTrait;

    public static $logModel = MyLog::class;

    public string $from_field = 'dal';

    public string $to_field = 'al';

    protected $table = 'indennita_responsabilita';

    protected $fillable = [
        'id', 'ente', 'matr', 'stabi', 'repar', 'rep2kd', 'rep2ka', 'anno',
        'email', 'posizione_lavoro',
        'complessita', 'coordinamento', 'responsabilita',
        'tot', 'valore_economico_calcolato', 'valore_economico_attribuito',
        'propro', 'posfun', 'categoria_eco', 'posiz', 'posiz_txt',
        'cognome', 'nome', 'email',
        'dal', 'al', 'dalf', 'alf', 'dali', 'ali',
    ];

    public array $rules = [
        'posizione_lavoro' => 'required',
        'email' => 'required',
        'complessita' => 'required|numeric|min:0|max:40',
        'coordinamento' => 'required|numeric|min:0|max:30',
        'responsabilita' => 'required|numeric|min:0|max:30',
        // 'impegno'                       =>  'required|numeric|min:0|max:4',
        // 'qualita_prestazione'           =>  'required|numeric|min:0|max:4',
        // 'size'  => 'required',
        // .. more rules here ..
    ];

    public array $xls_fields = [
        'ente', 'matr',
        'cognome', 'nome',
        'email',
        'stabi', 'stabi_txt',
        'repar', 'repar_txt',
        'propro',
        'posfun', 'categoria_eco',
        'dalf', 'alf',
        'posizione_lavoro',
        'complessita',
        'coordinamento',
        'responsabilita',
        'tot',
        'valore_economico_calcolato',
        'valore_economico_attribuito',
    ];

    public array $messages = [
        'posizione_lavoro.required' => 'campo obbligatorio, non lasciare vuoto',
        'complessita.numeric.max' => 'deve essere compreso fra 0 e 40',
        // 'esperienza_acquisita.required'=>'non te pol lassar sto campo vodo',
        // 'esperienza_acquisita.required'=>'non puoi lasciare questo campo vuoto',
        // 'name.required'=>'You cant leave name field empty',
        // 'name.min'=>'The field has to be :min chars long',
    ];

    protected $casts = [
        // 'published_at' => 'datetime:Y-m-d',
        'dalf' => 'date:Y-m-d',
        'alf' => 'date:Y-m-d',
        'dal' => 'datetime',
        'al' => 'datetime',
        'dali' => 'datetime',
        'ali' => 'datetime',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function validate($data): void
    {
        // make a new validator object
        $validator = \Validator::make($data, $this->rules, $this->messages);
        // return the result
        /*
        if(!$this->validator->passes()){
           \Redirect::back()->with( [ 'errors' => $this->validator->errors() ] );
        }
        */

        $validator->validate();
    }

    // -------------------------------------------------------------------

    // --------- relationship ----------
    public function importi()
    {
        $row = $this->hasOne(ImportiCategoria::class, 'ente', 'ente')->where('anno', $this->anno)->whereRaw('find_in_set("'.$this->propro.'",lista_propro)');
        if ($row->count() === 0) {
            $rowOld = ImportiCategoria::where('ente', $this->ente)
                ->where('anno', $this->anno - 1)
                ->whereRaw('find_in_set("'.$this->propro.'",lista_propro)');
            if ($rowOld->count() !== 1) {
                if ($this->propro === 0) {
                    dd('preso ['.__LINE__.']['.__FILE__.']');
                }

                echo PHP_EOL.'<h3>['.$this->anno.']['.$this->propro.']['.__LINE__.']['.__FILE__.']</h3>';

                // dddx([$rowOld->get(), 'qualcosa e\' andato storto ['.__LINE__.']['.__FILE__.']']);
                return;
            }

            $row = $rowOld->first()->replicate();
            $row->anno = $this->anno;
            $row->save();
            $row = $this->hasOne(ImportiCategoria::class, 'ente', 'ente')
                ->where('anno', $this->anno)
                ->whereRaw('find_in_set("'.$this->propro.'",lista_propro)');
        }

        return $row;
    }

    /*
    public function anag(): HasOne {
        return $this->hasOne(Anag::class, 'matr', 'matr')->where('ente', $this->ente);
    }
    */
    public function stabiDirigente(): HasOne
    {
        return $this->hasOne(StabiDirigente::class, 'stabi', 'stabi')
            ->where('repar', $this->repar)
            ->where('anno', $this->anno);
    }

    // -------------------------------------------------------------------------------------
    public function mailInviate(): HasMany
    {
        return $this->hasMany(MyLog::class, 'id_tbl', 'id')->where('tbl', $this->getTable())->where('note', 'sendMailLettF');
    }

    public function Rep00f(): HasMany
    {
        return $this->hasMany(Rep00f::class, 'matr', 'matr')
            ->where('ente', $this->ente)
            ->whereRaw('repann=""')
            ->ofYear($this->anno);
    }

    public function Qua00f()
    {
        if ($this->dalf == null && $this->getKey() != null) {
            $this->dalf = Carbon::createFromFormat('d/m/Y', '01/01/'.$this->anno);
            $this->save();
        }

        if ($this->alf == null && $this->getKey() != null) {
            $this->alf = Carbon::createFromFormat('d/m/Y', '31/12/'.$this->anno);
            $this->save();
        }

        $dal = $this->dalf->format('Ymd');
        $al = $this->alf->format('Ymd');

        $sql = '
        (
            (
                '.$dal.' between qua2kd and qua2ka
            ) or
            (
                '.$dal.' >= qua2kd and qua2ka=0
            ) or
            (
                '.$al.' between qua2kd and qua2ka
            ) or
            (
                '.$al.' >= qua2kd and qua2ka=0
            ) or
            (
                qua2kd between '.$dal.' and '.$al.'
            )
        )';

        return $this->hasMany(Qua00f::class, 'matr', 'matr')
            ->where('ente', $this->ente)
            ->whereRaw('quaann=""')
            ->whereRaw($sql);
    }

    // --------- mutators ---------

    // *
    public function setDalfAttribute($value): void
    {
        if (\is_string($value)) {
            $value = Carbon::createFromFormat('d/m/Y', $value);
        }

        $this->attributes['dalf'] = $value;
    }

    public function setAlfAttribute($value): void
    {
        if (\is_string($value)) {
            $value = Carbon::createFromFormat('d/m/Y', $value);
        }

        $this->attributes['alf'] = $value;
    }

    // */

    /**
     * Undocumented function.
     *
     * @param  Carbon|string|null  $value
     */
    /*
    public function getDalfAttribute($value): Carbon {
        if ($value instanceof Carbon) {
            return $value;
        }

        // dd('errore strano ['.$this->anno.']['.$this->attibutes['anno'].']['.__LINE__.']['.__FILE__.']');
        if (null === $value) {
            $value = Carbon::createFromDate($this->anno, 1, 1);
            $this->update(['dalf' => $value]);

            return $value;
        }
        if (\is_string($value)) {

            $value = Carbon::parse($value);
        }

        return $value;
    }
    */
    /**
     * Undocumented function.
     *
     * @param  Carbon|string|null  $value
     */
    /*
    public function getAlfAttribute($value): Carbon {
        if ($value instanceof Carbon) {
            return $value;
        }

        // dd('errore strano ['.$this->anno.']['.$this->attibutes['anno'].']['.__LINE__.']['.__FILE__.']');
        if (null === $value) {
            $value = Carbon::createFromDate($this->anno, 12, 31);
            $this->update(['alf' => $value]);

            return $value;
        }
        if (\is_string($value)) {
            $value = Carbon::parse($value);
            // dddx([$value, $value1]);
        }

        return $value;
    }
    */
    public function getTotAttribute($value): int|float
    {
        $old_value = $value;
        $value = $this->complessita + $this->coordinamento + $this->responsabilita;
        if ($value !== $old_value) {
            $this->tot = $value;
            $this->save();
        }

        return $value;
    }

    public function getValoreEconomicoCalcolatoAttribute($value): int|float
    {
        // {$importi->min}
        $importo_max = $this->importi->max; // {$importi->max}
        $value = $this->tot * $importo_max / 100;

        if ($value !== 0) {
            $this->valore_economico_calcolato = $value;
            $this->save();
        }

        return $value;
    }

    public function getValoreEconomicoEffettivoAttribute($value): float
    {
        $gg = $this->alf->diffInDays($this->dalf, true) + 1;
        // $value=$this->valore_economico_calcolato*$gg/365;
        $value = $this->valore_economico_attribuito * $gg / 365;

        return round($value, 2);
    }

    public function getValoreEconomicoAttribuitoAttribute($value)
    {
        $old_value = $value;
        $importo_min = $this->importi->min;

        if ($value < $importo_min) {
            $value = $importo_min;
        }

        if ($this->tot === 0) {
            return 0;
        }

        if ($value !== $old_value) {
            $this->valore_economico_attribuito = $value;
            $this->save();
        }

        return $this->valore_economico_calcolato;
    }

    /*
    public function getAlfAttribute($value){
        if(is_string($value)){
            $value=Carbon::createFromFormat('d/m/Y',$value);
        }
        return $value;
    }
    */
    public function getRep2kdAttribute($value)
    {
        if (\is_object($value)) {
            return $value;
        }

        if ($value > 2019) {
            return $value;
        }
        // valore ok
        if (! \is_object($this->rep00f)) {
            dddx('to fix');
        }

        if ($this->rep00f->count() >= 1) {
            $r = $this->rep00f->first();
            $rep2kd = $r->rep2kd->format('Ymd');
            $rep2ka = (\is_object($r->rep2ka)) ? $r->rep2ka->format('Ymd') : $r->rep2ka;

            $this->attributes['rep2kd'] = $rep2kd;
            $this->attributes['rep2ka'] = $rep2ka;
            $this->save();

            return $this->attributes['rep2kd'];
        }

        dddx($this->rep00f);
    }

    public function getProproAttribute($value)
    {
        if ($value !== 0) {
            return $value;
        }

        $qua00f = $this->qua00f;
        if ($qua00f === null) {
            dddx('errore');
        }

        if ($qua00f->count() !== 1) {
            // dddx($qua00f);
            $arr = collect($qua00f)->map(static fn ($item): array => ['propro' => $item->propro, 'posfun' => $item->posfun]);
            // foreach($arr as $i){

            // }
            // dddx($arr->count());
        }

        $this->attributes['propro'] = $qua00f->first()->propro;
        $this->attributes['posfun'] = $qua00f->first()->posfun;
        $this->attributes['posiz'] = $qua00f->first()->posiz;
        $this->save();

        return $this->attributes['propro'];
    }

    public function getPosfunAttribute($value)
    {
        if ($value !== 0) {
            return $value;
        }

        $qua00f = $this->qua00f;
        if ($qua00f === null) {
            dddx('errore');
        }

        if ($qua00f->count() !== 1) {
            // dddx($qua00f);
            $arr = collect($qua00f)->map(static fn ($item): array => ['propro' => $item->propro, 'posfun' => $item->posfun]);
            // foreach($arr as $i){

            // }
            // dddx($arr->count());
        }

        $this->attributes['posfun'] = $qua00f->first()->posfun;
        $this->save();

        return $this->attributes['posfun'];
    }

    public function getPosizAttribute($value)
    {
        if ($value !== 0) {
            return $value;
        }

        $qua00f = $this->qua00f;
        if ($qua00f === null) {
            dddx('errore');
        }

        if ($qua00f->count() !== 1) {
            // dddx($qua00f);
            $arr = collect($qua00f)->map(static fn ($item): array => ['propro' => $item->propro, 'posfun' => $item->posfun]);
            // foreach($arr as $i){

            // }
            // dddx($arr->count());
        }

        $this->attributes['posiz'] = $qua00f->first()->posiz;
        $this->save();

        return $this->attributes['posiz'];
    }

    public function getPosizTxtAttribute($value)
    {
        if ($value !== null) {
            return $value;
        }

        $row = Codici::where('tipo', 19)->where('codice', $this->posiz)->first();
        if (! \is_object($row)) {
            return null;
        }

        $this->attributes['posiz_txt'] = $row->desc1;
        $this->save();

        return $this->attributes['posiz_txt'];
    }

    public function getCategoriaEcoAttribute($value)
    {
        if ($value !== null) {
            return $value;
        }

        $qua00f = $this->qua00f->first();
        if (! \is_object($qua00f)) {
            return null;
        }

        $tqu00f = $qua00f->tqu00f;
        $categoria_eco = $tqu00f->desc1;
        $categoria_eco = str_replace('Posizione economica ', '', (string) $categoria_eco);
        $this->attributes['categoria_eco'] = $categoria_eco;
        $this->save();

        return $this->attributes['categoria_eco'];
    }

    // *
    public function getEmailAttribute(?string $value): ?string
    {
        if ($value !== null) {
            return $value;
        }

        if (! \is_object($this->anag)) {
            echo '<h3>No mail o tabella ana03f e ana02f da aggiornare </h3>';
            echo '<br/>Ente: '.$this->ente;
            echo '<br/>Matr: '.$this->matr;
            dd('['.__LINE__.']['.__FILE__.']');
        }

        $value = $this->anag->email;
        $this->update(['email' => $value]);

        return $value;
    }

    // */
    // --------- functions ---------
    public static function updateFields(array $params = []): void
    {
        $params = array_merge(getRouteParameters(), $params);
        extract($params);
        $sql = '(
    		('.$anno.' between year(rep2kd) and year(rep2ka))
    		or
    		('.$anno.' >= year(rep2kd) and rep2ka=0)
    	)';
        $rows0 = Rep00f::where('repst1', $stabi)->where('repre1', $repar)->whereRaw($sql)->whereRaw('repann=""');

        foreach ($rows0->get() as $row) {
            $rep2kd = $row->rep2kd->format('Ymd');
            $rep2ka = (\is_object($row->rep2ka)) ? $row->rep2ka->format('Ymd') : $row->rep2ka;
            $parz = ['ente' => $row->ente,
                'matr' => $row->matr,
                'stabi' => $row->repst1,
                'repar' => $row->repre1,
                'rep2kd' => $rep2kd,
                'rep2ka' => $rep2ka,
                'anno' => $anno, ];

            $obj = self::firstOrCreate($parz);
            $obj->rep2kd = $rep2kd;
            $obj->rep2ka = $rep2ka;
            $obj->anno = $anno;
            if ($obj->dalf === null) {
                $obj->dalf = Carbon::createFromDate($anno, 1, 1);
            }

            if ($obj->alf === null) {
                $obj->alf = Carbon::createFromDate($anno, 12, 31);
            }

            if ($obj->propro === 0 || $obj->propro === null) {
                $sql = '
                (
                    ('.$obj->dalf->format('Ymd').' between qua2kd and qua2ka )
                    or
                    ('.$obj->dalf->format('Ymd').' >= qua2kd and qua2ka=0 )
                    or
                    ('.$obj->alf->format('Ymd').' between qua2kd and qua2ka )
                    or
                    ('.$obj->alf->format('Ymd').' >= qua2kd and qua2ka=0 )
                    or
                    (qua2kd between '.$obj->dalf->format('Ymd').' and '.$obj->alf->format('Ymd').')
                    or
                    (qua2ka between '.$obj->dalf->format('Ymd').' and '.$obj->alf->format('Ymd').')
                )
                ';
                // dd($obj->anag);
                $qua00f = $obj->anag->qua00f()->select('propro', 'posfun', 'posiz')->distinct()->whereRaw($sql);
                // echo '<br/>'.$qua00f->count().' - '.$qua00f->first()->propro.'  - '.$qua00f->first()->posfun;
                if ($qua00f->get()->count() === 1) {
                    $obj->propro = $qua00f->first()->propro;
                    $obj->posfun = $qua00f->first()->posfun;
                    $obj->posiz = $qua00f->first()->posiz;
                } else {
                    echo '<br/>$qua00f->count() : '.$qua00f->count();
                    echo '<br/>ente :'.$obj->ente;
                    echo '<br/>matr :'.$obj->matr;
                    echo "<br/>qualcosa e' andato storto [".__LINE__.']['.__FILE__.']';
                    echo '<pre>';
                    print_r($qua00f->toSql());
                    // dd($qua00f->get());
                    $qua00f = $obj->anag->qua00f()->whereRaw($sql)->orderBy('qua2kd')->get();

                    // foreach($qua00f as $v_qua00f){
                    // dd(Carbon::parse($qua00f[0]->qua2kd));
                    $al_old = $obj->al;
                    $obj->al = Carbon::parse($qua00f[0]->qua2kd);
                    $obj->save();

                    $obj1 = $obj->replicate();
                    $obj1->dal = Carbon::parse($qua00f[1]->qua2kd);
                    $obj1->al = $qua00f[1]->qua2ka !== 0 ? Carbon::parse($qua00f[1]->qua2ka) : $al_old;
                    $obj1->id = null;
                    $obj1->save();
                }
            }

            $obj->save();
            // dd($obj);
            // echo '<br/><pre>['.$obj->id.']</pre>';
        }

        // dd('['.__LINE__.']['.__FILE__.']');
        $obj = new self;
        $table = $obj->getTable();
        $conn = $obj->getConnection();
        $where = $table.'.anno="'.$anno.'" ';
        // Anag::massUpdateCognomeNome(['conn' => $conn, 'table' => $table, 'where' => $where]);
        // Anag::massUpdateCategoriaEco(['conn' => $conn, 'table' => $table, 'where' => $where]);
        // Anag::massUpdatePosizTxt(['conn' => $conn, 'table' => $table, 'where' => $where]);
        // Anag::massUpdateStabiTxtReparTxt(['conn' => $conn, 'table' => $table, 'where' => $where]);
    }

    public function content_PDF($view): string
    {
        // $view='admin.performance.individuale.pdf';
        $html = view($view)->with('row', $this)->with('anno', $this->anno);
        $content = $html->__toString();

        return HtmlService::toPdf(['out' => 'content_PDF', 'html' => $content, 'filename' => $this->id]);
    }

    // end content_PDF

    public function getAnnoAttribute(?int $value): ?int
    {
        // dddx($this);
        if (isset($this->attributes['dalf']) && isset($this->attributes['alf'])) {
            if (! is_object($this->attributes['dalf'])) {
                $this->attributes['dalf'] = Carbon::parse($this->attributes['dalf']);
            }

            if (! is_object($this->attributes['alf'])) {
                $this->attributes['alf'] = Carbon::parse($this->attributes['alf']);
            }

            if ($this->attributes['dalf']->year != $value && $value > 1990) {
                $this->dalf = $this->attributes['dalf']->setYear($value);
                $this->save();
            }

            if ($this->attributes['alf']->year != $value && $value > 1990) {
                $this->alf = $this->attributes['alf']->setYear($value);
                $this->save();
            }
        }

        return $value;
    }
}
