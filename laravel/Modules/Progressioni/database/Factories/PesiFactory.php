<?php

declare(strict_types=1);

namespace Modules\Progressioni\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Model;
use Modules\Progressioni\Models\Pesi;

class PesiFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var class-string<Model>
     */
    protected $model = Pesi::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'id' => $this->faker->randomNumber,
            'lista_propro' => $this->faker->word,
            'descr' => $this->faker->word,
            'peso_esperienza_acquisita' => $this->faker->randomNumber,
            'peso_risultati_ottenuti' => $this->faker->randomNumber,
            'peso_arricchimento_professionale' => $this->faker->randomNumber,
            'peso_impegno' => $this->faker->randomNumber,
            'peso_qualita_prestazione' => $this->faker->randomNumber,
            'anno' => $this->faker->randomNumber,
        ];
    }
}
