<?php

declare(strict_types=1);

namespace Modules\Sigma\Models;

use Carbon\Carbon;
use Exception;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Modules\Progressioni\Models\CategoriaPropro;
use Modules\Sigma\Models\Traits\Extras\FunctionExtra;
use Modules\Sigma\Models\Traits\Scopes\CommonScope;
use Modules\Sigma\Models\Traits\SigmaModelTrait;
use stdClass;

/**
 * Modules\Sigma\Models\Qua00f.
 *
 * @property int $id
 * @property int $ente
 * @property int $cont
 * @property int $matr
 * @property int $tipco
 * @property int $rapp
 * @property int $ruolo
 * @property int $propro
 * @property int $posfun
 * @property int $codqua
 * @property int $qudal
 * @property int $qual
 * @property int $quanz
 * @property int $posiz
 * @property int $sipco
 * @property int $sapp
 * @property int $suolo
 * @property int $sropro
 * @property int $sosfun
 * @property int $sodqua
 * @property int $annise
 * @property int $prvtip
 * @property int $prvdat
 * @property string $prvnum
 * @property int $datpas
 * @property string $serviz
 * @property int $disci1
 * @property int $disci2
 * @property string $oree
 * @property string $oret
 * @property int $aapens
 * @property string $quaann
 * @property int $qua2kd
 * @property int $qua2ka
 * @property int $qua2kz
 * @property int $prv2kd
 * @property int $dat2kp
 * @property int $qua001
 * @property string $qua002
 * @property string $qua003
 * @property int $qua004
 * @property int $qua005
 * @property-read \Modules\Sigma\Models\Ana10f|null $ana10f
 * @property-read Collection<int, \Modules\Sigma\Models\Dipt00f> $dipt00f
 * @property-read int|null $dipt00f_count
 * @property-read mixed $categoria_eco
 * @property-read string|null $cognome
 * @property-read string|null $email
 * @property-read string $from_field
 * @property-read string|null $nome
 * @property-read string|null $posizione_eco
 * @property-read string $to_field
 * @property-read mixed $turno
 * @property-read \Modules\Sigma\Models\Tqu00f|null $tqu00f
 *
 * @method static Builder|Qua00f newModelQuery()
 * @method static Builder|Qua00f newQuery()
 * @method static Builder|Qua00f ofDate(int $date)
 * @method static Builder|Qua00f ofEnteYear(int $ente, int $year)
 * @method static Builder|Qua00f ofPosiz(?mixed $posiz)
 * @method static Builder|Qua00f ofQuarter(int $quarter, int $year)
 * @method static Builder|Qua00f ofRangeDate(int $date_start, int $date_end)
 * @method static Builder|Qua00f ofYear(int $year)
 * @method static Builder|Qua00f query()
 * @method static Builder|Qua00f whereAapens($value)
 * @method static Builder|Qua00f whereAnnise($value)
 * @method static Builder|Qua00f whereCodqua($value)
 * @method static Builder|Qua00f whereCont($value)
 * @method static Builder|Qua00f whereDat2kp($value)
 * @method static Builder|Qua00f whereDatpas($value)
 * @method static Builder|Qua00f whereDisci1($value)
 * @method static Builder|Qua00f whereDisci2($value)
 * @method static Builder|Qua00f whereEnte($value)
 * @method static Builder|Qua00f whereId($value)
 * @method static Builder|Qua00f whereMatr($value)
 * @method static Builder|Qua00f whereOree($value)
 * @method static Builder|Qua00f whereOret($value)
 * @method static Builder|Qua00f wherePosfun($value)
 * @method static Builder|Qua00f wherePosiz($value)
 * @method static Builder|Qua00f wherePropro($value)
 * @method static Builder|Qua00f wherePrv2kd($value)
 * @method static Builder|Qua00f wherePrvdat($value)
 * @method static Builder|Qua00f wherePrvnum($value)
 * @method static Builder|Qua00f wherePrvtip($value)
 * @method static Builder|Qua00f whereQua001($value)
 * @method static Builder|Qua00f whereQua002($value)
 * @method static Builder|Qua00f whereQua003($value)
 * @method static Builder|Qua00f whereQua004($value)
 * @method static Builder|Qua00f whereQua005($value)
 * @method static Builder|Qua00f whereQua2ka($value)
 * @method static Builder|Qua00f whereQua2kd($value)
 * @method static Builder|Qua00f whereQua2kz($value)
 * @method static Builder|Qua00f whereQuaann($value)
 * @method static Builder|Qua00f whereQual($value)
 * @method static Builder|Qua00f whereQuanz($value)
 * @method static Builder|Qua00f whereQudal($value)
 * @method static Builder|Qua00f whereRapp($value)
 * @method static Builder|Qua00f whereRuolo($value)
 * @method static Builder|Qua00f whereSapp($value)
 * @method static Builder|Qua00f whereServiz($value)
 * @method static Builder|Qua00f whereSipco($value)
 * @method static Builder|Qua00f whereSodqua($value)
 * @method static Builder|Qua00f whereSosfun($value)
 * @method static Builder|Qua00f whereSropro($value)
 * @method static Builder|Qua00f whereSuolo($value)
 * @method static Builder|Qua00f whereTipco($value)
 * @method static Builder|Qua00f withDays(int $date_min, int $date_max)
 * @method static Builder|Qua00f withPercPtime()
 * @method static Builder|Qua00f ofEnte(int $ente)
 *
 * @mixin \Eloquent
 */
