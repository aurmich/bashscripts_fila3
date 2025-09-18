<?php

declare(strict_types=1);

namespace Modules\Badge\Models;

use Illuminate\Database\Eloquent\Builder;

/**
 * Modules\Badge\Models\StoriaBadge.
 *
 * @method static \Modules\Badge\Database\Factories\StoriaBadgeFactory factory($count = null, $state = [])
 * @method static Builder|StoriaBadge newModelQuery()
 * @method static Builder|StoriaBadge newQuery()
 * @method static Builder|StoriaBadge query()
 *
 * @mixin \Eloquent
 */
class StoriaBadge extends BaseModel
{
    protected $fillable = ['id', 'ente', 'matricola', 'cognome', 'nome', 'badge', 'data', 'note', 'last_stato', 'handle', 'datemod'];
}
