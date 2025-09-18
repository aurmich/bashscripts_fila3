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
use Modules\Sigma\Models\Anag;
use Modules\Sigma\Models\Asz00f;
use Modules\Sigma\Models\Asz00k1;
use Modules\Sigma\Models\Qua00f;
use Modules\Sigma\Models\Qua03f;
use Modules\Sigma\Models\Rep00f;
use Modules\Sigma\Models\Repart;
use Modules\Sigma\Models\Sto00f;
use Modules\Sigma\Models\Traits\Mutators\EnteMatrAnnoMutator;
use Modules\Sigma\Models\Traits\Mutators\EnteMatrDateRangeMutator;
use Modules\Sigma\Models\Traits\Mutators\EnteMatrMutator;
use Modules\Sigma\Models\Traits\Relationships\EnteMatrAnnoRelationship;
use Modules\Sigma\Models\Traits\Relationships\EnteMatrDateRangeRelationship;
use Modules\Sigma\Models\Traits\Relationships\EnteMatrRelationship;
use Modules\Sigma\Models\Traits\SigmaModelTrait;
use Modules\Sigma\Models\Wstr01lx;

/**
 * Modules\IndennitaCondizioniLavoro\Models\CondizioniLavoro.
 *
 * @property int                                                                               $id
 * @property int|null                                                                          $ente
 * @property int|null                                                                          $matr
 * @property string|null                                                                       $email
 * @property string|null                                                                       $cognome
 * @property string|null                                                                       $nome
 * @property int|null                                                                          $trimestre
 * @property int|null                                                                          $stabi
 * @property string|null                                                                       $stabi_txt
 * @property int|null                                                                          $repar
 * @property string|null                                                                       $repar_txt
 * @property int|null                                                                          $propro
 * @property int|null                                                                          $posfun
 * @property string|null                                                                       $categoria_eco
 * @property int|null                                                                          $posiz
 * @property string|null                                                                       $posiz_txt
 * @property int|null                                                                          $gg_presenza_anno
 * @property int|null                                                                          $gg_presenza_periodo
 * @property int|null                                                                          $gg_assenza_anno
 * @property string|null                                                                       $hh_assenza_anno
 * @property int|null                                                                          $gg_trasferte_anno
 * @property int|null                                                                          $anno
 * @property int|null                                                                          $rep2kd
 * @property int|null                                                                          $rep2ka
 * @property int|null                                                                          $qua2kd
 * @property int|null                                                                          $qua2ka
 * @property \Illuminate\Support\Carbon|null                                                   $dal
 * @property \Illuminate\Support\Carbon|null                                                   $al
 * @property \Illuminate\Support\Carbon|null                                                   $created_at
 * @property \Illuminate\Support\Carbon|null                                                   $updated_at
 * @property string|null                                                                       $created_by
 * @property string|null                                                                       $updated_by
 * @property int                                                                               $disci1
 * @property string                                                                            $disci1_txt
 * @property int                                                                               $codqua
 * @property string                                                                            $codqua_txt
 * @property int                                                                               $tot_presenza_periodo_plus_no_timbr
 * @property float|null                                                                        $tot
 * @property int|null                                                                          $valutatore_id
 * @property int|null                                                                          $quadrimestre
 * @property Collection<int, Sto00f>                                                           $Sto00fYear
 * @property int|null                                                                          $sto00f_year_count
 * @property Collection<int, Ana02f>                                                           $ana02f
 * @property int|null                                                                          $ana02f_count
 * @property Ana10f|null                                                                       $ana10f
 * @property Anag|null                                                                         $anag
 * @property Collection<int, Asz00f>                                                           $asz00f
 * @property int|null                                                                          $asz00f_count
 * @property Collection<int, Asz00k1>                                                          $asz00k1
 * @property int|null                                                                          $asz00k1_count
 * @property Collection<int, Asz00k1>                                                          $asz00k1Year
 * @property int|null                                                                          $asz00k1_year_count
 * @property mixed                                                                             $all_indennita_tipo
 * @property string                                                                            $from_field
 * @property int|float                                                                         $gg_p_time_vert_year
 * @property mixed                                                                             $gg_parttimevert_anno
 * @property int|null                                                                          $gg_parttimevert
 * @property mixed                                                                             $gg_parttimevert_dalal
 * @property mixed                                                                             $gg_presenza_dalal
 * @property \Illuminate\Support\Collection                                                    $indennita_tipo_dettaglio_all
 * @property mixed                                                                             $last_data_assunz
 * @property int|float                                                                         $perc_p_time_daterange
 * @property int|float                                                                         $perc_p_time_year
 * @property mixed                                                                             $perc_parttime_anno
 * @property float|null                                                                        $perc_parttime
 * @property mixed                                                                             $perc_parttime_dalal
 * @property mixed                                                                             $titolo_di_studio
 * @property string                                                                            $to_field
 * @property float|null                                                                        $tot_x_ptime
 * @property Collection<int, \Modules\IndennitaCondizioniLavoro\Models\IndennitaTipoDettaglio> $indennitaTipoDettaglio
 * @property int|null                                                                          $indennita_tipo_dettaglio_count
 * @property Collection<int, Qua00f>                                                           $qua00f
 * @property int|null                                                                          $qua00f_count
 * @property Collection<int, Qua00f>                                                           $qua00fDaterange
 * @property int|null                                                                          $qua00f_daterange_count
 * @property Collection<int, Qua00f>                                                           $qua00fYear
 * @property int|null                                                                          $qua00f_year_count
 * @property Collection<int, Qua03f>                                                           $qua03f
 * @property int|null                                                                          $qua03f_count
 * @property Collection<int, Rep00f>                                                           $rep00f
 * @property int|null                                                                          $rep00f_count
 * @property Collection<int, Repart>                                                           $reparts
 * @property int|null                                                                          $reparts_count
 * @property StabiDirigente|null                                                               $stabiDirigente
 * @property Collection<int, Sto00f>                                                           $sto00f
 * @property int|null                                                                          $sto00f_count
 * @property Collection<int, \Modules\IndennitaCondizioniLavoro\Models\IndennitaTipoDettaglio> $tipoDettaglio
 * @property int|null                                                                          $tipo_dettaglio_count
 * @property Collection<int, Wstr01lx>                                                         $wstr01lx
 * @property int|null                                                                          $wstr01lx_count
 * @property Collection<int, Wstr01lx>                                                         $wstr01lxYear
 * @property int|null                                                                          $wstr01lx_year_count
 *
 * @method static Builder|CondizioniLavoro newModelQuery()
 * @method static Builder|CondizioniLavoro newQuery()
 * @method static Builder|CondizioniLavoro ofDate(int $date)
 * @method static Builder|CondizioniLavoro ofEnteYear(int $ente, int $year)
 * @method static Builder|CondizioniLavoro ofQuarter(int $quarter, int $year)
 * @method static Builder|CondizioniLavoro ofRangeDate(int $date_start, int $date_end)
 * @method static Builder|CondizioniLavoro ofYear(int $year)
 * @method static Builder|CondizioniLavoro query()
 * @method static Builder|CondizioniLavoro whereAl($value)
 * @method static Builder|CondizioniLavoro whereAnno($value)
 * @method static Builder|CondizioniLavoro whereCategoriaEco($value)
 * @method static Builder|CondizioniLavoro whereCodqua($value)
 * @method static Builder|CondizioniLavoro whereCodquaTxt($value)
 * @method static Builder|CondizioniLavoro whereCognome($value)
 * @method static Builder|CondizioniLavoro whereCreatedAt($value)
 * @method static Builder|CondizioniLavoro whereCreatedBy($value)
 * @method static Builder|CondizioniLavoro whereDal($value)
 * @method static Builder|CondizioniLavoro whereDisci1($value)
 * @method static Builder|CondizioniLavoro whereDisci1Txt($value)
 * @method static Builder|CondizioniLavoro whereEmail($value)
 * @method static Builder|CondizioniLavoro whereEnte($value)
 * @method static Builder|CondizioniLavoro whereGgAssenzaAnno($value)
 * @method static Builder|CondizioniLavoro whereGgPresenzaAnno($value)
 * @method static Builder|CondizioniLavoro whereGgPresenzaPeriodo($value)
 * @method static Builder|CondizioniLavoro whereGgTrasferteAnno($value)
 * @method static Builder|CondizioniLavoro whereHhAssenzaAnno($value)
 * @method static Builder|CondizioniLavoro whereId($value)
 * @method static Builder|CondizioniLavoro whereMatr($value)
 * @method static Builder|CondizioniLavoro whereNome($value)
 * @method static Builder|CondizioniLavoro wherePosfun($value)
 * @method static Builder|CondizioniLavoro wherePosiz($value)
 * @method static Builder|CondizioniLavoro wherePosizTxt($value)
 * @method static Builder|CondizioniLavoro wherePropro($value)
 * @method static Builder|CondizioniLavoro whereQua2ka($value)
 * @method static Builder|CondizioniLavoro whereQua2kd($value)
 * @method static Builder|CondizioniLavoro whereQuadrimestre($value)
 * @method static Builder|CondizioniLavoro whereRep2ka($value)
 * @method static Builder|CondizioniLavoro whereRep2kd($value)
 * @method static Builder|CondizioniLavoro whereRepar($value)
 * @method static Builder|CondizioniLavoro whereReparTxt($value)
 * @method static Builder|CondizioniLavoro whereStabi($value)
 * @method static Builder|CondizioniLavoro whereStabiTxt($value)
 * @method static Builder|CondizioniLavoro whereTot($value)
 * @method static Builder|CondizioniLavoro whereTotPresenzaPeriodoPlusNoTimbr($value)
 * @method static Builder|CondizioniLavoro whereTrimestre($value)
 * @method static Builder|CondizioniLavoro whereUpdatedAt($value)
 * @method static Builder|CondizioniLavoro whereUpdatedBy($value)
 * @method static Builder|CondizioniLavoro whereValutatoreId($value)
 * @method static Builder|CondizioniLavoro withDays(int $date_min, int $date_max)
 *
 * @mixin \Eloquent
 */
