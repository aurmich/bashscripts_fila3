<?php

declare(strict_types=1);

<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
namespace Modules\IndennitaCondizioniLavoro\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Model;
use Modules\IndennitaCondizioniLavoro\Models\Message;
=======
namespace Modules\IndennitaResponsabilita\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Model;
use Modules\IndennitaResponsabilita\Models\Message;
>>>>>>> e0005d7d (first)
=======
namespace Modules\Progressioni\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Model;
use Modules\Progressioni\Models\Message;
>>>>>>> bcab6efe (first)
=======
namespace Modules\Ptv\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Model;
use Modules\Ptv\Models\Message;
>>>>>>> dc18abbe (first)

class MessageFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var class-string<Model>
     */
    protected $model = Message::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
<<<<<<< HEAD
<<<<<<< HEAD
            'id' => $this->faker->randomNumber(),
=======
            'id' => $this->faker->randomNumber,
>>>>>>> bcab6efe (first)
            'type' => $this->faker->word,
            'title' => $this->faker->sentence,
            'txt' => $this->faker->text,
            'anno' => $this->faker->text,
=======
            'id' => $this->faker->randomNumber(),
            'type' => $this->faker->word,
            'title' => $this->faker->sentence,
            'txt' => $this->faker->word,
            'anno' => $this->faker->randomNumber(),
>>>>>>> dc18abbe (first)
        ];
    }
}
