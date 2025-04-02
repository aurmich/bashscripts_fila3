<?php

declare(strict_types=1);

namespace Modules\IndennitaCondizioniLavoro\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Modules\IndennitaCondizioniLavoro\Models\Traits\MutatorTrait;
use Modules\IndennitaCondizioniLavoro\Models\Traits\RelationshipTrait;
use Modules\Sigma\Models\Ana02f;
use Modules\Sigma\Models\Ana10f;
// ------ ext models---
use Modules\Sigma\Models\Anag;
use Modules\Sigma\Models\Asz00f;
use Modules\Sigma\Models\Asz00k1;
use Modules\Sigma\Models\Qua00f;
use Modules\Sigma\Models\Qua03f;
// ---- traits --
use Modules\Sigma\Models\Rep00f;
use Modules\Sigma\Models\Sto00f;
use Modules\Sigma\Models\Traits\SigmaModelTrait;
use Modules\Sigma\Models\Wstr01lx;

/**
 * Modules\IndennitaCondizioniLavoro\Models\ServizioEsterno.
 *
 * @property int $id
 * @property int|null $ente
 * @property int|null $matr
 * @property string|null $email
 * @property string|null $cognome
 * @property string|null $nome
 * @property int|null $trimestre
 * @property int|null $stabi
 * @property string|null $stabi_txt
 * @property int|null $repar
 * @property string|null $repar_txt
 * @property int|null $propro
 * @property int|null $posfun
 * @property string|null $categoria_eco
 * @property int|null $posiz
 * @property string|null $posiz_txt
 * @property int|null $gg_presenza_anno
 * @property int|null $gg_presenza_periodo
 * @property int|null $gg_assenza_anno
 * @property int|null $hh_assenza_anno
 * @property int|null $gg_trasferte_anno
 * @property int|null $anno
 * @property int|null $rep2kd
 * @property int|null $rep2ka
 * @property int|null $qua2kd
 * @property int|null $qua2ka
 * @property \Illuminate\Support\Carbon|null $dal
 * @property \Illuminate\Support\Carbon|null $al
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $created_by
 * @property string|null $updated_by
 * @property string|null $disci1
 * @property string $disci1_txt
 * @property string|null $codqua
 * @property string $codqua_txt
 * @property int|null $tot_presenza_periodo_plus_no_timbr
 * @property float|null $tot
 * @property int|null $valutatore_id
 * @property int|null $quadrimestre
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
 * @property-read Collection $all_indennita_tipo
 * @property-read string $from_field
 * @property-read int|float $gg_p_time_vert_year
 * @property-read mixed $gg_parttimevert_anno
 * @property-read int|null $gg_parttimevert
 * @property-read mixed $gg_parttimevert_dalal
 * @property-read mixed $gg_presenza_dalal
 * @property-read \Illuminate\Support\Collection $indennita_tipo_dettaglio_all
 * @property-read mixed $last_data_assunz
 * @property-read int|float $perc_p_time_daterange
 * @property-read int|float $perc_p_time_year
 * @property-read mixed $perc_parttime_anno
 * @property-read float|null $perc_parttime
 * @property-read mixed $perc_parttime_dalal
 * @property-read mixed $titolo_di_studio
 * @property-read string $to_field
 * @property-read float|null $tot_x_ptime
 * @property-read Collection<int, \Modules\IndennitaCondizioniLavoro\Models\IndennitaTipoDettaglio> $indennitaTipoDettaglio
 * @property-read int|null $indennita_tipo_dettaglio_count
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
 * @property-read \Modules\IndennitaCondizioniLavoro\Models\StabiDirigente|null $stabiDirigente
 * @property-read Collection<int, Sto00f> $sto00f
 * @property-read int|null $sto00f_count
 * @property-read Collection<int, \Modules\IndennitaCondizioniLavoro\Models\IndennitaTipoDettaglio> $tipoDettaglio
 * @property-read int|null $tipo_dettaglio_count
 * @property-read Collection<int, Wstr01lx> $wstr01lx
 * @property-read int|null $wstr01lx_count
 * @property-read Collection<int, Wstr01lx> $wstr01lxYear
 * @property-read int|null $wstr01lx_year_count
 *
 * @method static Builder|ServizioEsterno newModelQuery()
 * @method static Builder|ServizioEsterno newQuery()
 * @method static Builder|ServizioEsterno ofDate(int $date)
 * @method static Builder|ServizioEsterno ofEnteYear(int $ente, int $year)
 * @method static Builder|ServizioEsterno ofQuarter(int $quarter, int $year)
 * @method static Builder|ServizioEsterno ofRangeDate(int $date_start, int $date_end)
 * @method static Builder|ServizioEsterno ofYear(int $year)
 * @method static Builder|ServizioEsterno query()
 * @method static Builder|ServizioEsterno whereAl($value)
 * @method static Builder|ServizioEsterno whereAnno($value)
 * @method static Builder|ServizioEsterno whereCategoriaEco($value)
 * @method static Builder|ServizioEsterno whereCodqua($value)
 * @method static Builder|ServizioEsterno whereCodquaTxt($value)
 * @method static Builder|ServizioEsterno whereCognome($value)
 * @method static Builder|ServizioEsterno whereCreatedAt($value)
 * @method static Builder|ServizioEsterno whereCreatedBy($value)
 * @method static Builder|ServizioEsterno whereDal($value)
 * @method static Builder|ServizioEsterno whereDisci1($value)
 * @method static Builder|ServizioEsterno whereDisci1Txt($value)
 * @method static Builder|ServizioEsterno whereEmail($value)
 * @method static Builder|ServizioEsterno whereEnte($value)
 * @method static Builder|ServizioEsterno whereGgAssenzaAnno($value)
 * @method static Builder|ServizioEsterno whereGgPresenzaAnno($value)
 * @method static Builder|ServizioEsterno whereGgPresenzaPeriodo($value)
 * @method static Builder|ServizioEsterno whereGgTrasferteAnno($value)
 * @method static Builder|ServizioEsterno whereHhAssenzaAnno($value)
 * @method static Builder|ServizioEsterno whereId($value)
 * @method static Builder|ServizioEsterno whereMatr($value)
 * @method static Builder|ServizioEsterno whereNome($value)
 * @method static Builder|ServizioEsterno wherePosfun($value)
 * @method static Builder|ServizioEsterno wherePosiz($value)
 * @method static Builder|ServizioEsterno wherePosizTxt($value)
 * @method static Builder|ServizioEsterno wherePropro($value)
 * @method static Builder|ServizioEsterno whereQua2ka($value)
 * @method static Builder|ServizioEsterno whereQua2kd($value)
 * @method static Builder|ServizioEsterno whereQuadrimestre($value)
 * @method static Builder|ServizioEsterno whereRep2ka($value)
 * @method static Builder|ServizioEsterno whereRep2kd($value)
 * @method static Builder|ServizioEsterno whereRepar($value)
 * @method static Builder|ServizioEsterno whereReparTxt($value)
 * @method static Builder|ServizioEsterno whereStabi($value)
 * @method static Builder|ServizioEsterno whereStabiTxt($value)
 * @method static Builder|ServizioEsterno whereTot($value)
 * @method static Builder|ServizioEsterno whereTotPresenzaPeriodoPlusNoTimbr($value)
 * @method static Builder|ServizioEsterno whereTrimestre($value)
 * @method static Builder|ServizioEsterno whereUpdatedAt($value)
 * @method static Builder|ServizioEsterno whereUpdatedBy($value)
 * @method static Builder|ServizioEsterno whereValutatoreId($value)
 * @method static Builder|ServizioEsterno withDays(int $date_min, int $date_max)
 *
 * @mixin \Eloquent
 */
