<?php

declare(strict_types=1);

<<<<<<< HEAD
<<<<<<< HEAD
namespace Modules\Xot\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
=======
=======
>>>>>>> e83070fd (.)
namespace Modules\User\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Model;
use Modules\User\Models\Extra;
<<<<<<< HEAD
>>>>>>> 0d55b583 (first)
=======
>>>>>>> e83070fd (.)

class ExtraFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
<<<<<<< HEAD
<<<<<<< HEAD
     */
    protected $model = \Modules\Xot\Models\Extra::class;
=======
=======
>>>>>>> e83070fd (.)
     *
     * @var class-string<Model>
     */
    protected $model = Extra::class;
<<<<<<< HEAD
>>>>>>> 0d55b583 (first)
=======
>>>>>>> e83070fd (.)

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
<<<<<<< HEAD
<<<<<<< HEAD
        return [];
=======
=======
>>>>>>> e83070fd (.)
        return [
            // 'user_id' => $this->faker->randomNumber(5),
            'name' => $this->faker->name,
            'personal_team' => $this->faker->boolean,
        ];
<<<<<<< HEAD
>>>>>>> 0d55b583 (first)
=======
>>>>>>> e83070fd (.)
    }
}
