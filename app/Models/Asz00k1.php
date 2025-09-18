<?php

declare(strict_types=1);

namespace Modules\Sigma\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Modules\Sigma\Models\Traits\Extras\FunctionExtra;
// ----------traits ---
use Modules\Sigma\Models\Traits\Scopes\CommonScope;
use Modules\Sigma\Models\Traits\SigmaModelTrait;

/**
 * Modules\Sigma\Models\Asz00k1.
 *
 * @property int $id
 * @property int $ente
 * @property int $cont
 * @property int $matr
 * @property int $asztip
 * @property int $aszcod
 * @property int $aszdal
 * @property int $aszal
 * @property string $aszini
 * @property string $aszfin
 * @property int $aszcom
 * @property int $asztpr
 * @property int $aszdpr
 * @property string $asznpr
 * @property string $aszumi
 * @property string $aszpes
 * @property string $aszdur
 * @property int $asz01
 * @property int $asz02
 * @property int $asz03
 * @property int $asz04
 * @property int $asz05
 * @property string $aszcm
 * @property string $aszcms
 * @property string $asztim
 * @property string $aszpro
 * @property int $aszprv
 * @property string $aszann
 * @property int $asz2kd
 * @property int $asz2ka
 * @property int $asz2kc
 * @property int $asz2kp
 * @property int $asz2kz
 * @property string $aszeup
 * @property string $asztin
 * @property int $asz001
 * @property string $asz002
 * @property string $asz003
 * @property int $asz004
 * @property int $asz005
 * @property Codici|null $codici
 * @property string $ann
 * @property mixed $aszdescr
 * @property string $from_field
 * @property mixed $posfun
 * @property string|null $posizione_eco
 * @property mixed $propro
 * @property string $to_field
 * @property Collection<int, \Modules\Sigma\Models\Qua00f> $qua00f
 * @property int|null $qua00f_count
 * @property Collection<int, \Modules\Sigma\Models\Qua00f> $qua00fsimple
 * @property int|null $qua00fsimple_count
 *
 * @method static Builder|Asz00k1 newModelQuery()
 * @method static Builder|Asz00k1 newQuery()
 * @method static Builder|Asz00k1 ofCodici($lista_codici)
 * @method static Builder|Asz00k1 ofDate(int $date)
 * @method static Builder|Asz00k1 ofEnteYear(int $ente, int $year)
 * @method static Builder|Asz00k1 ofListaProproPosfun($lista_propro, $posfun = null)
 * @method static Builder|Asz00k1 ofListaTipoCodice(string $lista_tipo_codice)
 * @method static Builder|Asz00k1 ofQuarter(int $quarter, int $year)
 * @method static Builder|Asz00k1 ofRangeDate(int $date_start, int $date_end)
 * @method static Builder|Asz00k1 ofYear(int $year)
 * @method static Builder|Asz00k1 query()
 * @method static Builder|Asz00k1 whereAsz001($value)
 * @method static Builder|Asz00k1 whereAsz002($value)
 * @method static Builder|Asz00k1 whereAsz003($value)
 * @method static Builder|Asz00k1 whereAsz004($value)
 * @method static Builder|Asz00k1 whereAsz005($value)
 * @method static Builder|Asz00k1 whereAsz01($value)
 * @method static Builder|Asz00k1 whereAsz02($value)
 * @method static Builder|Asz00k1 whereAsz03($value)
 * @method static Builder|Asz00k1 whereAsz04($value)
 * @method static Builder|Asz00k1 whereAsz05($value)
 * @method static Builder|Asz00k1 whereAsz2ka($value)
 * @method static Builder|Asz00k1 whereAsz2kc($value)
 * @method static Builder|Asz00k1 whereAsz2kd($value)
 * @method static Builder|Asz00k1 whereAsz2kp($value)
 * @method static Builder|Asz00k1 whereAsz2kz($value)
 * @method static Builder|Asz00k1 whereAszal($value)
 * @method static Builder|Asz00k1 whereAszann($value)
 * @method static Builder|Asz00k1 whereAszcm($value)
 * @method static Builder|Asz00k1 whereAszcms($value)
 * @method static Builder|Asz00k1 whereAszcod($value)
 * @method static Builder|Asz00k1 whereAszcom($value)
 * @method static Builder|Asz00k1 whereAszdal($value)
 * @method static Builder|Asz00k1 whereAszdpr($value)
 * @method static Builder|Asz00k1 whereAszdur($value)
 * @method static Builder|Asz00k1 whereAszeup($value)
 * @method static Builder|Asz00k1 whereAszfin($value)
 * @method static Builder|Asz00k1 whereAszini($value)
 * @method static Builder|Asz00k1 whereAsznpr($value)
 * @method static Builder|Asz00k1 whereAszpes($value)
 * @method static Builder|Asz00k1 whereAszpro($value)
 * @method static Builder|Asz00k1 whereAszprv($value)
 * @method static Builder|Asz00k1 whereAsztim($value)
 * @method static Builder|Asz00k1 whereAsztin($value)
 * @method static Builder|Asz00k1 whereAsztip($value)
 * @method static Builder|Asz00k1 whereAsztpr($value)
 * @method static Builder|Asz00k1 whereAszumi($value)
 * @method static Builder|Asz00k1 whereCont($value)
 * @method static Builder|Asz00k1 whereEnte($value)
 * @method static Builder|Asz00k1 whereId($value)
 * @method static Builder|Asz00k1 whereMatr($value)
 * @method static Builder|Asz00k1 withDays(int $date_min, int $date_max)
 * @method static Builder|Asz00k1 ofEnte(int $ente)
 *
 * @mixin \Eloquent
 */
