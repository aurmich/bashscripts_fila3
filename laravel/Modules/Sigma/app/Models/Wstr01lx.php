<?php

declare(strict_types=1);

namespace Modules\Sigma\Models;

use Carbon\Carbon;
use Exception;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

// ----------traits ---
/**
 * Modules\Sigma\Models\Wstr01lx.
 *
 * @property int $id
 * @property int $enteap
 * @property string $wtannu
 * @property int $wtsens
 * @property int $wtindi
 * @property int $wtbadg
 * @property int $wtdata
 * @property int $wtteor
 * @property int $wtorat
 * @property int $wxorat
 * @property int $wyorat
 * @property string $t1codi
 * @property string $orcodi
 * @property int $wtmatr
 * @property int $wtcaus
 * @property string $wtflg1
 * @property string $wtflg2
 * @property int $wtcomp
 * @property string $wtcom1
 * @property int $wtcom2
 * @property string $ixterm
 * @property-read \Modules\Sigma\Models\Anag|null $anag
 *
 * @method static Builder|Wstr01lx newModelQuery()
 * @method static Builder|Wstr01lx newQuery()
 * @method static Builder|Wstr01lx query()
 * @method static Builder|Wstr01lx whereEnteap($value)
 * @method static Builder|Wstr01lx whereId($value)
 * @method static Builder|Wstr01lx whereIxterm($value)
 * @method static Builder|Wstr01lx whereOrcodi($value)
 * @method static Builder|Wstr01lx whereT1codi($value)
 * @method static Builder|Wstr01lx whereWtannu($value)
 * @method static Builder|Wstr01lx whereWtbadg($value)
 * @method static Builder|Wstr01lx whereWtcaus($value)
 * @method static Builder|Wstr01lx whereWtcom1($value)
 * @method static Builder|Wstr01lx whereWtcom2($value)
 * @method static Builder|Wstr01lx whereWtcomp($value)
 * @method static Builder|Wstr01lx whereWtdata($value)
 * @method static Builder|Wstr01lx whereWtflg1($value)
 * @method static Builder|Wstr01lx whereWtflg2($value)
 * @method static Builder|Wstr01lx whereWtindi($value)
 * @method static Builder|Wstr01lx whereWtmatr($value)
 * @method static Builder|Wstr01lx whereWtorat($value)
 * @method static Builder|Wstr01lx whereWtsens($value)
 * @method static Builder|Wstr01lx whereWtteor($value)
 * @method static Builder|Wstr01lx whereWxorat($value)
 * @method static Builder|Wstr01lx whereWyorat($value)
 *
 * @mixin \Eloquent
 */
class Wstr01lx extends Model
{
    protected $fillable = ['id', 'enteap', 'wtannu', 'wtsens', 'wtindi', 'wtbadg', 'wtdata', 'wtteor', 'wtorat', 'wxorat', 'wyorat', 't1codi', 'orcodi', 'wtmatr', 'wtcaus', 'wtflg1', 'wtflg2', 'wtcomp', 'wtcom1', 'wtcom2', 'ixterm'];

    protected $connection = 'generale'; // this will use the specified database connection

    // protected $table = 'wstr01lx';
    protected $table = 'wstr01f'; // da webservice non ci danno questa tabella

    // protected static $single_date=true;
    public $timestamps = false;

    // protected $dates=['wtdata'];

    // ------------------------------------

    public function anag(): HasOne
    {
        return $this->hasOne(Anag::class, 'matr', 'wtmatr')->where('ente', $this->enteap);
    }

    // ----------mutators----------
    /*
    public function getWtdataAttribute($value){
        if(!is_object($value)){
            $value=Carbon::parse($value);
        }
        return $value;
    }
    public function getWtoratAttribute($value){
        //$pos=strpos($value,':');
        //if($pos===false){
         if(!is_object($value)){
            $value=''.substr($value,0,-2).':'.substr($value,-2);
            if(strlen($value)<4){
                //dd($this);
                $value='0'.$value;
            }
            try{
                $value=Carbon::parse($this->attributes['wtdata'].' '.$value);
            }catch(ErrorException $e){
                dd($e);
            }
        }
        return $value;
    }
    public function getDurataAttribute($value){
        return 44;
    }
    //*/

    /*
public static function filter($params){
    $rows=new self;
    $schema=$rows->getConnection()->getSchemaBuilder();
    $tbl=$rows->getTable();
    $fields=collect($schema->getColumnListing($tbl));
    $lang=trans('sigma::'.$tbl);
    $lang=array_flip($lang);
    //echo '<pre>';print_r($lang);echo '</pre>';
    $parz=collect(array_keys($params));
    $parz=$parz->map(function($item,$key) use ($lang){
        if(isset($lang[$item])){
            return $lang[$item];
        }
        return $item;
    });
    $intersect=$fields->intersect($parz);

    foreach($intersect->all() as $el){
        $key=trans('sigma::'.$tbl.'.'.$el);
        $value=$params[$key];
        //echo '<br/>'.$el.'   '.$key.'   '.$value;
        $rows=$rows->where($el,$value);
    }
    if(isset($lang['ann'])){
        $rows=$rows->whereRaw($lang['ann'].'=""');
    }

    //echo '<pre>';print_r($params);echo '</pre>';
    if(isset($params['date_between'])){
        extract($params['date_between']);
        $from_time=strtotime($from);
        $to_time=strtotime($to);
        $rows=$rows->whereRaw(
            'wtdata between '.date('Ymd',$from_time).' and '.date('Ymd',$to_time)
        );
    }
    //echo '<pre>'.$rows->toSql().'</pre>';
    return $rows;
}//end filter
*/
    // *
    public function durata(array $params = []): float
    {
        extract($params);
        if (! isset($timbr)) {
            throw new Exception('!isset($timbr)');
        }

        $sens1 = $timbr->where('wtsens', 1)->pluck('wtorat');
        $sens2 = $timbr->where('wtsens', 2)->pluck('wtorat');
        $durata = 0;
        if ($sens1->count() !== $sens2->count()) {
            return $durata;
        }

        $n = $sens1->count();
        for ($i = 0; $i < $n; $i++) {
            // if(isset($sens2[$i]) && isset($sens1[$i]) ){
            $durata += $sens2[$i]->diffInMinutes($sens1[$i]);
            // }else{
            //    dd($timbr);
            // }
        }

        return $durata;
    }

    // */
    // ------------------------------------
}// end class
