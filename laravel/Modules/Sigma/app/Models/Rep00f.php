<?php

declare(strict_types=1);

namespace Modules\Sigma\Models;

use Carbon\Carbon;
use Exception;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
// ----------traits ---
use Illuminate\Support\Collection;
use Modules\Sigma\Models\Traits\Mutators\EnteMatrMutator;
use Modules\Sigma\Models\Traits\Relationships\EnteMatrRelationship;
use Modules\Sigma\Models\Traits\Scopes\CommonScope;
use Modules\Sigma\Models\Traits\SigmaModelTrait;
use stdClass;

/**
 * Modules\Sigma\Models\Rep00f
 *
 * @property int $id
 * @property int $ente
 * @property int $matr
 * @property int $repdal
 * @property int $repal
 * @property int $repst1
 * @property int $repre1
 * @property int $repst2
 * @property int $repre2
 * @property int $repcla
 * @property int $repmar
 * @property string $grppag
 * @property int $numpag
 * @property int $repc1a
 * @property int $repc1b
 * @property int $repc1c
 * @property int $repc2a
 * @property int $repc2b
 * @property int $repc2c
 * @property int $repc3a
 * @property int $repc3b
 * @property int $repc3c
 * @property string $perc1
 * @property string $perc2
 * @property string $perc3
 * @property int $piaorg
 * @property string $repann
 * @property int $rep2kd
 * @property int $rep2ka
 * @property int $rep001
 * @property string $rep002
 * @property string $rep003
 * @property int $rep004
 * @property int $rep005
 * @property-read mixed $repar
 * @property-read string|null $repar_txt
 * @property-read string|null $stabi_txt
 * @property-read \Modules\Sigma\Models\Repart|null $repart
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Modules\Sigma\Models\Repart> $reparts
 * @property-read int|null $reparts_count
 * @property-read \Modules\Sigma\Models\Repart|null $stabi
 *
 * @method static Builder|Rep00f newModelQuery()
 * @method static Builder|Rep00f newQuery()
 * @method static Builder|Rep00f ofDate(int $date)
 * @method static Builder|Rep00f ofEnteRangeDate(int $ente, int $date_start, int $date_end)
 * @method static Builder|Rep00f ofEnteYear(int $ente, int $year)
 * @method static Builder|Rep00f ofQuarter(int $quarter, int $year)
 * @method static Builder|Rep00f ofRangeDate(int $date_start, int $date_end)
 * @method static Builder|Rep00f ofYear(int $year)
 * @method static Builder|Rep00f query()
 * @method static Builder|Rep00f whereEnte($value)
 * @method static Builder|Rep00f whereGrppag($value)
 * @method static Builder|Rep00f whereId($value)
 * @method static Builder|Rep00f whereMatr($value)
 * @method static Builder|Rep00f whereNumpag($value)
 * @method static Builder|Rep00f wherePerc1($value)
 * @method static Builder|Rep00f wherePerc2($value)
 * @method static Builder|Rep00f wherePerc3($value)
 * @method static Builder|Rep00f wherePiaorg($value)
 * @method static Builder|Rep00f whereRep001($value)
 * @method static Builder|Rep00f whereRep002($value)
 * @method static Builder|Rep00f whereRep003($value)
 * @method static Builder|Rep00f whereRep004($value)
 * @method static Builder|Rep00f whereRep005($value)
 * @method static Builder|Rep00f whereRep2ka($value)
 * @method static Builder|Rep00f whereRep2kd($value)
 * @method static Builder|Rep00f whereRepal($value)
 * @method static Builder|Rep00f whereRepann($value)
 * @method static Builder|Rep00f whereRepc1a($value)
 * @method static Builder|Rep00f whereRepc1b($value)
 * @method static Builder|Rep00f whereRepc1c($value)
 * @method static Builder|Rep00f whereRepc2a($value)
 * @method static Builder|Rep00f whereRepc2b($value)
 * @method static Builder|Rep00f whereRepc2c($value)
 * @method static Builder|Rep00f whereRepc3a($value)
 * @method static Builder|Rep00f whereRepc3b($value)
 * @method static Builder|Rep00f whereRepc3c($value)
 * @method static Builder|Rep00f whereRepcla($value)
 * @method static Builder|Rep00f whereRepdal($value)
 * @method static Builder|Rep00f whereRepmar($value)
 * @method static Builder|Rep00f whereRepre1($value)
 * @method static Builder|Rep00f whereRepre2($value)
 * @method static Builder|Rep00f whereRepst1($value)
 * @method static Builder|Rep00f whereRepst2($value)
 * @method static Builder|Rep00f withDays(int $date_min, int $date_max)
 *
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Modules\Sigma\Models\Ana02f> $ana02f
 * @property-read int|null $ana02f_count
 * @property-read \Modules\Sigma\Models\Ana10f|null $ana10f
 * @property-read \Modules\Sigma\Models\Anag|null $anag
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Modules\Sigma\Models\Asz00f> $asz00f
 * @property-read int|null $asz00f_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Modules\Sigma\Models\Asz00k1> $asz00k1
 * @property-read int|null $asz00k1_count
 * @property-read string|null $codice_fiscale
 * @property-read string|null $cognome
 * @property-read string|null $email
 * @property-read string|null $inail
 * @property-read mixed $last_data_assunz
 * @property-read string|null $nome
 * @property-read string|null $sesso
 * @property-read string $titolo_di_studio
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Modules\Sigma\Models\Qua03f> $qua03f
 * @property-read int|null $qua03f_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, Rep00f> $rep00f
 * @property-read int|null $rep00f_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Modules\Sigma\Models\Sto00f> $sto00f
 * @property-read int|null $sto00f_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Modules\Sigma\Models\Wstr01lx> $wstr01lx
 * @property-read int|null $wstr01lx_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Modules\Sigma\Models\Wstr01lx> $wstr01lxYear
 * @property-read int|null $wstr01lx_year_count
 *
 * @method static Builder|Rep00f ofEnte(int $ente)
 *
 * @mixin \Eloquent
 */
