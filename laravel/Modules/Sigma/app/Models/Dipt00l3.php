<?php

declare(strict_types=1);

namespace Modules\Sigma\Models;

use Illuminate\Database\Eloquent\Builder;

/**
 * Modules\Sigma\Models\Dipt00l3.
 *
 * @property int $id
 * @property string|null $enteap
 * @property string|null $dtannu
 * @property string|null $dtmatr
 * @property string|null $dtturn
 * @property string|null $dtdal
 * @property string|null $dtal
 * @property string|null $dtcom1
 * @property string|null $dtcom2
 * @property string|null $dtcom3
 * @property string|null $dtcom4
 *
 * @method static Builder|Dipt00l3 newModelQuery()
 * @method static Builder|Dipt00l3 newQuery()
 * @method static Builder|Dipt00l3 query()
 * @method static Builder|Dipt00l3 whereDtal($value)
 * @method static Builder|Dipt00l3 whereDtannu($value)
 * @method static Builder|Dipt00l3 whereDtcom1($value)
 * @method static Builder|Dipt00l3 whereDtcom2($value)
 * @method static Builder|Dipt00l3 whereDtcom3($value)
 * @method static Builder|Dipt00l3 whereDtcom4($value)
 * @method static Builder|Dipt00l3 whereDtdal($value)
 * @method static Builder|Dipt00l3 whereDtmatr($value)
 * @method static Builder|Dipt00l3 whereDtturn($value)
 * @method static Builder|Dipt00l3 whereEnteap($value)
 * @method static Builder|Dipt00l3 whereId($value)
 *
 * @mixin \Eloquent
 */
class Dipt00l3 extends BaseModel
{
    protected $table = 'dipt00l3';
}
