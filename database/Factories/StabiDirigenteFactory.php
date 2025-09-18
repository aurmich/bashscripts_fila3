<?php

declare(strict_types=1);

<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
namespace Modules\IndennitaCondizioniLavoro\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Model;
use Modules\IndennitaCondizioniLavoro\Models\StabiDirigente;
=======
namespace Modules\IndennitaResponsabilita\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Model;
use Modules\IndennitaResponsabilita\Models\StabiDirigente;
>>>>>>> e0005d7d (first)
=======
namespace Modules\Progressioni\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Model;
use Modules\Progressioni\Models\StabiDirigente;
>>>>>>> bcab6efe (first)
=======
namespace Modules\Ptv\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Model;
use Modules\Ptv\Models\StabiDirigente;
>>>>>>> dc18abbe (first)

class StabiDirigenteFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var class-string<Model>
     */
    protected $model = StabiDirigente::class;

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
            'stabi' => $this->faker->randomNumber(),
            'repar' => $this->faker->randomNumber(),
            'nome_stabi' => $this->faker->word,
            'ente' => $this->faker->randomNumber(),
            'matr' => $this->faker->randomNumber(),
            'nome_diri' => $this->faker->word,
            'nome_diri_plus' => $this->faker->word,
            'budget' => $this->faker->randomFloat,
            'valutatore_id' => $this->faker->randomNumber(),
            'anno' => $this->faker->randomNumber(),
<<<<<<< HEAD
=======
            'stabi' => $this->faker->randomNumber,
            'repar' => $this->faker->randomNumber,
            'nome_stabi' => $this->faker->word,
            'ente' => $this->faker->randomNumber,
            'matr' => $this->faker->randomNumber,
            'nome_diri' => $this->faker->word,
            'nome_diri_plus' => $this->faker->word,
            'budget' => $this->faker->randomFloat,
            'valutatore_id' => $this->faker->integer,
            'anno' => $this->faker->randomNumber,
>>>>>>> bcab6efe (first)
=======
>>>>>>> dc18abbe (first)
        ];
    }
}
