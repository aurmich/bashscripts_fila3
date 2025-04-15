<?php

declare(strict_types=1);

namespace Modules\Sigma\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

// ----------traits ---
/**
 * Modules\Sigma\Models\Qua00k1.
 *
 * @property int $id
 * @property int|null $ente
 * @property int|null $cont
 * @property int|null $matr
 * @property int|null $tipco
 * @property int|null $rapp
 * @property int|null $ruolo
 * @property int|null $propro
 * @property int|null $posfun
 * @property int|null $codqua
 * @property int|null $qudal
 * @property int|null $qual
 * @property int|null $quanz
 * @property int|null $posiz
 * @property int|null $sipco
 * @property int|null $sapp
 * @property int|null $suolo
 * @property int|null $sropro
 * @property int|null $sosfun
 * @property int|null $sodqua
 * @property int|null $annise
 * @property int|null $prvtip
 * @property int|null $prvdat
 * @property string|null $prvnum
 * @property int|null $datpas
 * @property string|null $serviz
 * @property int|null $disci1
 * @property int|null $disci2
 * @property string|null $oree
 * @property string|null $oret
 * @property int|null $aapens
 * @property string|null $quaann
 * @property int|null $qua2kd
 * @property int|null $qua2ka
 * @property int|null $qua2kz
 * @property int|null $prv2kd
 * @property int|null $dat2kp
 * @property int|null $qua001
 * @property string|null $qua002
 * @property string|null $qua003
 * @property int|null $qua004
 * @property int|null $qua005
 * @property-read \Modules\Sigma\Models\Tqu00f|null $Tqu00f
 *
 * @method static Builder|Qua00k1 newModelQuery()
 * @method static Builder|Qua00k1 newQuery()
 * @method static Builder|Qua00k1 query()
 * @method static Builder|Qua00k1 whereAapens($value)
 * @method static Builder|Qua00k1 whereAnnise($value)
 * @method static Builder|Qua00k1 whereCodqua($value)
 * @method static Builder|Qua00k1 whereCont($value)
 * @method static Builder|Qua00k1 whereDat2kp($value)
 * @method static Builder|Qua00k1 whereDatpas($value)
 * @method static Builder|Qua00k1 whereDisci1($value)
 * @method static Builder|Qua00k1 whereDisci2($value)
 * @method static Builder|Qua00k1 whereEnte($value)
 * @method static Builder|Qua00k1 whereId($value)
 * @method static Builder|Qua00k1 whereMatr($value)
 * @method static Builder|Qua00k1 whereOree($value)
 * @method static Builder|Qua00k1 whereOret($value)
 * @method static Builder|Qua00k1 wherePosfun($value)
 * @method static Builder|Qua00k1 wherePosiz($value)
 * @method static Builder|Qua00k1 wherePropro($value)
 * @method static Builder|Qua00k1 wherePrv2kd($value)
 * @method static Builder|Qua00k1 wherePrvdat($value)
 * @method static Builder|Qua00k1 wherePrvnum($value)
 * @method static Builder|Qua00k1 wherePrvtip($value)
 * @method static Builder|Qua00k1 whereQua001($value)
 * @method static Builder|Qua00k1 whereQua002($value)
 * @method static Builder|Qua00k1 whereQua003($value)
 * @method static Builder|Qua00k1 whereQua004($value)
 * @method static Builder|Qua00k1 whereQua005($value)
 * @method static Builder|Qua00k1 whereQua2ka($value)
 * @method static Builder|Qua00k1 whereQua2kd($value)
 * @method static Builder|Qua00k1 whereQua2kz($value)
 * @method static Builder|Qua00k1 whereQuaann($value)
 * @method static Builder|Qua00k1 whereQual($value)
 * @method static Builder|Qua00k1 whereQuanz($value)
 * @method static Builder|Qua00k1 whereQudal($value)
 * @method static Builder|Qua00k1 whereRapp($value)
 * @method static Builder|Qua00k1 whereRuolo($value)
 * @method static Builder|Qua00k1 whereSapp($value)
 * @method static Builder|Qua00k1 whereServiz($value)
 * @method static Builder|Qua00k1 whereSipco($value)
 * @method static Builder|Qua00k1 whereSodqua($value)
 * @method static Builder|Qua00k1 whereSosfun($value)
 * @method static Builder|Qua00k1 whereSropro($value)
 * @method static Builder|Qua00k1 whereSuolo($value)
 * @method static Builder|Qua00k1 whereTipco($value)
 *
 * @mixin \Eloquent
 */