class ServizioEsterno extends BaseModel
{
    use MutatorTrait;
    use RelationshipTrait;
    use SigmaModelTrait;

    protected $table = 'condizioni_lavoro'; // sia condizioni_lavoro che servizio_esterno usano la stessa tabella

    protected $fillable = [
        'ente', 'matr', 'cognome', 'nome', 'email',
        'stabi', 'stabi_txt', 'repar', 'repar_txt',
        'propro', 'posfun', 'categoria_eco',
        'gg_presenza_anno', 'gg_assenza_anno', 'gg_trasferte_anno',
        'anno', 'trimestre', 'dal', 'al',
        'rep2kd', 'rep2ka', 'qua2kd', 'qua2ka',
        'gg_presenza_periodo',
        'tot_presenza_periodo_plus_no_timbr',
    ];

    protected $casts = ['dal' => 'datetime', 'al' => 'datetime', 'created_at' => 'datetime', 'updated_at' => 'datetime'];

    // ------ relationship ----------

    public function indennitaTipoDettaglio(): BelongsToMany
    {
        $cross = 'servizio_esterno_x_indennita_tipo_dettaglio';
        $pivot_fields = 'gg';

        return $this->belongsToManyX(IndennitaTipoDettaglio::class, $cross)
            ->using(ServizioEsternoIndennitaTipoDettaglioPivot::class)
            ->withPivot($pivot_fields);
    }

