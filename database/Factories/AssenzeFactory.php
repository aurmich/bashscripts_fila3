<?php

declare(strict_types=1);

namespace Modules\Progressioni\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Model;
use Modules\Progressioni\Models\Assenze;

class AssenzeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var class-string<Model>
     */
    protected $model = Assenze::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'id' => $this->faker->randomNumber,
            'tipo' => $this->faker->randomNumber,
            'codice' => $this->faker->randomNumber,
            'descr' => $this->faker->word,
            'anno' => $this->faker->randomNumber,
            'umi' => $this->faker->word,
            'dur' => $this->faker->word,
        ];
    }
}
