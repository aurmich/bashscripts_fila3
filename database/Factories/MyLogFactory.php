<?php

declare(strict_types=1);

<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
namespace Modules\IndennitaCondizioniLavoro\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Model;
use Modules\IndennitaCondizioniLavoro\Models\MyLog;
=======
namespace Modules\IndennitaResponsabilita\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Model;
use Modules\IndennitaResponsabilita\Models\MyLog;
>>>>>>> e0005d7d (first)
=======
namespace Modules\Progressioni\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Model;
use Modules\Progressioni\Models\MyLog;
>>>>>>> bcab6efe (first)
=======
namespace Modules\Ptv\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Model;
use Modules\Ptv\Models\MyLog;
>>>>>>> dc18abbe (first)

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
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> dc18abbe (first)
            'id' => $this->faker->randomNumber(),
            'id_tbl' => $this->faker->randomNumber(),
            'tbl' => $this->faker->word,
            'id_approvaz' => $this->faker->randomNumber(),
<<<<<<< HEAD
=======
            'id' => $this->faker->randomNumber,
            'id_tbl' => $this->faker->randomNumber,
            'tbl' => $this->faker->word,
            'id_approvaz' => $this->faker->randomNumber,
>>>>>>> bcab6efe (first)
            'note' => $this->faker->text,
            'obj' => $this->faker->word,
=======
            'note' => $this->faker->text,
            'obj' => $this->faker->text,
>>>>>>> dc18abbe (first)
            'act' => $this->faker->word,
            'data' => $this->faker->text,
            'datemod' => $this->faker->dateTime,
            'handle' => $this->faker->word,
        ];
    }
}
