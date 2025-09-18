<?php

declare(strict_types=1);

namespace Modules\Progressioni\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Model;
use Modules\Progressioni\Models\Schede;

class SchedeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var class-string<Model>
     */
    protected $model = Schede::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'ente' => $this->faker->randomNumber,
            'matr' => $this->faker->randomNumber,
            'stabi' => $this->faker->randomNumber,
            'repar' => $this->faker->randomNumber,
            'anno' => $this->faker->randomNumber,
            'cognome' => $this->faker->word,
            'nome' => $this->faker->word,
            'categoria_eco' => $this->faker->word,
            'categoria_ecoval' => $this->faker->word,
            'email' => $this->faker->email,
            'esperienza_acquisita' => $this->faker->randomFloat,
            'risultati_ottenuti' => $this->faker->randomFloat,
            'arricchimento_professionale' => $this->faker->randomFloat,
            'impegno' => $this->faker->randomFloat,
            'qualita_prestazione' => $this->faker->randomFloat,
            'totale' => $this->faker->randomFloat,
            'totale_pond' => $this->faker->randomFloat,
            'vincitore' => $this->faker->randomNumber,
            'gg_cateco_posfun' => $this->faker->randomNumber,
            'gg_cateco_posfun_no_asz' => $this->faker->randomNumber,
            'gg_in_sede' => $this->faker->randomNumber,
            'gg_presenza_anno' => $this->faker->randomNumber,
            'gg_assenza_anno' => $this->faker->randomNumber,
            'gg_fuori_sede' => $this->faker->randomNumber,
            'gg_posiz_1_in_sede' => $this->faker->randomNumber,
            'gg_cateco_fuori_sede' => $this->faker->randomNumber,
            'gg_cateco_in_sede' => $this->faker->randomNumber,
            'gg_cateco_posfun_fuori_sede' => $this->faker->randomNumber,
            'gg_cateco_posfun_in_sede' => $this->faker->randomNumber,
            'gg_cateco_posfun_in_sede_no_asz' => $this->faker->randomNumber,
            'gg_asz_cateco_posfun_fuori_sede' => $this->faker->randomNumber,
            'gg_asz_cateco_posfun_in_sede' => $this->faker->randomNumber,
            'gg_anno' => $this->faker->randomNumber,
            'gg_asz_tip_cod_escluso_subito' => $this->faker->randomNumber,
            'gg_aspettative_pond_fuori_sede' => $this->faker->randomFloat,
            'gg_aspettative_pond_in_sede' => $this->faker->randomFloat,
            'ptime' => $this->faker->randomFloat,
            'costo_fascia_up' => $this->faker->randomFloat,
            'peso_perf_ind_media' => $this->faker->randomFloat,
            'perf_ind_media' => $this->faker->randomFloat,
            'titolo_di_studio' => $this->faker->word,
            'punt_progressione' => $this->faker->randomNumber,
            'punt_progressione_finale' => $this->faker->randomFloat,
            'valutatore_id' => $this->faker->integer,
            'benificiario_progressione' => $this->faker->boolean,
            'rep2kd' => $this->faker->randomNumber,
            'rep2ka' => $this->faker->randomNumber,
            'propro' => $this->faker->randomNumber,
            'posfun' => $this->faker->randomNumber,
            'posiz' => $this->faker->randomNumber,
            'disci1' => $this->faker->randomNumber,
            'qua2kd' => $this->faker->randomNumber,
            'qua2ka' => $this->faker->randomNumber,
            'dal' => $this->faker->randomNumber,
            'al' => $this->faker->randomNumber,
            'excellences_count_last_3_years' => $this->faker->randomNumber,
            'valore_differenziale_rapportato_pt' => $this->faker->randomFloat,
        ];
    }
}