class CondizioniLavoro extends BaseModel
{
    use MutatorTrait;
    use RelationshipTrait;
    use SigmaModelTrait;

    use EnteMatrMutator;
    // use EnteMatrRelationship;
    // use EnteMatrDateRangeRelationship;
    // use EnteMatrDateRangeMutator;
    // use EnteMatrAnnoRelationship;
    // use EnteMatrAnnoMutator;

    protected $table = 'condizioni_lavoro';

    protected $fillable =
        [
            'ente', 'matr', 'cognome', 'nome', 'email',
            'stabi', 'stabi_txt', 'repar', 'repar_txt',
            'propro', 'posfun', 'categoria_eco',
            'gg_presenza_anno', 'gg_assenza_anno', 'gg_trasferte_anno',
            'anno', 'trimestre', 'quadrimestre', 'dal', 'al',
            'rep2kd', 'rep2ka', 'qua2kd', 'qua2ka',
            'gg_presenza_periodo',
            'tot_presenza_periodo_plus_no_timbr',
            'valutatore_id',
        ];

    protected $casts = ['dal' => 'datetime', 'al' => 'datetime', 'created_at' => 'datetime', 'updated_at' => 'datetime'];

    // ------ relationship ----------
    /* WIP
    public function indennitaTipo() {
    return $this->hasManyThrough(IndennitaTipo::class, CondizioniLavoroIndennitaTipoDettaglioPivot::class);
    }
    */

