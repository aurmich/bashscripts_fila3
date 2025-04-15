<?php

declare(strict_types=1);

namespace Modules\IndennitaResponsabilita\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
// ---- traits ---
use Modules\IndennitaResponsabilita\Models\Traits\FunctionTrait;
// --- services --
use Modules\IndennitaResponsabilita\Models\Traits\RelationshipTrait;
// ---- external models ----
use Modules\Sigma\Models\Anag;
use Modules\Sigma\Models\Rep00f;
use Modules\Sigma\Models\Traits\SigmaModelTrait;
use Modules\Xot\Services\HtmlService;

/**
 * Modules\IndennitaResponsabilita\Models\LettI.
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
 * @property int|null $tot
 * @property string|null $valore_economico_calcolato
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
 * @property string $dali_ali
 * @property-read Collection<int, \Modules\IndennitaResponsabilita\Models\MyLog> $mailInviate
 * @property-read int|null $mail_inviate_count
 * @property-read Collection<int, \Modules\IndennitaResponsabilita\Models\IndennitaResponsabilita> $mails
 * @property-read int|null $mails_count
 * @property-read \Staudenmeir\LaravelAdjacencyList\Eloquent\Collection<int, \Modules\IndennitaResponsabilita\Models\Message> $messages
 * @property-read int|null $messages_count
 * @property-read Collection<int, \Modules\IndennitaResponsabilita\Models\MyLog> $myLogs
 * @property-read int|null $my_logs_count
 * @property-read Collection<int, \Modules\IndennitaResponsabilita\Models\Rating> $ratings
 * @property-read int|null $ratings_count
 * @property-read \Modules\IndennitaResponsabilita\Models\StabiDirigente|null $stabiDirigente
 *
 * @method static Builder|LettI newModelQuery()
 * @method static Builder|LettI newQuery()
 * @method static Builder|LettI ofDate(int $date)
 * @method static Builder|LettI ofEnteYear(int $ente, int $year)
 * @method static Builder|LettI ofQuarter(int $quarter, int $year)
 * @method static Builder|LettI ofRangeDate(int $date_start, int $date_end)
 * @method static Builder|LettI ofYear(int $year)
 * @method static Builder|LettI query()
 * @method static Builder|LettI whereAl($value)
 * @method static Builder|LettI whereAlf($value)
 * @method static Builder|LettI whereAli($value)
 * @method static Builder|LettI whereAlx($value)
 * @method static Builder|LettI whereAnno($value)
 * @method static Builder|LettI whereArchivistaInformatico($value)
 * @method static Builder|LettI whereCategoriaEco($value)
 * @method static Builder|LettI whereCodqua($value)
 * @method static Builder|LettI whereCognome($value)
 * @method static Builder|LettI whereComplessita($value)
 * @method static Builder|LettI whereCoordinamento($value)
 * @method static Builder|LettI whereCreatedAt($value)
 * @method static Builder|LettI whereCreatedBy($value)
 * @method static Builder|LettI whereCreatedIp($value)
 * @method static Builder|LettI whereDal($value)
 * @method static Builder|LettI whereDalf($value)
 * @method static Builder|LettI whereDali($value)
 * @method static Builder|LettI whereDalx($value)
 * @method static Builder|LettI whereDatemod($value)
 * @method static Builder|LettI whereDeletedAt($value)
 * @method static Builder|LettI whereDeletedBy($value)
 * @method static Builder|LettI whereDeletedIp($value)
 * @method static Builder|LettI whereDespro($value)
 * @method static Builder|LettI whereDisci1($value)
 * @method static Builder|LettI whereEmail($value)
 * @method static Builder|LettI whereEnte($value)
 * @method static Builder|LettI whereFormatoreProfessionale($value)
 * @method static Builder|LettI whereHaDiritto($value)
 * @method static Builder|LettI whereHandle($value)
 * @method static Builder|LettI whereId($value)
 * @method static Builder|LettI whereIdQuale($value)
 * @method static Builder|LettI whereLang($value)
 * @method static Builder|LettI whereLastStato($value)
 * @method static Builder|LettI whereMatr($value)
 * @method static Builder|LettI whereMotivoEscluso($value)
 * @method static Builder|LettI whereNome($value)
 * @method static Builder|LettI wherePosfun($value)
 * @method static Builder|LettI wherePosiz($value)
 * @method static Builder|LettI wherePosizTxt($value)
 * @method static Builder|LettI wherePosizioneLavoro($value)
 * @method static Builder|LettI wherePropro($value)
 * @method static Builder|LettI whereProtezioneCivile($value)
 * @method static Builder|LettI whereQua2ka($value)
 * @method static Builder|LettI whereQua2kd($value)
 * @method static Builder|LettI whereQualifica($value)
 * @method static Builder|LettI whereRelazioniPubblico($value)
 * @method static Builder|LettI whereRep2ka($value)
 * @method static Builder|LettI whereRep2kd($value)
 * @method static Builder|LettI whereRepar($value)
 * @method static Builder|LettI whereReparTxt($value)
 * @method static Builder|LettI whereResponsabilita($value)
 * @method static Builder|LettI whereStabi($value)
 * @method static Builder|LettI whereStabiTxt($value)
 * @method static Builder|LettI whereTipco($value)
 * @method static Builder|LettI whereTot($value)
 * @method static Builder|LettI whereUpdatedAt($value)
 * @method static Builder|LettI whereUpdatedBy($value)
 * @method static Builder|LettI whereUpdatedIp($value)
 * @method static Builder|LettI whereValoreEconomicoAttribuito($value)
 * @method static Builder|LettI whereValoreEconomicoCalcolato($value)
 * @method static Builder|LettI whereValutatoreId($value)
 * @method static Builder|LettI withDays(int $date_min, int $date_max)
 *
 * @mixin \Eloquent
 */
