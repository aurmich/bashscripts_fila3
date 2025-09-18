<?php

declare(strict_types=1);

<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
namespace Modules\IndennitaCondizioniLavoro\Models;
=======
namespace Modules\IndennitaResponsabilita\Models;
>>>>>>> e0005d7d (first)

use Illuminate\Database\Eloquent\Builder;
=======
namespace Modules\Progressioni\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\HasMany;
>>>>>>> bcab6efe (first)
use Illuminate\Support\Carbon;
use Modules\Ptv\Models\StabiDirigente as PtvStabiDirigenteModel;
use Modules\Sigma\Models\Repart;

/**
<<<<<<< HEAD
<<<<<<< HEAD
 * Modules\IndennitaCondizioniLavoro\Models\StabiDirigente.
=======
 * Modules\IndennitaResponsabilita\Models\StabiDirigente.
>>>>>>> e0005d7d (first)
=======
 * Modules\Progressioni\Models\StabiDirigente.
>>>>>>> bcab6efe (first)
=======
namespace Modules\Performance\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Carbon;
use Modules\Sigma\Models\Repart;

// use Modules\Xot\Traits\Updater;
/**
 * Modules\Performance\Models\StabiDirigente.
>>>>>>> 961ad402 (first)
=======
namespace Modules\Ptv\Models;

use DB;
use Modules\Xot\Traits\Updater;
use Modules\Sigma\Models\Rep00f;
use Modules\Sigma\Models\Repart;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Modules\Ptv\Models\StabiDirigente.
 *
 * @property-read string|null $nome_diri
 * @property-read string|null $nome_stabi
 * @property-read Repart|null $repart
 *
 * @method static \Modules\Ptv\Database\Factories\StabiDirigenteFactory factory($count = null, $state = [])
 * @method static Builder|StabiDirigente newModelQuery()
 * @method static Builder|StabiDirigente newQuery()
 * @method static Builder|StabiDirigente query()
>>>>>>> dc18abbe (first)
 *
 * @property int $id
 * @property int|null $stabi
 * @property int|null $repar
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
 * @property int|null $anno
=======
>>>>>>> 961ad402 (first)
 * @property string|null $nome_stabi
 * @property int|null $ente
 * @property int|null $matr
 * @property string|null $nome_diri
<<<<<<< HEAD
=======
 * @property string|null $nome_stabi
 * @property string|null $stabi_txt
 * @property string|null $repar_txt
 * @property int|null $ente
 * @property int|null $matr
 * @property int|null $anno
 * @property string|null $nome_diri
 * @property string|null $nome_diri_plus
 * @property string|null $budget
 * @property int|null $valutatore_id
>>>>>>> bcab6efe (first)
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $updated_by
 * @property string|null $created_by
 * @property string|null $deleted_at
 * @property string|null $deleted_by
 * @property string|null $deleted_ip
 * @property string|null $created_ip
 * @property string|null $updated_ip
<<<<<<< HEAD
 * @property string|null $nome_diri_plus
 * @property string|null $budget
 * @property int|null $valutatore_id
 * @property-read Repart|null $repart
 *
<<<<<<< HEAD
 * @method static \Modules\IndennitaCondizioniLavoro\Database\Factories\StabiDirigenteFactory factory($count = null, $state = [])
=======
 * @method static \Modules\IndennitaResponsabilita\Database\Factories\StabiDirigenteFactory factory($count = null, $state = [])
>>>>>>> e0005d7d (first)
=======
 * @property-read Collection<int, \Modules\Progressioni\Models\Schede> $benificiariProgressione
 * @property-read int|null $benificiari_progressione_count
 * @property-read Repart|null $repart
 * @property-read Collection<int, \Modules\Progressioni\Models\Schede> $schede
 * @property-read int|null $schede_count
 *
 * @method static \Modules\Progressioni\Database\Factories\StabiDirigenteFactory factory($count = null, $state = [])
>>>>>>> bcab6efe (first)
=======
 * @property string|null $anno
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $created_by
 * @property string|null $updated_by
 * @property int|null $n_diritto_excellence
 *
>>>>>>> 961ad402 (first)
 * @method static Builder|StabiDirigente newModelQuery()
 * @method static Builder|StabiDirigente newQuery()
 * @method static Builder|StabiDirigente query()
 * @method static Builder|StabiDirigente whereAnno($value)
<<<<<<< HEAD
 * @method static Builder|StabiDirigente whereBudget($value)
 * @method static Builder|StabiDirigente whereCreatedAt($value)
 * @method static Builder|StabiDirigente whereCreatedBy($value)
 * @method static Builder|StabiDirigente whereCreatedIp($value)
 * @method static Builder|StabiDirigente whereDeletedAt($value)
 * @method static Builder|StabiDirigente whereDeletedBy($value)
 * @method static Builder|StabiDirigente whereDeletedIp($value)
=======
 * @property int|null $ente
 * @property int|null $matr
 * @property string|null $nome_diri_plus
 * @property string|null $budget
 * @property int|null $valutatore_id
 * @property int|null $anno
 * @property string|null $post_type
 * @property int|null $post_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $created_by
 * @property string|null $updated_by
 *
 * @method static Builder|StabiDirigente whereAnno($value)
 * @method static Builder|StabiDirigente whereBudget($value)
 * @method static Builder|StabiDirigente whereCreatedAt($value)
 * @method static Builder|StabiDirigente whereCreatedBy($value)
>>>>>>> dc18abbe (first)
 * @method static Builder|StabiDirigente whereEnte($value)
 * @method static Builder|StabiDirigente whereId($value)
 * @method static Builder|StabiDirigente whereMatr($value)
 * @method static Builder|StabiDirigente whereNomeDiri($value)
 * @method static Builder|StabiDirigente whereNomeDiriPlus($value)
 * @method static Builder|StabiDirigente whereNomeStabi($value)
<<<<<<< HEAD
 * @method static Builder|StabiDirigente whereRepar($value)
<<<<<<< HEAD
 * @method static Builder|StabiDirigente whereStabi($value)
=======
 * @method static Builder|StabiDirigente whereReparTxt($value)
 * @method static Builder|StabiDirigente whereStabi($value)
 * @method static Builder|StabiDirigente whereStabiTxt($value)
>>>>>>> bcab6efe (first)
 * @method static Builder|StabiDirigente whereUpdatedAt($value)
 * @method static Builder|StabiDirigente whereUpdatedBy($value)
 * @method static Builder|StabiDirigente whereUpdatedIp($value)
 * @method static Builder|StabiDirigente whereValutatoreId($value)
 *
 * @mixin \Eloquent
 */