class Qua00f extends Model
{
    use CommonScope;
    // -----------------------------------------------
    // use SigmaModelTrait;
    use FunctionExtra;

    protected $fillable = ['id', 'ente', 'cont', 'matr', 'tipco', 'rapp', 'ruolo', 'propro', 'posfun', 'codqua', 'qudal', 'qual', 'quanz', 'posiz', 'sipco', 'sapp', 'suolo', 'sropro', 'sosfun', 'sodqua', 'annise', 'prvtip', 'prvdat', 'prvnum', 'datpas', 'serviz', 'disci1', 'disci2', 'oree', 'oret', 'aapens', 'quaann', 'qua2kd', 'qua2ka', 'qua2kz', 'prv2kd', 'dat2kp', 'qua001', 'qua002', 'qua003', 'qua004', 'qua005'];

    protected $connection = 'generale';

    // this will use the specified database connection
    protected $table = 'qua00f';

    public $timestamps = false;

    // -----------------------------------------------
    public static string $from_field = 'qua2kd';

    public static string $to_field = 'qua2ka';

    public static string $ann_field = 'quaann';

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    public function casts(): array
    {
        return [

            'qua2kd' => 'integer',
            'qua2ka' => 'integer',

        ];
    }

    /*
    DIPT00F
    where (dtannu="" or dtannu is null)
    and DIPT00F.enteap=tipiorari_tmp.ente
    and DIPT00F.dtmatr=tipiorari_tmp.matr
     */
    public function dipt00f(): HasMany
    {
        /*
        $sql = '('.chr(13).'('.$this->qua2kd->format('Ymd').' between dtdal and dtal ) or ('.$this->qua2kd->format('Ymd').' >= dtdal and dtal=0)';
        if (0 == $this->qua2ka) {
            $sql .= ' or (dtdal >= '.$this->qua2kd->format('Ymd').')';
        } else {
            $sql .= ' or (dtdal between '.$this->qua2kd->format('Ymd').' and '.$this->qua2ka->format('Ymd').')';
        }
        $sql .= chr(13).')';
        */
        $sql = '('.\chr(13).'('.$this->qua2kd.' between dtdal and dtal ) or ('.$this->qua2kd.' >= dtdal and dtal=0)';
        if ($this->qua2ka === 0) {
            $sql .= ' or (dtdal >= '.$this->qua2kd.')';
        } else {
            $sql .= ' or (dtdal between '.$this->qua2kd.' and '.$this->qua2ka.')';
        }

        $sql .= \chr(13).')';

        // dd($sql);
        return $this->hasMany(Dipt00f::class, 'dtmatr', 'matr')
            ->where('enteap', $this->ente)
            ->whereRaw('dtannu=""')
            ->whereRaw($sql);
    }

    public function tqu00f(): HasOne
    {
        return $this->hasOne(Tqu00f::class, 'propro', 'propro')
            ->where('posfun', $this->posfun)
            ->where('codqua', $this->codqua)
            ->where('cont', $this->cont)
            ->where('tipco', $this->tipco)
            ->where('ruolo', $this->ruolo)
            ->whereRaw('tqann=""');
    }

    public function ana10f(): HasOne
    {
        return $this->hasOne(Ana10f::class, 'matr', 'matr')
            ->where('ente', $this->ente);
    }