    public function tipoDettaglio(): BelongsToMany
    {
        // return $this->hasMany(CondizioniLavoroIndennitaTipoDettaglioPivot::class);
        $cross = 'servizio_esterno_x_indennita_tipo_dettaglio';
        $pivot_fields = ['gg'];

        return $this->belongsToManyX(IndennitaTipoDettaglio::class, $cross)
            ->using(ServizioEsternoIndennitaTipoDettaglioPivot::class)
            ->withPivot($pivot_fields);
    }

    // -------- mutators ------------

    public function getTotAttribute(?float $value): ?float
    {
        $tot = 0;
        foreach ($this->indennitaTipoDettaglio as $indennitumTipoDettaglio) {
            // 264    Access to an undefined property Modules\IndennitaCondizioniLavoro\Models\IndennitaTipoDettaglio::$pivot.
            // getRelationValue("pivot") ???
            // $tot += $row->euro_giorno * $row->pivot->gg;
            $tot += $indennitumTipoDettaglio->euro_giorno * $indennitumTipoDettaglio->getRelationValue('pivot')->gg;
        }

        return $tot;
    }

    public function getTotXPtimeAttribute(?float $value): ?float
    {
        $tot = $this->tot;
        $ptime = $this->perc_p_time_daterange;

        return $tot * $ptime;
    }

    public function getReparTxtAttribute(?string $value): ?string
    {
        if ($value !== null) {
            return $value;
        }

        if (! \is_object($this->reparts)) {
            dddx([$this]);
        }

        return optional($this->reparts->where('repar', $this->repar)->first())->dest1;
    }

    public function getDisci1Attribute(?string $value): ?string
    {
        $qua00f_curr = $this->qua00fDaterange->first();
        if (! \is_object($qua00f_curr)) {
            return null;
        }

        // Access to an undefined property Modules\Sigma\Models\Qua00f::$disci1.
        // return $qua00f_curr->disci1;
        return $qua00f_curr->attributes['disci1'];
    }

    public function getCodquaAttribute(?string $value): ?string
    {
        $qua00f_curr = $this->qua00fDaterange->first();
        if (! $qua00f_curr instanceof Qua00f) {
            return '---';
        }

        return $qua00f_curr->codqua;
    }

    public function getAllIndennitaTipoAttribute(?string $value): Collection
    {
        return IndennitaTipo::all();
    }

    public function getGgTrasferteAnnoAttribute(?int $value): ?int
    {
        if ($value !== null) {
            return $value;
        }

        $trasferte = $this->trasferte;
        $giorni = [];

        // 321    Access to an undefined property Modules\Trasferte\Models\FuoriSedeDip::$dal.
        // 322    Access to an undefined property Modules\Trasferte\Models\FuoriSedeDip::$al.
        foreach ($trasferte as $trasf) {
            // $curr = $trasf->dal;
            $curr = $trasf->attributes['dal'];
            while ($curr <= $trasf->attributes['al']) {
                $giorni[] = $curr->format('Ymd');
                $curr->addDay();
            }
        }

        $giorni = array_unique($giorni);
        $giorni = \count($giorni);

        $this->gg_trasferte_anno = $giorni;
        $this->save();

        return $giorni;
    }