class StabiDirigente extends PtvStabiDirigenteModel
{
<<<<<<< HEAD
<<<<<<< HEAD
    protected $connection = 'indennita_condizioni_lavoro'; // this will use the specified database connection
=======
    protected $connection = 'indennita_responsabilita'; // this will use the specified database connection
>>>>>>> e0005d7d (first)
=======
    protected $connection = 'progressione'; // this will use the specified database connection

    public function budgetAssegnato(): float
    {
        $beneficiari = $this->benificiariProgressione;
        // $res = $beneficiari->sum('costo_fascia_up');
        $res = $beneficiari->sum(static fn ($item): int|float => $item->costo_fascia_up * $item->ptime);

        return (float) $res;
    }

    public function schede(): HasMany
    {
        return $this->hasMany(Schede::class, 'valutatore_id', 'id');
    }

    public function benificiariProgressione(): HasMany
    {
        return $this->schede()
            ->where('benificiario_progressione', 1);
    }
>>>>>>> bcab6efe (first)
=======
 * @method static Builder|StabiDirigente whereCreatedAt($value)
 * @method static Builder|StabiDirigente whereCreatedBy($value)
 * @method static Builder|StabiDirigente whereEnte($value)
 * @method static Builder|StabiDirigente whereId($value)
 * @method static Builder|StabiDirigente whereMatr($value)
 * @method static Builder|StabiDirigente whereNDirittoExcellence($value)
 * @method static Builder|StabiDirigente whereNomeDiri($value)
 * @method static Builder|StabiDirigente whereNomeStabi($value)
 * @method static Builder|StabiDirigente whereRepar($value)
 * @method static Builder|StabiDirigente whereStabi($value)
 * @method static Builder|StabiDirigente whereUpdatedAt($value)
 * @method static Builder|StabiDirigente whereUpdatedBy($value)
=======
 * @method static Builder|StabiDirigente wherePostId($value)
 * @method static Builder|StabiDirigente wherePostType($value)
 * @method static Builder|StabiDirigente whereRepar($value)
 * @method static Builder|StabiDirigente whereStabi($value)
 * @method static Builder|StabiDirigente whereUpdatedAt($value)
 * @method static Builder|StabiDirigente whereUpdatedBy($value)
 * @method static Builder|StabiDirigente whereValutatoreId($value)
 *
 * @property-read \Modules\Ptv\Models\Profile|null $creator
 * @property-read \Modules\Ptv\Models\Profile|null $updater
>>>>>>> dc18abbe (first)
 *
 * @mixin \Eloquent
 */
class StabiDirigente extends BaseModel
{
<<<<<<< HEAD
    /*
    use Updater;
    protected $connection = 'performance'; // this will use the specified database connection
    protected $dates = [
        'created_at',
        'updated_at',
        //'deleted_at',
    ];

    */
    protected $table = 'stabi_dirigente';

