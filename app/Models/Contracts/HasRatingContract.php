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
<<<<<<< HEAD:app/Models/Contracts/HasRatingContract.php
<<<<<<< HEAD
     * @return MorphToMany<Rating, Rating|\Illuminate\Database\Eloquent\Model>
=======
     * @return MorphToMany<Rating>
>>>>>>> 6a338e09 (Merge commit 'e1d791bbad6512f4a9dade9d330c2e1ce0a99418' as 'laravel/Modules/Rating')
=======
     * @return MorphToMany<Rating, \Illuminate\Database\Eloquent\Model>
>>>>>>> 1d35aa92 (.):laravel/Modules/Rating/app/Models/Contracts/HasRatingContract.php
=======
     * @return MorphToMany<Rating, Rating|\Illuminate\Database\Eloquent\Model>
>>>>>>> 2df6fbc8 (first)
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