class LettI extends BaseModel
{
    use FunctionTrait;
    use RelationshipTrait;
    use SigmaModelTrait;

    public string $from_field = 'dal';

    public string $to_field = 'al';

    protected $table = 'indennita_responsabilita';

    protected $fillable = [
        'id', 'ente', 'matr', 'stabi', 'repar', 'anno', 'dal', 'al', 'dalf', 'alf', 'dali', 'ali',
        'archivista_informatico', 'relazioni_pubblico', 'protezione_civile', 'formatore_professionale',
    ];

    protected $appends = ['dali__ali'];

    public array $xls_fields = ['ente', 'matr', 'cognome', 'nome', 'email', 'propro', 'posfun',
        'categoria_eco', 'dal', 'al', 'archivista_informatico', 'relazioni_pubblico',
        'protezione_civile', 'formatore_professionale', ];

    protected $casts = ['dal' => 'datetime', 'al' => 'datetime', 'dalf' => 'datetime', 'alf' => 'datetime', 'dali' => 'datetime', 'ali' => 'datetime', 'created_at' => 'datetime', 'updated_at' => 'datetime'];

    // --------- relationship ----------
    public function importi()
    {
        $row = $this->hasOne(ImportiCategoria::class, 'ente', 'ente')->where('anno', $this->anno)->whereRaw('find_in_set('.$this->propro.',lista_propro)');
        if ($row->count() === 0) {
            $rowOld = ImportiCategoria::where('ente', $this->ente)
                ->where('anno', $this->anno - 1)
                ->whereRaw('find_in_set('.$this->propro.',lista_propro)');
            if ($rowOld->count() !== 1) {
                dd("qualcosa e' andato storto [".__LINE__.']['.__FILE__.']');
            }

            $row = $rowOld->first()->replicate();
            $row->anno = $this->anno;
            $row->save();
            $row = $this->hasOne(ImportiCategoria::class, 'ente', 'ente')
                ->where('anno', $this->anno)
                ->whereRaw('find_in_set('.$this->propro.',lista_propro)');
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
        return $this->hasMany(MyLog::class, 'id_tbl', 'id')->where('tbl', $this->getTable())->where('note', 'sendMailLettI');
    }

    // --------- mutators ---------
    public function getDaliAttribute($value)
    {
        // dd('errore strano ['.$this->anno.']['.$this->attibutes['anno'].']['.__LINE__.']['.__FILE__.']');
        if ($value === null) {
            $value = Carbon::createFromDate($this->anno, 1, 1);
        }

        if (\is_string($value)) {
            $value = Carbon::parse($value);
        }

        $this->dali = $value;
        $this->save();

        return $value;
    }

    public function getAliAttribute($value)
    {
        // dd('errore strano ['.$this->anno.']['.$this->attibutes['anno'].']['.__LINE__.']['.__FILE__.']');
        if ($value === null) {
            $value = Carbon::createFromDate($this->anno, 12, 31);
        }

        if (\is_string($value)) {
            $value = Carbon::parse($value);
        }

        $this->ali = $value;
        $this->save();

        return $value;
    }

    public function getDaliAliAttribute($value): string
    {
        return $this->ali->format('d/m/Y').' - '.$this->dali->format('d/m/Y');
    }

    public function setDaliAliAttribute(mixed $value): never
    {
        dd($value);
    }

    public function setDaliAttribute($value): void
    {
        if (\is_string($value)) {
            $value = Carbon::createFromFormat('d/m/Y', $value);
        }

        $this->attributes['dali'] = $value;
    }

    public function setAliAttribute($value): void
    {
        if (\is_string($value)) {
            $value = Carbon::createFromFormat('d/m/Y', $value);
        }

        $this->attributes['ali'] = $value;
    }

    public function getEmailAttribute(?string $value): ?string
    {
        if ($value !== null) {
            return $value;
        }

        if ($this->anag === null) {
            return $value;
        }

        // dddx(['value' => $value, 'this' => $this, 'attributes' => $this->attributes['email']]);
        $value = $this->anag->email;
        $this->email = $value;
        $this->save();

        return $value;
    }

    // ---------------------------------------
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
            $parz = ['ente' => $row->ente,
                'matr' => $row->matr,
                'stabi' => $row->repst1,
                'repar' => $row->repre1,
                'rep2kd' => $row->rep2kd,
                'rep2ka' => $row->rep2ka,
                'anno' => $anno, ];

            $obj = self::firstOrCreate($parz);
            $obj->rep2kd = $row->rep2kd;
            $obj->rep2ka = $row->rep2ka;
            if ($obj->dali === null) {
                $obj->dali = Carbon::createFromDate($anno, 1, 1);
            }

            if ($obj->ali === null) {
                $obj->ali = Carbon::createFromDate($anno, 12, 31);
            }

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
}
