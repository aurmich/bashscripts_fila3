<?php

declare(strict_types=1);

namespace Modules\Ptv\Models\Traits;

use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Support\Str;

/*
 * Undocumented trait.
 */
trait HasCriteriValutazione
{
    public function criteriValutazione(): MorphMany
    {
        $myclass = static::class;
        $class = Str::of($myclass)
            ->before('\Models\\')
            ->append('\Models\CriteriValutazione')
            ->toString();

        
        return $this->hasMany($class, 'anno', 'anno');
    }
}
