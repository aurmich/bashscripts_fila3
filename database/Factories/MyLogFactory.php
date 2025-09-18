<?php

declare(strict_types=1);

<<<<<<< HEAD
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
=======
>>>>>>> f3d4311a (Squashed 'laravel/Modules/Progressioni/' content from commit 72d99eef1)
namespace Modules\Progressioni\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Model;
use Modules\Progressioni\Models\MyLog;
<<<<<<< HEAD
>>>>>>> bcab6efe (first)
=======
namespace Modules\Ptv\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Model;
use Modules\Ptv\Models\MyLog;
>>>>>>> dc18abbe (first)
=======
>>>>>>> f3d4311a (Squashed 'laravel/Modules/Progressioni/' content from commit 72d99eef1)

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
<<<<<<< HEAD
=======
>>>>>>> dc18abbe (first)
            'id' => $this->faker->randomNumber(),
            'id_tbl' => $this->faker->randomNumber(),
            'tbl' => $this->faker->word,
            'id_approvaz' => $this->faker->randomNumber(),
<<<<<<< HEAD
=======
=======
>>>>>>> f3d4311a (Squashed 'laravel/Modules/Progressioni/' content from commit 72d99eef1)
            'id' => $this->faker->randomNumber,
            'id_tbl' => $this->faker->randomNumber,
            'tbl' => $this->faker->word,
            'id_approvaz' => $this->faker->randomNumber,
<<<<<<< HEAD
>>>>>>> bcab6efe (first)
            'note' => $this->faker->text,
            'obj' => $this->faker->word,
=======
            'note' => $this->faker->text,
            'obj' => $this->faker->text,
>>>>>>> dc18abbe (first)
=======
            'note' => $this->faker->text,
            'obj' => $this->faker->word,
>>>>>>> f3d4311a (Squashed 'laravel/Modules/Progressioni/' content from commit 72d99eef1)
            'act' => $this->faker->word,
            'data' => $this->faker->text,
            'datemod' => $this->faker->dateTime,
            'handle' => $this->faker->word,
        ];
    }
}
