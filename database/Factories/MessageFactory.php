<?php

declare(strict_types=1);

namespace Modules\IndennitaCondizioniLavoro\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Model;
use Modules\IndennitaCondizioniLavoro\Models\Message;

class MessageFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var class-string<Model>
     */
    protected $model = Message::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'id' => $this->faker->randomNumber(),
            'type' => $this->faker->word,
            'title' => $this->faker->sentence,
            'txt' => $this->faker->text,
            'anno' => $this->faker->text,
        ];
    }
}
