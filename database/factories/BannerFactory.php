<<<<<<< HEAD
<<<<<<< HEAD:database/factories/BannerFactory.php
=======
>>>>>>> origin/dev
<?php

declare(strict_types=1);

namespace Modules\Predict\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Predict\Models\Banner;

class BannerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     */
    protected $model = Banner::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [];
    }
}
<<<<<<< HEAD
=======
<?php

declare(strict_types=1);

namespace Modules\Predict\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class BannerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     */
    protected $model = \Modules\Predict\App\Models\Banner::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [];
    }
}
>>>>>>> cf3ae71 (up):Database/factories/BannerFactory.php
=======
>>>>>>> origin/dev