class Qua00k1 extends Model
{
    protected $fillable = ['id', 'ente', 'cont', 'matr', 'tipco', 'rapp', 'ruolo', 'propro', 'posfun', 'codqua', 'qudal', 'qual', 'quanz', 'posiz', 'sipco', 'sapp', 'suolo', 'sropro', 'sosfun', 'sodqua', 'annise', 'prvtip', 'prvdat', 'prvnum', 'datpas', 'serviz', 'disci1', 'disci2', 'oree', 'oret', 'aapens', 'quaann', 'qua2kd', 'qua2ka', 'qua2kz', 'prv2kd', 'dat2kp', 'qua001', 'qua002', 'qua003', 'qua004', 'qua005'];

    protected $connection = 'generale';

    // this will use the specified database connection
    protected $table = 'qua00k1';

    public $timestamps = false;

    public function Tqu00f(): HasOne
    {
        return $this->hasOne(Tqu00f::class, 'propro', 'propro')
            ->where('posfun', $this->posfun)
            ->where('codqua', $this->codqua)
            ->where('cont', $this->cont)
            ->where('tipco', $this->tipco)
            ->where('ruolo', $this->ruolo);
    }

    // ---------------------------------------------------------------------
    public static function last_qua00f(?array $params = null): ?self
    {
        if ($params === null) {
            $params = getRouteParameters();
        }

        // echo '<pre>';print_r('last_propro');echo '</pre>'; die();
        // $qua00f=Qua00f::where('ente',$params['ente'])
        // $qua00f=self::where('ente',$params['ente'])
        $qua00f = self::where('ente', $params['ente'])
            ->where('matr', $params['matr'])
            ->orderBy('qua2kd', 'desc')
            ->first();

        return $qua00f;
    }

    // /------------------------------------------
    public function giorni(?array $params = null): int
    {
        if ($params === null) {
            $params = getRouteParameters();
        }

        $carbon = new Carbon($this->attributes['qua2kd']);
        $al = $this->attributes['qua2ka'] === 0 ? new Carbon($params['anno'].'1231') : new Carbon($this->attributes['qua2ka']);
        // $st2kdi=new Carbon('19870202');

        return $al->diffInDays($carbon, true) + 1;
    }

    public function giorni_propro(?array $params = null): int
    {
        if ($params === null) {
            $params = getRouteParameters();
        }

        if (! isset($params['propro'])) {
            // $obj=clone($this)->first();
            // echo '<pre>';print_r($this->first()->toArray());echo '</pre>';
            // $obj=$obj->orderBy('qua2kd','desc')

            // echo '<pre>';print_r($obj->propro);echo '</pre>';
            // die('['.__LINE__.']');
            $params['propro'] = optional(static::last_qua00f())->propro;
            // $params['propro']=$obj->propro;
        }

        if ($this->propro === $params['propro']) {
            return $this->giorni($params);
        }

        return 0;
    }

    public function giorni_propro_posfun(?array $params = null): int
    {
        if ($params === null) {
            $params = getRouteParameters();
        }

        if (! isset($params['propro'])) {
            $params['propro'] = optional(static::last_qua00f())->propro;
        }

        if (! isset($params['posfun'])) {
            $params['posfun'] = optional(static::last_qua00f())->posfun;
        }

        if ($this->propro !== $params['propro']) {
            return 0;
        }
        if ($this->posfun !== $params['posfun']) {
            return 0;
        }

        return $this->giorni($params);
    }

    // --------------------------------------------------------------------
}
