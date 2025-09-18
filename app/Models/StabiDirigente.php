<?php

declare(strict_types=1);

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
 *
 * @property int $id
 * @property int|null $stabi
 * @property int|null $repar
<<<<<<< HEAD
 * @property int|null $anno
 * @property string|null $nome_stabi
 * @property int|null $ente
 * @property int|null $matr
 * @property string|null $nome_diri
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
 * @method static Builder|StabiDirigente newModelQuery()
 * @method static Builder|StabiDirigente newQuery()
 * @method static Builder|StabiDirigente query()
 * @method static Builder|StabiDirigente whereAnno($value)
 * @method static Builder|StabiDirigente whereBudget($value)
 * @method static Builder|StabiDirigente whereCreatedAt($value)
 * @method static Builder|StabiDirigente whereCreatedBy($value)
 * @method static Builder|StabiDirigente whereCreatedIp($value)
 * @method static Builder|StabiDirigente whereDeletedAt($value)
 * @method static Builder|StabiDirigente whereDeletedBy($value)
 * @method static Builder|StabiDirigente whereDeletedIp($value)
 * @method static Builder|StabiDirigente whereEnte($value)
 * @method static Builder|StabiDirigente whereId($value)
 * @method static Builder|StabiDirigente whereMatr($value)
 * @method static Builder|StabiDirigente whereNomeDiri($value)
 * @method static Builder|StabiDirigente whereNomeDiriPlus($value)
 * @method static Builder|StabiDirigente whereNomeStabi($value)
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
}
