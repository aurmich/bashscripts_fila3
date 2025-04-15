<?php

declare(strict_types=1);

namespace Modules\Ptv\Models\Traits;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;

/*
 * Undocumented trait.
 */
trait HasCriteriValutazione
{
    public function criteriValutazione(): HasMany
    {
        $myclass = static::class;
        $class = Str::of($myclass)
            ->before('\Models\\')
            ->append('\Models\CriteriValutazione')
            ->toString();

        
        return $this->hasMany($class, 'anno', 'anno');
    }
}
