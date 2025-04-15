<?php

declare(strict_types=1);

namespace Modules\Sigma\Models;

use Carbon\Carbon;
use Exception;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

// ----------traits ---
/**
 * Modules\Sigma\Models\Sto00f.
 *
 * @property int $id
 * @property int $ente
 * @property int $matr
 * @property int $stass
 * @property int $stdim
 * @property int $stupd
 * @property int $tipass
 * @property int $tipdim
 * @property string $stann
 * @property int $stotia
 * @property int $stotil
 * @property int $stodaa
 * @property int $stodal
 * @property string $stonua
 * @property string $stonul
 * @property int $st2kas
 * @property int $st2kdi
 * @property int $st2ku
 * @property int $sto2ka
 * @property int $sto2kd
 * @property int $matina
 * @property int $sto001
 * @property string $sto002
 * @property string $sto003
 * @property int $sto004
 * @property int $sto005
 * @property string|null $desctipass
 * @property string|null $desctipdim
 * @property string|null $tipoprovvass
 * @property string|null $tipoprovvdi
 * @property-read Collection<int, \Modules\Sigma\Models\Qua00f> $qua00f
 * @property-read int|null $qua00f_count
 * @property-read Collection<int, \Modules\Sigma\Models\Qua00k1> $qua00k1
 * @property-read int|null $qua00k1_count
 * @property-read Collection<int, \Modules\Sigma\Models\Rep00f> $rep00f
 * @property-read int|null $rep00f_count
 *
 * @method static Builder|Sto00f newModelQuery()
 * @method static Builder|Sto00f newQuery()
 * @method static Builder|Sto00f query()
 * @method static Builder|Sto00f whereDesctipass($value)
 * @method static Builder|Sto00f whereDesctipdim($value)
 * @method static Builder|Sto00f whereEnte($value)
 * @method static Builder|Sto00f whereId($value)
 * @method static Builder|Sto00f whereMatina($value)
 * @method static Builder|Sto00f whereMatr($value)
 * @method static Builder|Sto00f whereSt2kas($value)
 * @method static Builder|Sto00f whereSt2kdi($value)
 * @method static Builder|Sto00f whereSt2ku($value)
 * @method static Builder|Sto00f whereStann($value)
 * @method static Builder|Sto00f whereStass($value)
 * @method static Builder|Sto00f whereStdim($value)
 * @method static Builder|Sto00f whereSto001($value)
 * @method static Builder|Sto00f whereSto002($value)
 * @method static Builder|Sto00f whereSto003($value)
 * @method static Builder|Sto00f whereSto004($value)
 * @method static Builder|Sto00f whereSto005($value)
 * @method static Builder|Sto00f whereSto2ka($value)
 * @method static Builder|Sto00f whereSto2kd($value)
 * @method static Builder|Sto00f whereStodaa($value)
 * @method static Builder|Sto00f whereStodal($value)
 * @method static Builder|Sto00f whereStonua($value)
 * @method static Builder|Sto00f whereStonul($value)
 * @method static Builder|Sto00f whereStotia($value)
 * @method static Builder|Sto00f whereStotil($value)
 * @method static Builder|Sto00f whereStupd($value)
 * @method static Builder|Sto00f whereTipass($value)
 * @method static Builder|Sto00f whereTipdim($value)
 * @method static Builder|Sto00f whereTipoprovvass($value)
 * @method static Builder|Sto00f whereTipoprovvdi($value)
 *
 * @mixin \Eloquent
 */
class Sto00f extends Model
{
    protected $fillable = ['id', 'ente', 'matr', 'stass', 'stdim', 'stupd', 'tipass', 'tipdim', 'stann', 'stotia', 'stotil', 'stodaa', 'stodal', 'stonua', 'stonul', 'st2kas', 'st2kdi', 'st2ku', 'sto2ka', 'sto2kd', 'matina', 'sto001', 'sto002', 'sto003', 'sto004', 'sto005'];

    protected $connection = 'generale';

    // this will use the specified database connection
    protected $table = 'sto00f';

    public $timestamps = false;

    // /------------------------------------------
    public function giorni(?array $params = null): int
    {
        if ($params === null) {
            $params = getRouteParameters();
        }

        $st2kas = new Carbon($this->attributes['st2kas']);
        if ($this->attributes['st2kdi'] === 0) {
            $st2kdi = new Carbon($params['anno'].'1231');
        } else {
            $st2kdi = new Carbon($this->attributes['st2kdi']);
        }

        // $st2kdi=new Carbon('19870202');
        return $st2kdi->diffInDays($st2kas, true) + 1;
    }

    // ----------------------------------------------------------------
    public function gg(?array $params = null): int
    {
        if ($params === null) {
            $params = getRouteParameters();
        }

        extract($params);
        if (! isset($date_min)) {
            throw new Exception('!isset($date_min)');
        }

        if (! isset($date_max)) {
            throw new Exception('!isset($date_max)');
        }

        $st2kas = $this->attributes['st2kas'] < $date_min ? new Carbon($date_min) : new Carbon($this->attributes['st2kas']);
        if ($this->attributes['st2kdi'] === 0 || $this->attributes['st2kdi'] > $date_max) {
            $st2kdi = new Carbon($date_max);
        } else {
            $st2kdi = new Carbon($this->attributes['st2kdi']);
        }

        // $st2kdi=new Carbon('19870202');
        if ($st2kas > $st2kdi) {
            return 0;
        }

        return $st2kdi->diffInDays($st2kas, true) + 1;
    }

    // ----------------------------------------------------------
    public function qua00f(/* array $params */): HasMany
    {
        /*
        if (isset($params['between_anno'])) {
            $ris = $ris->whereRaw('(('.$params['between_anno'].' between year(qua2kd) and year(qua2ka)) or
                    ('.$params['between_anno'].' >= year(qua2kd) and qua2ka=0))');
        }
        */

        return $this->hasMany(Qua00f::class, 'matr', 'matr')->where('ente', $this->ente)->whereRaw('quaann=""');
    }

    public function qua00k1(/* array $params */): HasMany
    {
        /*
        if (isset($params['between_anno'])) {
            $ris = $ris->whereRaw('(('.$params['between_anno'].' between year(qua2kd) and year(qua2ka)) or
                    ('.$params['between_anno'].' >= year(qua2kd) and qua2ka=0))');
        }
        */
        return $this->hasMany(Qua00k1::class, 'matr', 'matr')->where('ente', $this->ente)->whereRaw('quaann=""');
    }

    public function rep00f(/* array $params */): HasMany
    {
        /*
        if (isset($params['between_anno'])) {
            $ris = $ris->whereRaw('(('.$params['between_anno'].' between year(rep2kd) and year(rep2ka)) or
                    ('.$params['between_anno'].' >= year(rep2kd) and rep2ka=0))');
        }
        */
        return $this->hasMany(Rep00f::class, 'matr', 'matr')->where('ente', $this->ente)->whereRaw('repann=""');
    }

    // ----------------------------------------------------------
}// end class sto00f
