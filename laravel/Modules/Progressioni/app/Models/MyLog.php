<?php

declare(strict_types=1);

namespace Modules\Progressioni\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Carbon;

/**
 * Modules\Progressioni\Models\MyLog.
 *
 * @property int $id
 * @property int|null $id_tbl
 * @property string|null $tbl
 * @property int|null $id_approvaz
 * @property string|null $note
 * @property string|null $obj
 * @property string|null $act
 * @property array|null $data
 * @property string|null $datemod
 * @property string|null $handle
 * @property string|null $created_by
 * @property string|null $updated_by
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @method static \Modules\Ptv\Database\Factories\MyLogFactory factory($count = null, $state = [])
 * @method static Builder|MyLog newModelQuery()
 * @method static Builder|MyLog newQuery()
 * @method static Builder|MyLog query()
 * @method static Builder|MyLog whereAct($value)
 * @method static Builder|MyLog whereCreatedAt($value)
 * @method static Builder|MyLog whereCreatedBy($value)
 * @method static Builder|MyLog whereData($value)
 * @method static Builder|MyLog whereDatemod($value)
 * @method static Builder|MyLog whereHandle($value)
 * @method static Builder|MyLog whereId($value)
 * @method static Builder|MyLog whereIdApprovaz($value)
 * @method static Builder|MyLog whereIdTbl($value)
 * @method static Builder|MyLog whereNote($value)
 * @method static Builder|MyLog whereObj($value)
 * @method static Builder|MyLog whereTbl($value)
 * @method static Builder|MyLog whereUpdatedAt($value)
 * @method static Builder|MyLog whereUpdatedBy($value)
 *
 * @mixin \Eloquent
 */
class MyLog extends \Modules\Ptv\Models\MyLog
{
    protected $connection = 'progressione'; // this will use the specified database connection
}
