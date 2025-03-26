<?php

declare(strict_types=1);

namespace Modules\Mensa\Models;

use Illuminate\Database\Eloquent\Builder;

/**
 * Modules\Mensa\Models\ContributoCassa.
 *
 * @method static \Modules\Mensa\Database\Factories\ContributoCassaFactory factory($count = null, $state = [])
 * @method static Builder|ContributoCassa newModelQuery()
 * @method static Builder|ContributoCassa newQuery()
 * @method static Builder|ContributoCassa query()
 *
 * @mixin \Eloquent
 */
class ContributoCassa extends BaseModel
{
    protected $fillable = ['id', 'cod', 'cassa', 'perc'];
}
