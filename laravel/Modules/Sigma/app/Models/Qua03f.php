<?php

declare(strict_types=1);

namespace Modules\Sigma\Models;

use Carbon\Carbon;
use Exception;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Modules\Progressioni\Models\CategoriaPropro;
use Modules\Sigma\Models\Traits\Extras\FunctionExtra;
// ----------traits ---
use Modules\Sigma\Models\Traits\SigmaModelTrait;

/**
 * Modules\Sigma\Models\Qua03f.
 *
 * @property int $id
 * @property int $ente
 * @property int $matr
 * @property int $q3tipo
 * @property int $q3dal
 * @property int $q3al
 * @property string $q3desc
 * @property string $q3des2
 * @property string $q3des3
 * @property int $q3cont
 * @property int $q3pro
 * @property int $q3fun
 * @property int $q3man
 * @property int $q3dis
 * @property int $q3voc1
 * @property int $q3anz1
 * @property int $q3imp1
 * @property string $q3eur1
 * @property int $q3voc2
 * @property int $q3anz2
 * @property int $q3imp2
 * @property string $q3eur2
 * @property int $q3voc3
 * @property int $q3anz3
 * @property int $q3imp3
 * @property string $q3eur3
 * @property int $q3voc4
 * @property int $q3anz4
 * @property int $q3imp4
 * @property string $q3eur4
 * @property int $q3voc5
 * @property int $q3anz5
 * @property int $q3imp5
 * @property string $q3eur5
 * @property int $q3tip
 * @property int $q3dat
 * @property string $q3num
 * @property string $q3ann
 * @property int $q32kd
 * @property int $q32ka
 * @property int $q32ka1
 * @property int $q32ka2
 * @property int $q32ka3
 * @property int $q32ka4
 * @property int $q32ka5
 * @property int $q32k
 * @property int $q3001
 * @property string $q3002
 * @property string $q3003
 * @property int $q3004
 * @property int $q3005
 * @property-read \Modules\Sigma\Models\Tqu00f|null $Tqu00f
 * @property-read string|null $categoria_eco
 *
 * @method static Builder|Qua03f newModelQuery()
 * @method static Builder|Qua03f newQuery()
 * @method static Builder|Qua03f query()
 * @method static Builder|Qua03f whereEnte($value)
 * @method static Builder|Qua03f whereId($value)
 * @method static Builder|Qua03f whereMatr($value)
 * @method static Builder|Qua03f whereQ3001($value)
 * @method static Builder|Qua03f whereQ3002($value)
 * @method static Builder|Qua03f whereQ3003($value)
 * @method static Builder|Qua03f whereQ3004($value)
 * @method static Builder|Qua03f whereQ3005($value)
 * @method static Builder|Qua03f whereQ32k($value)
 * @method static Builder|Qua03f whereQ32ka($value)
 * @method static Builder|Qua03f whereQ32ka1($value)
 * @method static Builder|Qua03f whereQ32ka2($value)
 * @method static Builder|Qua03f whereQ32ka3($value)
 * @method static Builder|Qua03f whereQ32ka4($value)
 * @method static Builder|Qua03f whereQ32ka5($value)
 * @method static Builder|Qua03f whereQ32kd($value)
 * @method static Builder|Qua03f whereQ3al($value)
 * @method static Builder|Qua03f whereQ3ann($value)
 * @method static Builder|Qua03f whereQ3anz1($value)
 * @method static Builder|Qua03f whereQ3anz2($value)
 * @method static Builder|Qua03f whereQ3anz3($value)
 * @method static Builder|Qua03f whereQ3anz4($value)
 * @method static Builder|Qua03f whereQ3anz5($value)
 * @method static Builder|Qua03f whereQ3cont($value)
 * @method static Builder|Qua03f whereQ3dal($value)
 * @method static Builder|Qua03f whereQ3dat($value)
 * @method static Builder|Qua03f whereQ3des2($value)
 * @method static Builder|Qua03f whereQ3des3($value)
 * @method static Builder|Qua03f whereQ3desc($value)
 * @method static Builder|Qua03f whereQ3dis($value)
 * @method static Builder|Qua03f whereQ3eur1($value)
 * @method static Builder|Qua03f whereQ3eur2($value)
 * @method static Builder|Qua03f whereQ3eur3($value)
 * @method static Builder|Qua03f whereQ3eur4($value)
 * @method static Builder|Qua03f whereQ3eur5($value)
 * @method static Builder|Qua03f whereQ3fun($value)
 * @method static Builder|Qua03f whereQ3imp1($value)
 * @method static Builder|Qua03f whereQ3imp2($value)
 * @method static Builder|Qua03f whereQ3imp3($value)
 * @method static Builder|Qua03f whereQ3imp4($value)
 * @method static Builder|Qua03f whereQ3imp5($value)
 * @method static Builder|Qua03f whereQ3man($value)
 * @method static Builder|Qua03f whereQ3num($value)
 * @method static Builder|Qua03f whereQ3pro($value)
 * @method static Builder|Qua03f whereQ3tip($value)
 * @method static Builder|Qua03f whereQ3tipo($value)
 * @method static Builder|Qua03f whereQ3voc1($value)
 * @method static Builder|Qua03f whereQ3voc2($value)
 * @method static Builder|Qua03f whereQ3voc3($value)
 * @method static Builder|Qua03f whereQ3voc4($value)
 * @method static Builder|Qua03f whereQ3voc5($value)
 *
 * @mixin \Eloquent
 */