class Asz00k1 extends Model
{
    use CommonScope;
    // use SigmaModelTrait;
    use FunctionExtra;

    protected $fillable = ['id', 'ente', 'cont', 'matr', 'asztip', 'aszcod', 'aszdal', 'aszal', 'aszini', 'aszfin', 'aszcom', 'asztpr', 'aszdpr', 'asznpr', 'aszumi', 'aszpes', 'aszdur', 'asz01', 'asz02', 'asz03', 'asz04', 'asz05', 'aszcm', 'aszcms', 'asztim', 'aszpro', 'aszprv', 'aszann', 'asz2kd', 'asz2ka', 'asz2kc', 'asz2kp', 'asz2kz', 'aszeup', 'asztin', 'asz001', 'asz002', 'asz003', 'asz004', 'asz005'];

    protected $connection = 'generale'; // this will use the specified database connection

    // protected $table = 'asz00k1';
    protected $table = 'asz00f';

    // !!! finche' abbiamo solo questa tabella da webservice
    public $timestamps = false;

    // -------------------------------------------------------------------------
    public static string $from_field = 'asz2kd';

    public static string $to_field = 'asz2ka';

    public static string $ann_field = 'aszann';

    // -------------------------------------------------------------------------

    public function codici()
    {
        // echo $obj->toSql();
        return $this->hasOne(Codici::class, 'tipo', 'asztip')
            ->where('codice', $this->aszcod);
    }

    // end class codici
    // ------------------------------------------------------------
    public function qua00fsimple(): HasMany
    {
        return $this->hasMany(Qua00f::class, 'matr', 'matr')
            ->whereRaw('quaann="" ');
    }

    public function qua00f()
    {
        /*
        if(!isset($this->attributes['asz2kd'])){
            dddx($this);
        }
        */
        $sql = '(
		(
			('.$this->asz2kd.' between qua2kd and qua2ka) or
		  	('.$this->asz2kd.' >= qua2kd and qua2ka=0)
		) or
		(
		  	(qua2kd between '.$this->asz2kd.' and '.$this->asz2ka.')
		)
		)';

