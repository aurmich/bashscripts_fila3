<?php

declare(strict_types=1);

namespace Modules\Progressioni\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Model;
use Modules\Progressioni\Models\CategoriaPropro;

class CategoriaProproFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var class-string<Model>
     */
    protected $model = CategoriaPropro::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'id' => $this->faker->randomNumber,
            'categoria' => $this->faker->word,
            'lista_propro' => $this->faker->word,
            'lista_propro_sup' => $this->faker->word,
            'posti' => $this->faker->randomNumber,
            'anno' => $this->faker->randomNumber,
        ];
    }
}