class Qua03f extends Model
{
    // use SigmaModelTrait;
    use FunctionExtra;

    protected $fillable = [
        'id',
        'ente',
        'matr',
        'q3tipo',
        'q3dal',
        'q3al',
        'q3desc',
        'q3des2', 'q3des3', 'q3cont', 'q3pro', 'q3fun', 'q3man', 'q3dis', 'q3voc1', 'q3anz1', 'q3imp1', 'q3eur1',
        'q3voc2', 'q3anz2', 'q3imp2', 'q3eur2', 'q3voc3', 'q3anz3', 'q3imp3', 'q3eur3', 'q3voc4', 'q3anz4', 'q3imp4',
        'q3eur4', 'q3voc5', 'q3anz5', 'q3imp5', 'q3eur5',
        'q3tip', 'q3dat', 'q3num', 'q3ann', 'q32kd', 'q32ka', 'q32ka1', 'q32ka2', 'q32ka3', 'q32ka4',
        'q32ka5', 'q32k', 'q3001', 'q3002', 'q3003', 'q3004', 'q3005',
    ];

    protected $connection = 'generale';

    // this will use the specified database connection
    protected $table = 'qua03f';

    public $timestamps = false;

    // -------------------------------------------------------------------------
    public static string $from_field = 'q32kd';

    public static string $to_field = 'q32ka';

    public static string $ann_field = 'q3ann';

    // -------------------------------------------------------------------------
    public function Tqu00f(): HasOne
    {
        return $this->hasOne(Tqu00f::class, 'propro', 'q3pro')
            ->where('posfun', $this->q3fun);
        // ->where('codqua',$this->codqua)
        // ->where('cont',$this->cont)
        // ->where('tipco',$this->tipco)
        // ->where('ruolo',$this->ruolo)
    }

    // /------------------------------------------
    public function giorni(?array $params = null): int
    {
        if ($params === null) {
            $params = getRouteParameters();
        }

        $carbon = new Carbon($this->attributes['q32kd']);
        $al = $this->attributes['q32ka'] === 0 ? new Carbon($params['anno'].'1231') : new Carbon($this->attributes['q32ka']);
        // $st2kdi=new Carbon('19870202');

        return $al->diffInDays($carbon, true) + 1;
    }

    // ---------------------------------------------------------
    public function gg(?array $params = null): int
    {
        if ($params === null) {
            $params = getRouteParameters();
        }

        extract($params);

        // if (! isset($date_min)) { // non e' obbligatorio
        //    throw new \Exception('!isset($date_min)');
        // }

        // if (! isset($date_max)) {

        //    throw new Exception('!isset($date_max)');
        // }

        if (isset($propro) && $propro !== $this->attributes['q3pro']) {
            return 0;
        }

        if (isset($categoria_eco) && $categoria_eco !== $this->categoria_eco) {
            return 0;
        }

        if (isset($posfun) && $posfun !== $this->attributes['q3fun']) {
            return 0;
        }

        $is_propro_sup = false;
        if (isset($lista_propro_sup)) {
            $array_propro_sup = explode(',', (string) $lista_propro_sup);
            if (\in_array($this->attributes['q3pro'], $array_propro_sup, false)) {
                $is_propro_sup = true;
            }
        }

        if (isset($lista_propro)) {
            $array_propro = explode(',', (string) $lista_propro);
            if (! \in_array($this->attributes['q3pro'], $array_propro, false) && ! $is_propro_sup) {
                return 0;
            }

            if (! $is_propro_sup && (isset($posfun) && substr((string) $posfun, -1) !== substr((string) $this->attributes['q3fun'], -1))) {
                return 0;
            }
        }

        /*
        if (stristr($this->attributes['q3desc'], 'ricongi')) {
            return 0;
        }
        if (stristr($this->attributes['q3desc'], 'riscat')) {
            return 0;
        }
        */

        if (! \in_array($this->attributes['q3tipo'], ['101', '102', '103', '104', '105', '121'], false)) {
            return 0;
        }

        if (isset($date_min) && $this->attributes['q32kd'] < $date_min) {
            $date_from = Carbon::createFromFormat('Ymd H:i', $date_min.' 00:00');
        } else {
            $date_from = Carbon::createFromFormat('Ymd H:i', $this->attributes['q32kd'].' 00:00');
        }
        $date_to = Carbon::createFromFormat('Ymd H:i', $this->attributes['q32ka'].' 00:00');

        /*
        if (0 === $this->attributes['q32ka'] || $this->attributes['q32ka'] > $date_max) {
            $date_to = new Carbon($date_max);
        } else {
            $date_to = new Carbon($this->attributes['q32ka']);
        }
        */
        if ($this->attributes['q32ka'] === 0) {
            dddx($this);
        }

        // echo '<br/>'.$date_from.'   '.$date_to;
        if ($date_from > $date_to) {
            return 0;
        }

        // $st2kdi=new Carbon('19870202');
        return $date_to->diffInDays($date_from, true) + 1;
    }

    // ----------------------------------------------------------
    public function getCategoriaEcoAttribute(?string $value): ?string
    {
        $row = CategoriaPropro::whereRaw('find_in_set('.$this->q3pro.',lista_propro)')->first();
        if ($row === null) {
            echo '<h3> Aggiungi ['.$this->q3pro.'] a CategoriaPropro </h3>';

            // die('['.__LINE__.']['.__FILE__.']');
            return null;
        }

        return $row->categoria;
    }

    /*
    public function getGgAttribute(?int $value): ?int {
        return 666;
    }
    */
}