        return $this->hasMany(Qua00f::class, 'matr', 'matr')
            ->where('ente', $this->ente)
            ->whereRaw('quaann="" ')
            ->whereRaw($sql);
    }

    public function scopeOfListaProproPosfun($query0, $lista_propro, $posfun = null)
    {
        // dddx($this);
        // dddx($query0);
        /*
        return $query0->whereHas('qua00fsimple',function ($query) use($query0){
            //dddx($query0);
            $query->where('ente',$this->ente);
            $sql='(
                (
                    ('.$this->asz2kd.' between qua2kd and qua2ka) or
                    ('.$this->asz2kd.' >= qua2kd and qua2ka=0)
                ) or
                (
                    (qua2kd between '.$this->asz2kd.' and '.$this->asz2ka.')
                )
                )';
             $query->whereRaw($sql);

        });
        */
        $table = $this->getTable();

        return $query0->join('qua00f', static function ($join) use ($lista_propro, $posfun, $table): void {
            $sql = '(
(asz2kd BETWEEN qua2kd AND qua2ka)
OR
(asz2kd >= qua2kd AND qua2ka=0)
OR
(qua2kd BETWEEN asz2kd AND asz2ka)
)';
            $join->on('qua00f.ente', '=', $table.'.ente')
                ->whereRaw('qua00f.matr ='.$table.'.matr')
                ->whereRaw('qua00f.quaann =""')
                ->whereRaw('find_in_set(qua00f.propro,"'.$lista_propro.'")')
                ->whereRaw($sql);
            if (isset($posfun)) {
                // $join->where('posfun', $posfun);
                $join->whereRaw('SUBSTR(posfun,-1,1)='.substr((string) $posfun, -1, 1).'');
            }
        });
    }

    public function scopeOfListaTipoCodice($query, string $lista_tipo_codice): void
    {
        $query->whereRaw('find_in_set(concat(asztip,"-",aszcod),"'.$lista_tipo_codice.'")');
    }

    // ------------------------------------------------------------
    public function gg(?array $params = null): float
    {
        if ($params === null) {
            $params = getRouteParameters();
        }

        /*
        $dates = ['date_min', 'date_max'];
        foreach ($dates as $date) {
            if (\is_object($params[$date])) {
                if ($params[$date]::class == Carbon::class) {
                    $params[$date] = (int) $params[$date]->format('Ymd');
                } else {
                    dddx($params[$date]::class);
                }
            }
        }
        */

        extract($params);

        if (! isset($date_max)) {
            throw new \Exception('date_max is not defined ['.__LINE__.']['.class_basename(self::class).']');
        }

        if (isset($date_min) && $this->attributes['asz2kd'] < $date_min) {
            $date_from = Carbon::createFromFormat('Ymd H:i', $date_min.' 00:00');
        } else {
            $date_from = Carbon::createFromFormat('Ymd H:i', $this->attributes['asz2kd'].' 00:00');
        }

        if ($this->attributes['asz2ka'] === 0 || $this->attributes['asz2ka'] > $date_max) {
            $date_to = \is_object($date_max) ? $date_max : Carbon::createFromFormat('Ymd H:i', $date_max.' 00:00');
        } else {
            try {
                $date_to = Carbon::createFromFormat('Ymd H:i', $this->attributes['asz2ka'].' 00:00');
            } catch (\Exception $e) {
                dddx([
                    'message' => $e->getMessage(),
                    'qua2ka' => $this->attributes['qua2ka'],
                ]);
            }
        }

        if ($date_from > $date_to || $this->attributes['aszumi'] === 'O') { // se e' a ore
            return 0;
        }

        if (isset($lista_propro) && ! \in_array($this->propro, explode(',', (string) $lista_propro), false)) {
            return 0;
        }

        if (isset($posfun) && substr((string) $this->posfun, -1, 1) !== substr((string) $posfun, -1, 1)) {
            return 0;
        }

        $value = $date_to->diffInDays($date_from, true) + 1;
        if ($value === 366) {
            dddx(
                [
                    'params' => $params,
                    'date_from' => $date_from,
                    'date_to' => $date_to,
                    'date_max' => $date_max,
                    'asz2kd' => $this->attributes['asz2kd'],
                    'asz2ka' => $this->attributes['asz2ka'],
                ]
            );
        }

        return $value;
    }

    public function hhDecimal(?array $params = null)
    {
        if ($params === null) {
            $params = getRouteParameters();
        }

        if ($this->attributes['aszumi'] === 'G') {
            return 0;
        }

        $aszdur = $this->aszdur;
        $aszdur_arr = explode('.', $aszdur);

        return $aszdur_arr[0] + ($aszdur_arr[1] / 60);

        /*
        extract($params);
        if ($this->attributes['asz2kd']<$date_min) {
            $date_from=new Carbon($date_min);
        } else {
            $date_from=new Carbon($this->attributes['asz2kd']);
        }
        if ($this->attributes['asz2ka']==0 || $this->attributes['asz2ka']>$date_max) {
            $date_to=new Carbon($date_max);
        } else {
            $date_to=new Carbon($this->attributes['asz2ka']);
        }
        //$st2kdi=new Carbon('19870202');
        if ($date_from>$date_to || $this->attributes['aszumi']=='G') { //se e' a giorni
            return 0;
        }
        //if($this->aszini!='0.00'){
            //$hh_start = Carbon::createFromTimeString(str_replace('.',':',$this->aszini), 'Europe/London');
            //dddx($hh_start);
            $date_from=Carbon::createFromFormat('Ymd H.s',$date_from->format('Ymd').' '.$this->aszini);
            $date_to=Carbon::createFromFormat('Ymd H.s',$date_to->format('Ymd').' '.$this->aszfin);
            //dddx($date_from);
        //}
        return $date_to->diffInMinutes($date_from);
        */
    }

    // ---------------------------------------------------------------------

    /*
    public function codiciAspettativeProgressioni(): \Illuminate\Database\Eloquent\Relations\HasOne {
        return $this->hasOne(\Modules\Progressioni\Models\CodiciAspettative::class, 'tipo', 'asztip')->whereRaw('codice="'.$this->aszcod.'"');
        //return \Modules\Progressioni\Models\CodiciAspettative::where('tipo',$this->asztip)->where('codice',$this->aszcod);
    }
    */

    // -------------- MUTATORS ---------------
    public function getFromFieldAttribute(?string $value): string
    {
        return 'asz2kd';
    }

    public function getToFieldAttribute(?string $value): string
    {
        return 'asz2ka';
    }

    public function getAnnAttribute($value): string
    {
        return 'aszann';
    }

    public function getAszdescrAttribute($value)
    {
        $codici = $this->codici;
        if (! \is_object($codici)) {
            return '-- no set --';
        }

        // dd($codici);
        return $codici->desc1;
    }

    public function getPosizioneEcoAttribute(?string $value): ?string
    {
        $qua00f = $this->qua00f;
        $qua00f_first = $qua00f->first();

        return optional($qua00f_first)->posizione_eco;
    }

    // ------ SCOPES --------
    public function scopeOfCodici($query, $lista_codici)
    {
        if (\is_array($lista_codici)) {
            $lista_codici = implode(',', $lista_codici);
        }

        return $query->whereRaw('find_in_set(concat(asztip,"-",aszcod),"'.$lista_codici.'")');
    }

    // ----------------------------------------------------------------------
    public function getProproAttribute($value)
    {
        $qua00f = $this->qua00f();
        // echo '<br/>['.$qua00f->count().']';
        if ($qua00f->count() > 1) {
            // dd($qua00f->get()->toArray()); //4 debug
            $html = '';
            $html .= '<table>';
            foreach ($qua00f->get() as $row) {
                $html .= '<tr><td>'.$row->propro.'</td><td>'.$row->posfun.'</td><td>'.$row->qua2kd.'</td><td>'.$row->qua2ka.'</td></tr>';
            }

            $html .= '</table>';
        }

        return $qua00f->first()->propro;
        // return $qua00f->get()->count();
    }

    // ----------------------------------------------------------------------
    public function getPosfunAttribute($value)
    {
        $qua00f = $this->qua00f();

        return $qua00f->first()->posfun;
    }

    // ----------------------------------------------------------------------
}