    public function tipoDettaglio(): BelongsToMany
    {
        // /*
        // return $this->hasMany(CondizioniLavoroIndennitaTipoDettaglioPivot::class);
        $cross = 'condizioni_lavoro_x_indennita_tipo_dettaglio';
        $pivot_fields = ['gg'];

        return $this->belongsToMany(IndennitaTipoDettaglio::class, $cross)
            ->using(CondizioniLavoroIndennitaTipoDettaglioPivot::class)
            ->withPivot($pivot_fields);
        // */
        // return $this->belongsToManyX(IndennitaTipoDettaglio::class);
    }

    public function indennitaTipoDettaglio(): BelongsToMany
    {
        $cross = 'condizioni_lavoro_x_indennita_tipo_dettaglio';
        $pivot_fields = 'gg';

        return $this->belongsToMany(IndennitaTipoDettaglio::class, $cross)
            ->using(CondizioniLavoroIndennitaTipoDettaglioPivot::class)
            ->withPivot($pivot_fields);
    }

    /*
    public function qua00f(){
        $sql='(
            ('.$this->anno.' between year(qua2kd) and year(qua2ka)) or
            ('.$this->anno.' >= year(qua2kd) and qua2ka=0)
        )';
        return $this->hasMany(Qua00f::class,'matr','matr')
            ->where('ente',$this->ente)
            ->whereRaw('quaann=""')
            ->whereRaw($sql);
    }
    */