class Rep00f extends Model
{
    // use SigmaModelTrait;
    use CommonScope;
    use EnteMatrMutator;
    use EnteMatrRelationship;

    protected $fillable = ['id', 'ente', 'matr', 'repdal', 'repal', 'repst1', 'repre1', 'repst2', 'repre2', 'repcla', 'repmar', 'grppag', 'numpag', 'repc1a', 'repc1b', 'repc1c', 'repc2a', 'repc2b', 'repc2c', 'repc3a', 'repc3b', 'repc3c', 'perc1', 'perc2', 'perc3', 'piaorg', 'repann', 'rep2kd', 'rep2ka', 'rep001', 'rep002', 'rep003', 'rep004', 'rep005'];

    protected $connection = 'generale';

    // this will use the specified database connection
    protected $table = 'rep00f';

    public $timestamps = false;

    // protected $dates=['rep2kd','rep2ka'];
    public string $from_field = 'rep2kd';

    public string $to_field = 'rep2ka';

    // ----------- RelationShip
    public function reparts(): HasMany
    {
        return $this->hasMany(Repart::class, 'ente', 'ente')
            ->where('stabi', $this->repst1);
    }

    public function repart(): HasOne
    {
        return $this->hasOne(Repart::class, 'ente', 'ente')
            ->where('stabi', $this->repst1)
            ->where('repar', $this->repre1);
    }

    public function stabi(): HasOne
    {
        return $this->hasOne(Repart::class, 'ente', 'ente')
            ->where('stabi', $this->repst1)
            ->where('repar', 0);
    }

    public function qua00f(): HasMany
    {
        return $this->hasMany(Qua00f::class, 'matr', 'matr')
            ->where('ente', '90') // $this->ente non ce la fa
            ->whereRaw('quaann=""')
            ->ofRangeDate($this->rep2kd, $this->rep2ka);
    }

    // -------------- MUTATORS ---------------
    /*
    public function getFromFieldAttribute(?string $value):string {
        return 'rep2kd';
    }

    public function getToFieldAttribute(?string $value):string {
        return 'rep2ka';
    }

    public function getAnnAttribute($value) {
        return 'repann';
    }

    public function getDalAttribute($value) {
        return 'rep2kd';
    }

    public function getAlAttribute($value) {
        return 'rep2ka';
    }
    */

    /*
    public function getRep2kdAttribute($value){

        if(!is_object($value)){
            $value=Carbon::parse($value);
        }
        return $value;
    }
    public function getRep2kaAttribute($value){
        if($value==0) return $value;
        if(!is_object($value)){
            $value=Carbon::parse($value);
        }
        return $value;
    }
    */

    public function getStabiTxtAttribute(?string $value): ?string
    {
        return optional($this->reparts->where('repar', 0)->first())->dest1;
    }

    /*
     * Undocumented function.
     *
     *
     * @return string
     */
    // public function getReparAttribute(mixed $value) {
    //    return $this->repre1;
    // }