    /*
    public function ana02f(): HasMany {
        return $this->hasMany(Ana02f::class, 'matr', 'matr')
            ->where('ente', $this->ente)
        ;
    }
    */

    public function rep00f(): HasMany
    {
        return $this->hasMany(Rep00f::class, 'matr', 'matr')
            ->where('ente', $this->ente)
            ->whereRaw('repann=""')
            ->ofRangeDate($this->qua2kd, $this->qua2ka);
    }

    public function categoriaProproProgressione(): void
    {
        dddx('aa');
    }

    // ------ SCOPES --------
    public function scopeOfYear(Builder $query, int $year): Builder
    {
        $sql = '(
            ('.$year.' between year(qua2kd) and year(qua2ka) ) or
            ('.$year.' >= year(qua2kd) and qua2ka=0 )
        )';

        return $query->whereRaw($sql);
    }

    public function scopeOfEnteYear(Builder $query, int $ente, int $year): Builder
    {
        return $query->where('ente', $ente)->whereRaw('quaann=""')->ofYear($year);
    }

    public function scopeWithDays(Builder $query, int $date_min, int $date_max): Builder
    {
        $days = 'greatest(datediff(if(qua2ka=0 or qua2ka>'.$date_max.','.$date_max.',qua2ka),if(qua2kd<'.$date_min.','.$date_min.',qua2kd))+1,0) ';

        // return $query->selectRaw("{$days} AS days");
        return $query->selectRaw(sprintf('*,%s AS days', $days));
    }

    public function scopeWithPercPtime(Builder $query): Builder
    {
        $perc = 'if(oree=0,36,oree)/if(oret=0,36,oret)';

        return $query->selectRaw($perc.' AS perc_ptime');
    }

    /*
        public function scopeOfCategoriaEcoProgressione($query,$categoria,$anno){
        $query->whereHas('categoria_eco_progressione',function (){

        })
        }
    */
    /**
     * Undocumented function.
     */
    public function scopeOfPosiz(Builder $query, mixed $posiz): Builder
    {
        if (! \is_array($posiz)) {
            $posiz = explode(',', (string) $posiz);
        }

        return $query->whereIn('posiz', $posiz);
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

    // ------------------------------------------------------------

    public function gg(?array $params = null): float
    {
        // dddx($params);
        if ($params === null) {
            $params = getRouteParameters();
        }

        extract($params);

        // if (! isset($date_min)) { // non e' obbligatorio
        //    throw new \Exception('!isset($date_min)');
        // }
        /*dddx(
            [
                'class' => get_class($this),
                'qua2ka' => $this->attributes['qua2ka'],
            ]
        );*/
        $this->attributes['qua2kd'] = (int) $this->attributes['qua2kd'];
        $this->attributes['qua2ka'] = (int) $this->attributes['qua2ka'];

        if (! isset($date_max)) {
            throw new Exception('!isset($date_max) ['.__LINE__.']['.class_basename(self::class).']');
        }

        if ($date_max instanceof Carbon) {
            $date_max = $date_max->format('Ymd') * 1;
        }

        if (isset($propro) && $propro !== $this->attributes['propro']) {
            return 0;
        }

        if (isset($categoria_eco) && $categoria_eco > $this->categoria_eco) {
            // caso mattara che era d poi tornata c
            return 0;
        }

        // dddx($lista_propro_sup);//"718,707"
        $is_propro_sup = false;
        if (isset($lista_propro_sup)) {
            $array_propro_sup = explode(',', (string) $lista_propro_sup);
            if (\in_array($this->attributes['propro'], $array_propro_sup, false)) {
                $is_propro_sup = true;
            }
        }

        if (isset($lista_propro)) {
            $array_propro = explode(',', (string) $lista_propro);
            if (! \in_array($this->attributes['propro'], $array_propro, false) && ! $is_propro_sup) {
                return 0;
            }

            if (! $is_propro_sup && (isset($posfun) && substr((string) $posfun, -1) !== substr((string) $this->attributes['posfun'], -1))) {
                return 0;
            }
        }

        // caso bollini che era d poi tornata c
        // echo '<hr/>['.$categoria_eco.']['.$this->categoria_eco.']';
        if (isset($categoria_eco) && $categoria_eco >= $this->categoria_eco && (isset($posfun) && substr((string) $posfun, -1) !== substr((string) $this->attributes['posfun'], -1))) {
            return 0;
        }

        if (isset($date_min) && $this->attributes['qua2kd'] < $date_min) {
            // $date_from = new Carbon($date_min.'');
            $date_from = Carbon::createFromFormat('Ymd H:i', $date_min.' 00:00');
        } else {
            // $date_from = new Carbon($this->attributes['qua2kd'].'');
            $date_from = Carbon::createFromFormat('Ymd H:i', $this->attributes['qua2kd'].' 00:00');
        }

        if ($this->attributes['qua2ka'] === 0 || $this->attributes['qua2ka'] > $date_max) {
            $date_to = \is_object($date_max) ? $date_max : Carbon::createFromFormat('Ymd H:i', $date_max.' 00:00');
            // $date_to = new Carbon($date_max.'');
            //
        } else {
            // $date_to = new Carbon($this->attributes['qua2ka']);
            try {
                $date_to = Carbon::createFromFormat('Ymd H:i', $this->attributes['qua2ka'].' 00:00');
            } catch (Exception $e) {
                dddx([
                    'message' => $e->getMessage(),
                    'qua2ka' => $this->attributes['qua2ka'],
                ]);
            }
        }

        // $st2kdi=new Carbon('19870202');
        if ($date_from > $date_to) {
            return 0;
        }
        $res = $date_to->diffInDays($date_from, true) + 1;

        // dddx(['params'=>$params,'date_from'=>$date_from,'date_to'=>$date_to,'res'=>$res]);
        return $res;
    }

    // ----------------------------------------------------------

    // /-----------------------------------------------------------
    public function giorni(?array $params = null): int|float
    {
        if ($params === null) {
            $params = getRouteParameters();
        }

        $carbon = new Carbon($this->attributes['qua2kd']);
        $al = $this->attributes['qua2ka'] === 0 ? new Carbon($params['anno'].'1231') : new Carbon($this->attributes['qua2ka']);
        // $st2kdi=new Carbon('19870202');

        return $al->diffInDays($carbon, true) + 1;
    }

    public function giorni_propro(?array $params = null): int|float
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
            $params['propro'] = static::last_qua00f()->propro;
            // $params['propro']=$obj->propro;
        }

        if ($this->propro === $params['propro']) {
            return $this->giorni($params);
        }

        return 0;
    }

    public function giorni_propro_posfun(?array $params = null): int|float
    {
        if ($params === null) {
            $params = getRouteParameters();
        }

        if (! isset($params['propro'])) {
            $params['propro'] = static::last_qua00f()->propro;
        }

        if (! isset($params['posfun'])) {
            $params['posfun'] = static::last_qua00f()->posfun;
        }

        if ($this->propro !== $params['propro']) {
            return 0;
        }
        if ($this->posfun !== $params['posfun']) {
            return 0;
        }

        return $this->giorni($params);
    }

    // -------------- MUTATORS ---------------
    /*
    public function getQua2kdAttribute($value){

    if(!is_object($value)){
    $value=Carbon::parse($value);
    }
    return $value;
    }

    public function getQua2kaAttribute($value){
    if($value==0) return $value;
    if(!is_object($value)){
    $value=Carbon::parse($value);
    }
    return $value;
    }
     */

    public function getFromFieldAttribute(?string $value): string
    {
        return 'qua2kd';
    }

    public function getToFieldAttribute(?string $value): string
    {
        return 'qua2ka';
    }

    public function getCognomeAttribute(?string $value): ?string
    {
        if (! $this->ana10f instanceof Ana10f) {
            return '---';
        }

        return $this->ana10f->conome;
    }

    public function getNomeAttribute(?string $value): ?string
    {
        if (! $this->ana10f instanceof Ana10f) {
            // dddx($this); //4debug
            return '---';
        }

        return $this->ana10f->nome;
    }

    public function getEmailAttribute(?string $value): ?string
    {
        if ($this->ana02f === null) {
            // dddx($this); //4debug
            return '---';
        }

        return $this->ana02f->where('emaind', '!=', '')->last()->emaind;
    }

    public function getTurnoAttribute($value)
    {
        if (! $this->dipt00f instanceof Collection) {
            return 'Aggiornare tabella dipt00f';
        }

        dd($this->dipt00f);

        return $this->dipt00f->dtturn;
    }

    /**
     * { item_description }.
     */
    public function getCategoriaEcoAttribute(mixed $value)
    {
        // *
        $row = CategoriaPropro::whereRaw('find_in_set('.$this->propro.',lista_propro)')->first();
        if ($row === null) {
            echo '<h3>Aggiungi propro['.$this->propro.'] a CategoriaPropro</h3>';
            exit('['.__LINE__.']['.__FILE__.']');
        }

        return $row->categoria;
        // */
        /*
    $pos_eco=trim($this->posizione_eco);
    $cat_eco=substr($pos_eco,0,1);
    if(!in_array($cat_eco,['A','B','C','D'])){
    switch($this->propro){
    case 700: return 'PREC';
    case 703: return 'A';
    case 704: return 'B';
    case 705: return 'B3';

    }
    dddx($this->propro.' '.$pos_eco);
    }
    return $cat_eco;
     */
    }

    public function getPosizioneEcoAttribute(?string $value): ?string
    {
        $txt = $this->tqu00f->desc1;

        return str_replace('Posizione economica ', '', $txt);
    }

    public static function posizioniEconomicheOfYearCollection(array $params)
    {
        extract($params);
        if (! isset($anno)) {
            throw new Exception('anno is not defined ['.__LINE__.']['.class_basename(self::class).']');
        }

        if (! isset($ente)) {
            throw new Exception('ente is not defined ['.__LINE__.']['.class_basename(self::class).']');
        }

        $qua00f = self::ofYear($anno)
            ->whereRaw('quaann=""')
            ->where('ente', $ente)
            ->get();
        $group_by = ['ente', 'matr', 'propro', 'posfun', 'posiz', 'disci1'];

        $qua00f_coll = collect($qua00f->toArray())->map(static function (array $item) use ($anno, $group_by): array {
            $tmp = new stdClass;
            foreach ($group_by as $v) {
                $tmp->$v = $item[$v];
            }

            /*
                        $tmp->ente      =$item['ente'];
                        $tmp->matr      =$item['matr'];
                        $tmp->propro     =$item['propro'];
                        $tmp->posfun      =$item['posfun'];
                        $tmp->posiz      =$item['posiz'];
            */
            $tmp->qua2kd = $item['qua2kd'];
            $tmp->qua2ka = $item['qua2ka'];
            // $tmp->posiz=$item['posiz']; //per tempo determinato o inde.. etc mi interessa collassare le righe
            // $tmp->disci1=$item['disci1']; //regionali etc
            $tmp->anno = $anno;

            return get_object_vars($tmp);
        });
        $qua00f_coll = $qua00f_coll->groupBy(static function (array $item) use ($group_by): string {
            /* .'-'.$item['posiz'] */
            // return $item['ente'].'-'.$item['matr'].'-'.$item['propro'].'-'.$item['posfun'].'-'.$item['disci1'];
            // *
            $tmp = [];
            foreach ($group_by as $v) {
                $tmp[] = $item[$v];
            }

            return implode('-', $tmp);
            // */
        });

        return $qua00f_coll->map(static function (array $item) use ($group_by) {
            $ris = [];
            /*
                        $ris['ente']=$item[0]['ente'];
                        $ris['matr']=$item[0]['matr'];
                        $ris['propro']=$item[0]['propro'];
                        $ris['posfun']=$item[0]['posfun'];
                        $ris['disci1']=$item[0]['disci1'];
            */
            foreach ($group_by as $v) {
                $ris[$v] = $item[0][$v];
            }
            // --- da aggiungere il controllo se non ci sono "buchi" in mezzo
            $ris['qua2kd'] = collect($item)->sortBy('qua2kd')->first()['qua2kd'];
            $ris['qua2ka'] = collect($item)->sortByDesc('qua2kd')->first()['qua2ka'];
            // $ris['posiz']=$item[0]['posiz']; // mi interessa collassare le righe
            $ris['anno'] = $item[0]['anno'];

            return $ris;
        });
    }

    /*
     * https://dev.to/bertheyman/the-magic-of-query-scopes-in-laravel-pfp
     *
     *
    protected static function boot()
    {
    parent::boot();

    // A global scope is applied to all queries on this model
    // -> No need to specify visibility restraints on every query
    static::addGlobalScope('visible', function (Builder $query) {
    $query->where('visible', 1);
    });
    // Bonus: if multiple models are hideable, this behaviour might
    // belong in a specific scope for easy reuse
    }

     */
}
