<?php

declare(strict_types=1);

namespace Modules\Prenotazioni\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Model;
use Modules\Prenotazioni\Models\TipoAppuntamento;

class TipoAppuntamentoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var class-string<Model>
     */
    protected $model = TipoAppuntamento::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'id' => $this->faker->randomNumber(),
        ];
    }
}