    public function getReparTxtAttribute(?string $value): ?string
    {
        return optional($this->reparts->where('repar', $this->repre1)->first())->dest1;
    }

    // --------- SCOPES --------------
    public function scopeOfYear(Builder $query, int $year): Builder
    {
        $sql = '(
			('.$year.' between year(rep2kd) and year(rep2ka) ) or
			('.$year.' >= year(rep2kd) and rep2ka=0 )
		)';

        return $query->whereRaw($sql);
    }

    public function scopeOfDate(Builder $query, int $date): Builder
    {
        $sql = '(
			('.$date.' between rep2kd and rep2ka ) or
			('.$date.' >= rep2kd and rep2ka=0 )
		)';

        return $query->whereRaw($sql);
    }

    /**
     * Undocumented function.
     *
     * @param  Builder<Rep00f>  $query
     */
    public function scopeOfEnteYear($query, int $ente, int $year): Builder
    {
        // 267    Call to an undefined method Illuminate\Database\Eloquent\Builder<Illuminate\Database\Eloquent\Model>::ofYear().
        return $query->where('ente', $ente)
            ->whereRaw('repann=""')
            ->ofYear($year);
    }

    /*
    public function scopeOfRangeDate(Builder $query,$date_start,$date_end){
        if(is_object($date_start)){
            $date_start=$date_start->format('Ymd');
        }

        if($date_end==0){
            $sql='((rep2ka >= '.$date_start.') or (rep2ka =0))';
            return $query->whereRaw($sql);
        }
        $sql='
        (
            (
                ('.$date_start.' between rep2kd and rep2ka ) or
                ('.$date_start.' >= rep2kd and rep2ka=0 )
            ) or
            (
                ('.$date_end.' between rep2kd and rep2ka ) or
                ('.$date_end.' >= rep2kd and rep2ka=0 )
            ) or

                (rep2kd between '.$date_start.' and '.$date_end.' )


        )';


        return $query->whereRaw($sql);
    }
    */

    /**
     * Undocumented function.
     *
     * @param  Builder<Rep00f>  $query
     */
    public function scopeOfEnteRangeDate($query, int $ente, int $date_start, int $date_end): Builder
    {
        // 301    Call to an undefined method Illuminate\Database\Eloquent\Builder<Illuminate\Database\Eloquent\Model>::ofRangeDate().
        return $query->where('ente', $ente)
            ->whereRaw('repann=""')
            ->ofRangeDate($date_start, $date_end);
    }

    public static function stabiReparOfYearCollection(array $params): Collection
    {
        extract($params);
        if (! isset($anno)) {
            throw new Exception('!isset($anno)');
        }

        if (! isset($ente)) {
            throw new Exception('!isset($ente)');
        }

        $rep00f = self::ofYear($anno)
            ->whereRaw('repann=""')
            ->where('ente', $ente)
            ->get();
        // dddx($rep00f->count());//432
        $rep00f_coll = collect($rep00f->toArray())->map(static function (array $item) use ($anno): array {
            $tmp = new stdClass;
            $tmp->ente = $item['ente'];
            $tmp->matr = $item['matr'];
            if ($item['repst1'] !== 0) {
                $tmp->stabi = $item['repst1'];
                $tmp->repar = $item['repre1'];
            } else {
                $tmp->stabi = $item['repst2'];
                $tmp->repar = $item['repre2'];
            }

            $tmp->rep2kd = \is_object($item['rep2kd']) ? $item['rep2kd']->format('Ymd') * 1 : $item['rep2kd'];
            $tmp->rep2ka = \is_object($item['rep2ka']) ? $item['rep2ka']->format('Ymd') * 1 : $item['rep2ka'];
            $tmp->anno = $anno;

            return get_object_vars($tmp);
        });
        $rep00f_coll = $rep00f_coll->groupBy(static fn ($item): string => $item['ente'].'-'.$item['matr'].'-'.$item['stabi'].'-'.$item['repar']);

        // dddx($rep00f_coll->count());//424
        return $rep00f_coll->map(static fn (array $item): array => [
            'ente' => $item[0]['ente'],
            'matr' => $item[0]['matr'],
            'stabi' => $item[0]['stabi'],
            'repar' => $item[0]['repar'],
            // --- da aggiungere il controllo se non ci sono "buchi" in mezzo
            'rep2kd' => collect($item)->sortBy('rep2kd')->first()['rep2kd'],
            'rep2ka' => collect($item)->sortByDesc('rep2kd')->first()['rep2ka'],
            'anno' => $item[0]['anno'],
        ]);
    }
}
