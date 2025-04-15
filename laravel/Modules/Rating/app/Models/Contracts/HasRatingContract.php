<?php

declare(strict_types=1);

namespace Modules\Rating\Models\Contracts;

use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Modules\Rating\Models\Rating;

/**
 * --.
 */
interface HasRatingContract
{
    /**
<<<<<<< HEAD
     * @return MorphToMany<Rating, Rating|\Illuminate\Database\Eloquent\Model>
=======
     * @return MorphToMany<Rating>
>>>>>>> origin/dev
     */
    public function ratings(): MorphToMany;
}

/*
 * @property-read string $url

interface Page
{
    public function getUrlAttribute(): string;
}
*/
