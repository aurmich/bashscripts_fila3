<?php

declare(strict_types=1);

namespace Modules\Badge\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Model;
use Modules\Badge\Models\Mylog;

class MylogFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var class-string<Model>
     */
    protected $model = Mylog::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'id' => $this->faker->randomNumber(),
            'id_tbl' => $this->faker->randomNumber(),
            'tbl' => $this->faker->word,
            'id_approvaz' => $this->faker->randomNumber(),
            'note' => $this->faker->text,
            'handle' => $this->faker->word,
        ];
    }
}
