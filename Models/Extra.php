<?php

declare(strict_types=1);

namespace Modules\User\Models;

use Modules\Xot\Models\Extra as XotBaseExtra;

/**
 * @property \Spatie\SchemalessAttributes\SchemalessAttributes $extra_attributes
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Extra newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Extra newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Extra query()
 * @method static Builder|Extra                               withExtraAttributes()
 *
 * @mixin \Eloquent
 */
class Extra extends XotBaseExtra
{
    /** @var string */
    protected $connection = 'user';
}