    protected $fillable = [
        'id', 'stabi', 'repar', 'nome_stabi',
        'ente', 'matr', 'nome_diri', 'anno',
        'n_diritto_excellence',
    ];

    // public $timestamps= false;
    /*
    public static function filter($params)
    {
        $rows = new self();
        extract($params);
        //echo '<pre>';print_r($params);echo '</pre>';
        return $rows;
    }
    */
    // end search
    // -------------------------
    //
    // ---- mutators ----
    /*
    public function getNomeDiriAttribute($value) {
        if (null !== $value) {
            return $value;
        }
        $row = StabiDirigente::where('stabi', $this->stabi)
            ->where('repar', $this->repar)
            ->first();

        if (is_object($row)) {
            $value = $row->nome_diri;
            $this->nome_diri = $value;
            $this->save();
        }

        return $value;
    }
    */
    public function getNomeStabiAttribute($value)
=======
    use HasFactory;
    use Updater;

    protected $table = 'stabi_dirigente';

    protected $fillable = [
        'stabi', 'repar', 'nome_stabi',
        'ente', 'matr', 'nome_diri', 'nome_diri_plus',
        'budget',
        'valutatore_id',
        'anno',
        'email',
    ];

    public function casts(): array
    {
        return [
            'created_at' => 'datetime', 'updated_at' => 'datetime',
        ];
    }

    // ----- relationship ---
    public function repart(): HasOne
    {
        return $this->hasOne(Repart::class, 'stabi', 'stabi')
            ->where('repar', $this->repar)
            ->where('ente', 90);
    }

    /*
    public function schede():\Illuminate\Database\Eloquent\Relations\HasMany {
        return $this->hasMany(Schede::class, 'valutatore_id', 'id');
    }

    public function benificiariProgressione() {
        return $this->schede()->where('benificiario_progressione', 1);
    }
    */

    // --- mutators --
    public function getNomeStabiAttribute(?string $value): ?string
    {
        if ($value !== null) {
            return $value;
        }
        if (! $this->repart instanceof Repart) {
            return $value;
        }

        return $this->repart->dest1;
    }

