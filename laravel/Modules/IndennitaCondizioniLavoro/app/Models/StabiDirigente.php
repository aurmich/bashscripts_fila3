<?php

declare(strict_types=1);

namespace Modules\IndennitaCondizioniLavoro\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Carbon;
use Modules\Ptv\Models\StabiDirigente as PtvStabiDirigenteModel;
use Modules\Sigma\Models\Repart;

/**
 * Modules\IndennitaCondizioniLavoro\Models\StabiDirigente.
 *
 * @property int $id
 * @property int|null $stabi
 * @property int|null $repar
 * @property int|null $anno
 * @property string|null $nome_stabi
 * @property int|null $ente
 * @property int|null $matr
 * @property string|null $nome_diri
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $updated_by
 * @property string|null $created_by
 * @property string|null $deleted_at
 * @property string|null $deleted_by
 * @property string|null $deleted_ip
 * @property string|null $created_ip
 * @property string|null $updated_ip
 * @property string|null $nome_diri_plus
 * @property string|null $budget
 * @property int|null $valutatore_id
 * @property-read Repart|null $repart
 *
 * @method static \Modules\IndennitaCondizioniLavoro\Database\Factories\StabiDirigenteFactory factory($count = null, $state = [])
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
 * @method static Builder|StabiDirigente whereStabi($value)
 * @method static Builder|StabiDirigente whereUpdatedAt($value)
 * @method static Builder|StabiDirigente whereUpdatedBy($value)
 * @method static Builder|StabiDirigente whereUpdatedIp($value)
 * @method static Builder|StabiDirigente whereValutatoreId($value)
 *
 * @mixin \Eloquent
 */
class StabiDirigente extends PtvStabiDirigenteModel
{
    protected $connection = 'indennita_condizioni_lavoro'; // this will use the specified database connection
}