    // -------- mutators ------------

    public function getTotAttribute(?float $value): ?float
    {
        $tot = 0;
        foreach ($this->indennitaTipoDettaglio as $indennitumTipoDettaglio) {
            $tot += $indennitumTipoDettaglio->euro_giorno * $indennitumTipoDettaglio->pivot->gg;
        }

        $this->tot = $tot;
        $this->save();

        return $tot;
    }

    public function getTotXPtimeAttribute(?float $value): ?float
    {
        $tot = $this->tot;
        $ptime = $this->perc_p_time_daterange;

        return $tot * $ptime;
    }

    public function reparts(): HasMany
    {
        return $this->hasMany(Repart::class, 'stabi', 'stabi')
            ->where('ente', $this->ente);
    }

    public function getReparTxtAttribute(?string $value): ?string
    {
        if (null !== $value) {
            return $value;
        }

        if (! \is_object($this->reparts)) {
            // dddx([$this]);
            dddx(rowsToSql($this->reparts()));
        }

        $repart = $this->reparts->where('repar', $this->repar)->first();
        if (null === $repart) {
            // dddx($this->stabi.' '.$this->repar);
            return '['.$this->stabi.' '.$this->repar.']';
        }

        return $repart->dest1;
    }

    public function getDisci1Attribute($value)
    {
        $qua00f_curr = $this->qua00fDaterange->first();
        if (! \is_object($qua00f_curr)) {
            return null;
        }

        return $qua00f_curr->disci1;
    }

    public function getCodquaAttribute($value)
    {
        $qua00f_curr = $this->qua00fDaterange->first();
        if (! $qua00f_curr instanceof Qua00f) {
            return '---';
        }

        return $qua00f_curr->codqua;
    }

    public function indennitaTipoAnno($anno = null)
    {
        if (null === $anno) {
            $anno = $this->anno;
        }

        // return $this->hasMany(IndennitaTipo::class, 'anno', 'anno');
        $table = app(IndennitaTipo::class)->getTable();

        return IndennitaTipo::whereRaw($anno.' between '.$table.'.dal and '.$table.'.al')->get();
    }

    public function getAllIndennitaTipoAttribute($value)
    {
        return IndennitaTipo::all();
    }

    public function getGgTrasferteAnnoAttribute(?int $value): ?int
    {
        if (null !== $value) {
            return $value;
        }

        return 0;
        /*
        $trasferte = $this->trasferte;
        $giorni = [];
        foreach ($trasferte ?? [] as $trasf) {
            $curr = $trasf->dal;
            while ($curr <= $trasf->al && $curr !== null) {
                $giorni[] = $curr->format('Ymd');
                $curr->addDay();
            }
        }

        $giorni = array_unique($giorni);
        $giorni = \count($giorni);

        $this->gg_trasferte_anno = $giorni;
        $this->save();

        return $giorni;
        */
    }

    public function getGgPresenzaAnnoAttribute(?int $value): ?int
    {
        if (null !== $value) {
            return $value;
        }

        $gg = $this->wstr01lx()->select('wtdata')->distinct('wtdata')->get()->count();
        $this->gg_presenza_anno = $gg;
        $this->save();

        return $gg;
    }

    public function getTotPresenzaPeriodoPlusNoTimbrAttribute($value)
    {
        if ($value < $this->gg_presenza_periodo) {
            return $this->gg_presenza_periodo;
        }

        return $value;
    }

