<?php

declare(strict_types=1);

namespace Modules\Progressioni\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Model;
use Modules\Progressioni\Models\StipendioTabellare;

class StipendioTabellareFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var class-string<Model>
     */
    protected $model = StipendioTabellare::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'categoria' => $this->faker->word,
            'propro' => $this->faker->randomNumber,
            'posfun' => $this->faker->randomNumber,
            'euro_pond' => $this->faker->randomFloat,
            'ptime' => $this->faker->randomFloat,
            'euro' => $this->faker->randomFloat,
            'importo_stipendio_annuo' => $this->faker->randomFloat,
            'anno' => $this->faker->randomNumber,
        ];
    }
}
