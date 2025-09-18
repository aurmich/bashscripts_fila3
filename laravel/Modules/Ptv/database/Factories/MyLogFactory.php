<?php

declare(strict_types=1);

namespace Modules\Ptv\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Model;
use Modules\Ptv\Models\MyLog;

class MyLogFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var class-string<Model>
     */
    protected $model = MyLog::class;

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
            'obj' => $this->faker->text,
            'act' => $this->faker->word,
            'data' => $this->faker->text,
            'datemod' => $this->faker->dateTime,
            'handle' => $this->faker->word,
        ];
    }
}