    public function getGgAssenzaAnnoAttribute($value)
    {
        if (null !== $value) {
            return $value;
        }

        $asz = $this->asz00k1()->where('aszumi', 'G')
            ->get();
        $gg = $asz->sum('aszdur');
        $this->gg_assenza_anno = $gg;
        $this->save();

        return $gg;
    }

    public function getHhAssenzaAnnoAttribute($value)
    {
        if (null !== $value) {
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

    /*
    public function getCognomeAttribute(?string $value): ?string
    {
        if ($value !== null) {
            return $value;
        }

        if ($this->anag == null) {
            return null;
        }

        $value = $this->anag->conome;
        $this->cognome = $value;
        $this->nome = $this->anag->nome;
        $this->save();

        return $value;
    }

    public function getNomeAttribute(?string $value): ?string
    {
        if ($value !== null) {
            return $value;
        }

        if ($this->anag == null) {
            return null;
        }

        $value = $this->anag->nome;
        $this->nome = $value;
        $this->save();

        return $value;
    }
    */

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
            if (null === $obj->dal) {
                $obj->dal = Carbon::createFromDate($anno, 1, 1);
            }

            if (null === $obj->al) {
                $obj->al = Carbon::createFromDate($anno, 12, 31);
            }

            if (0 === $obj->propro || null === $obj->propro) {
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
                $qua00f = $obj->anag->qua00f()->select('propro', 'posfun', 'posiz')->distinct()->whereRaw($sql);
                // echo '<br/>'.$qua00f->count().' - '.$qua00f->first()->propro.'  - '.$qua00f->first()->posfun;
                if (1 === $qua00f->get()->count()) {
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
                    $obj1->al = 0 !== $qua00f[1]->qua2ka ? Carbon::parse($qua00f[1]->qua2ka) : $al_old;
                    $obj1->id = null;
                    $obj1->save();
                }
            }

            $obj->save();
            // dd($obj);
            // echo '<br/><pre>['.$obj->id.']</pre>';
        }

        // dd('['.__LINE__.']['.__FILE__.']');
        $obj = new self();
        $table = $obj->getTable();
        $conn = $obj->getConnection();
        $where = $table.'.anno="'.$anno.'" ';
        // Anag::massUpdateCognomeNome(['conn' => $conn, 'table' => $table, 'where' => $where]);
        // Anag::massUpdateCategoriaEco(['conn' => $conn, 'table' => $table, 'where' => $where]);
        // Anag::massUpdatePosizTxt(['conn' => $conn, 'table' => $table, 'where' => $where]);
        // Anag::massUpdateStabiTxtReparTxt(['conn' => $conn, 'table' => $table, 'where' => $where]);
    }

    // end function

    /**
     * Undocumented function.
     */
    public function getValutatoreIdAttribute(?int $value): ?int
    {
        if ($value > 100) {
            // dddx($value);

            return $value;
        }

        // dddx($this->attributes['valutatore_id']);

        $stabi_diri = $this->stabiDirigente;
        if (! \is_object($stabi_diri)) {
            return $value;
        }

        $valutatore_id = $stabi_diri->valutatore_id;
        if (null !== $valutatore_id) {
            $this->valutatore_id = $valutatore_id;
            $this->save();

            return (int) $valutatore_id;
        }

        $stabi = StabiDirigente::firstOrCreate(
            [
                'anno' => $this->anno,
                'stabi' => $this->stabi,
                'repar' => 0,
            ]
        );
        if (null === $stabi->valutatore_id) {
            $stabi->valutatore_id = $stabi->id;
            $stabi->save();
        }

        $this->valutatore_id = $stabi->valutatore_id;
        $this->save();

        return (int) $valutatore_id;
    }

    public function getNextQuadrimestre(): ?CondizioniLavoro
    {
        $where = [
            'quadrimestre' => $this->quadrimestre + 1,
            'anno' => $this->anno,
            'ente' => $this->ente,
            'matr' => $this->matr,
            'valutatore_id' => $this->valutatore_id,
        ];

        return CondizioniLavoro::firstWhere($where);
    }
}// end class
