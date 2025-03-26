<?php

declare(strict_types=1);

namespace Modules\Sigma\Models;

use Illuminate\Database\Eloquent\Builder;

/**
 * Modules\Sigma\Models\Acptv.
 *
 * @method static Builder|Acptv newModelQuery()
 * @method static Builder|Acptv newQuery()
 * @method static Builder|Acptv query()
 *
 * @property int $id
 * @property string|null $acpmat
 * @property string|null $acpcpd
 * @property string|null $acpina
 * @property string|null $acpann
 * @property string|null $acpmes
 *
 * @method static Builder|Acptv whereAcpann($value)
 * @method static Builder|Acptv whereAcpcpd($value)
 * @method static Builder|Acptv whereAcpina($value)
 * @method static Builder|Acptv whereAcpmat($value)
 * @method static Builder|Acptv whereAcpmes($value)
 * @method static Builder|Acptv whereId($value)
 *
 * @mixin \Eloquent
 */
class Acptv extends BaseModel
{
    // protected $table = 'acptv';
}
