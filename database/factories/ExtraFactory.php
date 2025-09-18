<?php

declare(strict_types=1);

<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
namespace Modules\Xot\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
=======
=======
>>>>>>> e83070fd (.)
=======
>>>>>>> bdeae81f (first)
namespace Modules\User\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Model;
use Modules\User\Models\Extra;
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> 0d55b583 (first)
=======
>>>>>>> e83070fd (.)
=======
>>>>>>> bdeae81f (first)

class ExtraFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
     */
    protected $model = \Modules\Xot\Models\Extra::class;
=======
=======
>>>>>>> e83070fd (.)
=======
>>>>>>> bdeae81f (first)
     *
     * @var class-string<Model>
     */
    protected $model = Extra::class;
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> 0d55b583 (first)
=======
>>>>>>> e83070fd (.)
=======
>>>>>>> bdeae81f (first)

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        return [];
=======
=======
>>>>>>> e83070fd (.)
=======
>>>>>>> bdeae81f (first)
        return [
            // 'user_id' => $this->faker->randomNumber(5),
            'name' => $this->faker->name,
            'personal_team' => $this->faker->boolean,
        ];
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> 0d55b583 (first)
=======
>>>>>>> e83070fd (.)
=======
>>>>>>> bdeae81f (first)
    }
}