    public function getStabiAttribute(?int $value): ?int
    {
        if (($value !== null && $value!=0)|| $this->getKey() === null) {
            return $value;
        }
        $rep00f=Rep00f::where('ente',$this->ente)
        ->where('matr',$this->matr)
        ->whereRaw('repann=""')
        ->ofYear($this->anno)
        ->latest('rep2kd')
        ->first();

        $value=$rep00f?->repst1;
        if($value==0 && $rep00f?->repst2!=0){
            $value=$rep00f?->repst2;
        }
        $this->update(['stabi'=>$value]);
        return $value;
    }

     public function getReparAttribute(?int $value): ?int
    {
        if (($value !== null )|| $this->getKey() === null) {
            return $value;
        }
        $value=0;
        $this->update(['repar'=>$value]);
        return $value;
    }

    public function getEnteAttribute(?int $value): ?int
    {
        if (($value !== null )|| $this->getKey() === null) {
            return $value;
        }
        $value=90;
        $this->update(['ente'=>$value]);
        return $value;
    }

    public function getNomeDiriAttribute(?string $value): ?string
>>>>>>> dc18abbe (first)
    {
        if ($value !== null) {
            return $value;
        }

<<<<<<< HEAD
        $stabi = Repart::where('stabi', $this->stabi)
            ->where('repar', 0)
            ->where('ente', 90)
            ->first();

        $repart = Repart::where('stabi', $this->stabi)
            ->where('repar', $this->repar)
            ->where('ente', 90)
            ->first();
        if (\is_object($stabi) && \is_object($repart)) {
            $value = $stabi->dest1.' '.$stabi->dest2.' - '.$repart->dest1.' '.$repart->dest2;
            $this->nome_stabi = $value;
            $this->save();
        }

        return $value;
    }
>>>>>>> 961ad402 (first)
=======
        /*
         * Se non c'e' il nome prendo quello dell'anno prima.
         */
        if (random_int(1, 10) > 7) {
            $prev = self::where('stabi', $this->stabi)
                ->where('repar', $this->repar)
                ->where('anno', $this->anno - 1)
                ->first();
            if (\is_object($prev)) {
                $value = $prev->nome_diri;
                $this->nome_diri = $value;
                $this->save();

                return $value;
            }
        }

        // *
        if ($value === null && $this->stabi !== '' && random_int(1, 10) > 8) {
            $conn = $this->getConnection();
            $sql = 'select concat(conome," ",nome) as nome_diri from generale.ana10f where matr=(
                select matr from generale.qua00f where (
                    ('.$this->anno.' between year(qua2kd) and year(qua2ka) ) or
                    ('.$this->anno.' >= year(qua2kd) and qua2ka=0 )
                ) and quaann=""
                and matr in
                (select matr from generale.rep00f where repst1="'.$this->stabi.'"
                 and repann=""
                and (
                    ('.$this->anno.' between year(rep2kd) and year(rep2ka) ) or
                    ('.$this->anno.' >= year(rep2kd) and rep2ka=0 )
                )
                order by rep2kd desc
                )
                and matr in
                (select matr from generale.sto00f where stann=""
                and (
                    ('.($this->anno + 1).' between year(st2kas) and year(st2kdi) ) or
                    ('.($this->anno + 1).' >= year(st2kas) and st2kdi=0 )
                )
                )
                order by propro desc,posfun desc
                limit 1)';

            $res = DB::select($sql);
            if (isset($res[0])) {
                $value = ucwords(strtolower((string) $res[0]->nome_diri)).'';

                $this->nome_diri = $value;
                $this->save();
            }

            return $value;
        }

        // */
        return $value;
    }

    /*
    public function budgetAssegnato() {
        $beneficiari = $this->benificiariProgressione;
        $res = $beneficiari->sum('costo_fascia_up');

        return $res;
    }
    */
    // end budgetAssegnato
    /**
     * Create a new factory instance for the model.
     *
     * @return Factory
     */
    protected static function newFactory()
    {
        return app(\Modules\Xot\Actions\Factory\GetFactoryAction::class)->execute(static::class);
    }
>>>>>>> dc18abbe (first)
}
