<?php

declare(strict_types=1);

namespace Modules\Progressioni\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Model;
use Modules\Progressioni\Models\SchedaCriteri;

class SchedaCriteriFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var class-string<Model>
     */
    protected $model = SchedaCriteri::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'id' => $this->faker->randomNumber,
            'criterio' => $this->faker->text,
            'peso' => $this->faker->randomNumber,
            'descr' => $this->faker->text,
            'is_editable' => $this->faker->boolean,
            'field_name' => $this->faker->word,
            'anno' => $this->faker->randomNumber,
            'pos' => $this->faker->randomNumber,
            'converted_in' => $this->faker->randomNumber,
        ];
    }
}
