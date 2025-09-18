<?php

declare(strict_types=1);

namespace Modules\Badge\Models;

use Illuminate\Database\Eloquent\Builder;

/**
 * Modules\Badge\Models\Mylog.
 *
 * @method static \Modules\Badge\Database\Factories\MylogFactory factory($count = null, $state = [])
 * @method static Builder|Mylog newModelQuery()
 * @method static Builder|Mylog newQuery()
 * @method static Builder|Mylog query()
 *
 * @mixin \Eloquent
 */
class Mylog extends BaseModel
{
    protected $fillable = ['id', 'id_tbl', 'tbl', 'id_approvaz', 'note', 'handle'];
}
