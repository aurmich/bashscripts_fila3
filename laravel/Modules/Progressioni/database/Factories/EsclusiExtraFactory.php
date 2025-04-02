<?php

declare(strict_types=1);

namespace Modules\Progressioni\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Model;
use Modules\Progressioni\Models\EsclusiExtra;

class EsclusiExtraFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var class-string<Model>
     */
    protected $model = EsclusiExtra::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'id' => $this->faker->randomNumber,
            'ente' => $this->faker->randomNumber,
            'matr' => $this->faker->randomNumber,
            'cognome' => $this->faker->word,
            'nome' => $this->faker->word,
            'motivo' => $this->faker->text,
            'anno' => $this->faker->randomNumber,
        ];
    }
}