    public function getGgPresenzaAnnoAttribute(?int $value): ?int
    {
        if ($value !== null) {
            return $value;
        }

        // 343    Called 'count' on Laravel collection, but could have been retrieved as a query.
        $gg = $this->wstr01lx()->select('wtdata')->distinct('wtdata')->get()->count();
        $this->gg_presenza_anno = $gg;
        $this->save();

        return $gg;
    }

    public function getTotPresenzaPeriodoPlusNoTimbrAttribute(?int $value): ?int
    {
        if ($value < $this->gg_presenza_periodo) {
            return $this->gg_presenza_periodo;
        }

        return $value;
    }

    public function getGgAssenzaAnnoAttribute(?int $value): ?int
    {
        if ($value !== null) {
            return $value;
        }

        $asz = $this->asz00k1()->where('aszumi', 'G')
            ->get();
        $gg = $asz->sum('aszdur');
        $this->gg_assenza_anno = $gg;
        $this->save();

        return $gg;
    }

    public function getHhAssenzaAnnoAttribute(?int $value): ?int
    {
        if ($value !== null) {
            return $value;
        }

        $asz = $this->asz00k1()->where('aszumi', 'O')
            ->whereRaw('concat(asztip,"-",aszcod)!="504-13"') // nelle assenze tolgo le trasferte
            ->get();
        $hh = $asz->sum('aszdur');
        $this->hh_assenza_anno = $hh;
        $this->save();

        return $hh;
    }

    public function getCognomeAttribute(?string $value): ?string
    {
        if ($value !== null) {
            return $value;
        }

        $anag = optional($this->anag);
        $value = $anag->conome;
        $this->cognome = $value;
        $this->nome = $anag->nome;
        $this->save();

        return $value;
    }

    public function getNomeAttribute(?string $value): ?string
    {
        if ($value !== null) {
            return $value;
        }

        $value = optional($this->anag)->nome;
        $this->nome = $value;
        $this->save();

        return $value;
    }

    // --------- function -----------

    public static function populate(array $params): void
    {
        // $params=array_merge(getRouteParameters(),$params);
        $anno = 0;
        $stabi = 0;
        $repar = 0;
        extract($params);
        $sql = '(
    		('.$anno.' between year(rep2kd) and year(rep2ka))
    		or
    		('.$anno.' >= year(rep2kd) and rep2ka=0)
    	)';
        $rows0 = Rep00f::where('repst1', $stabi)->where('repre1', $repar)->whereRaw($sql)->whereRaw('repann=""');
        foreach ($rows0->get() as $row) {
            // 425    Cannot call method format() on int
            // 425    Cannot call method format() on int
            // 425    Cannot call method format() on int
            // 425    Cannot call method format() on int
            // 425    Cannot call method format() on int
            // 425    Cannot call method format() on int
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
            $obj->rep2kd = $row->rep2kd;
            $obj->rep2ka = $row->rep2ka;
            $obj->anno = $anno;
            if ($obj->dal === null) {
                $obj->dal = Carbon::createFromDate($anno, 1, 1);
            }

            if ($obj->al === null) {
                $obj->al = Carbon::createFromDate($anno, 12, 31);
            }

            if ($obj->propro === 0 || $obj->propro === null) {
                $sql = '
                (
                    ('.$obj->dal->format('Ymd').' between qua2kd and qua2ka )
                    or
                    ('.$obj->dal->format('Ymd').' >= qua2kd and qua2ka=0 )
                    or
                    ('.$obj->al->format('Ymd').' between qua2kd and qua2ka )
                    or
                    ('.$obj->al->format('Ymd').' >= qua2kd and qua2ka=0 )
                    or
                    (qua2kd between '.$obj->dal->format('Ymd').' and '.$obj->al->format('Ymd').')
                    or
                    (qua2ka between '.$obj->dal->format('Ymd').' and '.$obj->al->format('Ymd').')
                )
                ';
                // dd($obj->anag);
                if ($obj->anag === null) {
                    throw new \Exception('obj-anag is null ['.__LINE__.']['.__FILE__.']');
                }

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
                    // 497    Property Modules\IndennitaCondizioniLavoro\Models\ServizioEsterno::$id (int) does not accept null.
                    // $obj1->id = null;
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

    // end function
}// end class
