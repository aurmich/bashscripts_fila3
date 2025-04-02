<?php

declare(strict_types=1);

namespace Modules\Progressioni\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Model;
use Modules\Progressioni\Models\Valutatore;

class ValutatoreFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var class-string<Model>
     */
    protected $model = Valutatore::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'id' => $this->faker->randomNumber,
            'stabi' => $this->faker->randomNumber,
            'repar' => $this->faker->randomNumber,
            'nome_stabi' => $this->faker->word,
            'stabi_txt' => $this->faker->word,
            'repar_txt' => $this->faker->word,
            'ente' => $this->faker->randomNumber,
            'matr' => $this->faker->randomNumber,
            'anno' => $this->faker->randomNumber,
            'nome_diri' => $this->faker->word,
            'nome_diri_plus' => $this->faker->word,
            'budget' => $this->faker->randomFloat,
            'valutatore_id' => $this->faker->integer,
        ];
    }
}
