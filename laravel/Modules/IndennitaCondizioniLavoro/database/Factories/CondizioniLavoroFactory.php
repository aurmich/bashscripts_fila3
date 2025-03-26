<?php

namespace Modules\IndennitaCondizioniLavoro\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\IndennitaCondizioniLavoro\Models\CondizioniLavoro;

class CondizioniLavoroFactory extends Factory
{
    protected $model = CondizioniLavoro::class;

    public function definition()
    {
        return [
            'anno' => $this->faker->year(),
            'quadrimestre' => $this->faker->numberBetween(1, 3),
            'matr' => $this->faker->unique()->numberBetween(10000, 99999),
            'cognome' => $this->faker->lastName(),
            'nome' => $this->faker->firstName(),
            'stabi' => $this->faker->company(),
            'repar' => $this->faker->word(),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
