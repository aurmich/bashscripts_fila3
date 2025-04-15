<?php

declare(strict_types=1);

namespace Modules\Sigma\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * Modules\Sigma\Models\Mov01k2.
 *
 * @property int $id
 * @property int $ente
 * @property int $matr
 * @property int $mo1tip
 * @property int $mo1cod
 * @property int $mo1aa
 * @property int $mo1mm
 * @property int $mo1gg
 * @property int $mo1qta
 * @property string $mo1tmo
 * @property string $mo1all
 * @property string $mo1qtv
 * @property string $mo1um
 * @property string $mo1oi
 * @property string $mo1of
 * @property string $mo1ann
 * @property int $mov2kn
 * @property int $mov2kz
 * @property int $mov001
 * @property string $mov002
 * @property string $mov003
 * @property int $mov004
 * @property int $mov005
 * @property-read \Modules\Sigma\Models\Codici|null $codici
 *
 * @method static Builder|Mov01k2 newModelQuery()
 * @method static Builder|Mov01k2 newQuery()
 * @method static Builder|Mov01k2 query()
 * @method static Builder|Mov01k2 whereEnte($value)
 * @method static Builder|Mov01k2 whereId($value)
 * @method static Builder|Mov01k2 whereMatr($value)
 * @method static Builder|Mov01k2 whereMo1aa($value)
 * @method static Builder|Mov01k2 whereMo1all($value)
 * @method static Builder|Mov01k2 whereMo1ann($value)
 * @method static Builder|Mov01k2 whereMo1cod($value)
 * @method static Builder|Mov01k2 whereMo1gg($value)
 * @method static Builder|Mov01k2 whereMo1mm($value)
 * @method static Builder|Mov01k2 whereMo1of($value)
 * @method static Builder|Mov01k2 whereMo1oi($value)
 * @method static Builder|Mov01k2 whereMo1qta($value)
 * @method static Builder|Mov01k2 whereMo1qtv($value)
 * @method static Builder|Mov01k2 whereMo1tip($value)
 * @method static Builder|Mov01k2 whereMo1tmo($value)
 * @method static Builder|Mov01k2 whereMo1um($value)
 * @method static Builder|Mov01k2 whereMov001($value)
 * @method static Builder|Mov01k2 whereMov002($value)
 * @method static Builder|Mov01k2 whereMov003($value)
 * @method static Builder|Mov01k2 whereMov004($value)
 * @method static Builder|Mov01k2 whereMov005($value)
 * @method static Builder|Mov01k2 whereMov2kn($value)
 * @method static Builder|Mov01k2 whereMov2kz($value)
 *
 * @mixin \Eloquent
 */
class Mov01k2 extends Model
{
    protected $fillable = ['id', 'ente', 'matr', 'mo1tip', 'mo1cod', 'mo1aa', 'mo1mm', 'mo1gg', 'mo1qta', 'mo1tmo', 'mo1all', 'mo1qtv', 'mo1um', 'mo1oi', 'mo1of', 'mo1ann', 'mov2kn', 'mov2kz', 'mov001', 'mov002', 'mov003', 'mov004', 'mov005'];

    protected $connection = 'generale';

    // this will use the specified database connection
    protected $table = 'mov01k2';

    public $timestamps = false;

    // ------------- RELATIONSHIPS ------------------
    public function codici()
    {
        return $this->hasOne(Codici::class, 'tipo', 'mo1tip')->where('codice', $this->mo1cod);
    }

    // ------------ MUTATORS -----------------

    // ------------- FUNCTIONS ------------------
    public static function filter1(array $params)
    {
        extract($params);
        // esiste solo competenza
        // if(!isset($tipo)) $tipo=1; //1 competenza, 2 azione
        // if($tipo==1){
        // }
        $row = new self;
        if (isset($giorno)) {
            $row = $row->where('mo1gg', $giorno);
        }

        if (isset($mese)) {
            $row = $row->where('mo1mm', $mese);
        }

        if (isset($anno)) {
            $row = $row->where('mov2kn', $anno);
        }

        if (isset($giust_tipo)) {
            $row = $row->where('mo1tip', $giust_tipo);
        }

        if (isset($giust_cod)) {
            $row = $row->where('mo1cod', $giust_cod);
        }

        return $row->whereRaw('mo1ann=""');
    }

    // end search
    // --------------------------------
}
