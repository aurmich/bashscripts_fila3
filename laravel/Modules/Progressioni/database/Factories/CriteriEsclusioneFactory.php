<?php

declare(strict_types=1);

namespace Modules\Progressioni\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Model;
use Modules\Progressioni\Models\CriteriEsclusione;

class CriteriEsclusioneFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var class-string<Model>
     */
    protected $model = CriteriEsclusione::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'id' => $this->faker->randomNumber,
            'name' => $this->faker->name,
            'field_name' => $this->faker->word,
            'op' => $this->faker->word,
            'value' => $this->faker->word,
            'type' => $this->faker->word,
            'anno' => $this->faker->randomNumber,
        ];
    }
}
