<?php

declare(strict_types=1);

namespace Modules\Progressioni\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Model;
use Modules\Progressioni\Models\CriteriValutazione;

class CriteriValutazioneFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var class-string<Model>
     */
    protected $model = CriteriValutazione::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'id' => $this->faker->randomNumber,
            'parent_id' => $this->faker->integer,
            'name' => $this->faker->name,
            'label' => $this->faker->word,
            'descr' => $this->faker->word,
            'post_type' => $this->faker->word,
            'posizione' => $this->faker->randomNumber,
            'anno' => $this->faker->randomNumber,
        ];
    }
}
