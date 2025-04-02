<?php

declare(strict_types=1);

namespace Modules\Progressioni\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Model;
use Modules\Progressioni\Models\Progressioni;

class ProgressioniFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var class-string<Model>
     */
    protected $model = Progressioni::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'ente' => $this->faker->randomNumber,
            'matr' => $this->faker->randomNumber,
            'cognome' => $this->faker->word,
            'nome' => $this->faker->word,
            'propro' => $this->faker->randomNumber,
            'posfun' => $this->faker->randomNumber,
            'posiz' => $this->faker->randomNumber,
            'categoria_eco' => $this->faker->word,
            'categoria_ecoval' => $this->faker->word,
            'posfunval' => $this->faker->randomNumber,
            'stabi' => $this->faker->randomNumber,
            'repar' => $this->faker->randomNumber,
            'anno' => $this->faker->randomNumber,
            'email' => $this->faker->email,
            'esperienza_acquisita' => $this->faker->randomFloat,
            'risultati_ottenuti' => $this->faker->randomFloat,
            'arricchimento_professionale' => $this->faker->randomFloat,
            'impegno' => $this->faker->randomFloat,
            'qualita_prestazione' => $this->faker->randomFloat,
            'totale' => $this->faker->randomFloat,
            'totale_pond' => $this->faker->randomFloat,
            'ha_diritto' => $this->faker->randomNumber,
            'motivo' => $this->faker->word,
            'rep2kd' => $this->faker->randomNumber,
            'rep2ka' => $this->faker->randomNumber,
            'qua2kd' => $this->faker->randomNumber,
            'qua2ka' => $this->faker->randomNumber,
            'disci1' => $this->faker->randomNumber,
            'dal' => $this->faker->randomNumber,
            'al' => $this->faker->randomNumber,
            'valutatore_id' => $this->faker->integer,
            'perf_ind_media' => $this->faker->randomFloat,
            'punt_progressione' => $this->faker->randomNumber,
            'punt_progressione_finale' => $this->faker->randomFloat,
            'benificiario_progressione' => $this->faker->boolean,
            'excellences_count_last_3_years' => $this->faker->randomNumber,
            'posiz_txt' => $this->faker->word,
            'clafun' => $this->faker->randomNumber,
            'stabi_txt' => $this->faker->word,
            'repar_txt' => $this->faker->word,
            'stabival' => $this->faker->randomNumber,
            'reparval' => $this->faker->randomNumber,
            'indir' => $this->faker->word,
            'gg_in_sede' => $this->faker->randomNumber,
            'n_gg_in_sede' => $this->faker->randomNumber,
            'gg_fuori_sede' => $this->faker->randomNumber,
            'n_gg_fuori_sede' => $this->faker->randomNumber,
            'gg_aspettative_in_sede' => $this->faker->randomNumber,
            'gg_aspettative_fuori_sede' => $this->faker->randomNumber,
            'gg_posiz_1_in_sede' => $this->faker->randomNumber,
            'gg_presenza_anno' => $this->faker->randomNumber,
            'gg_assenza_anno' => $this->faker->randomNumber,
            'gg_asz_tip_cod_escluso_subito' => $this->faker->randomNumber,
            'gg_anno' => $this->faker->randomNumber,
            'gg_cateco_posfun' => $this->faker->randomNumber,
            'rep003' => $this->faker->randomNumber,
            'disci1_txt' => $this->faker->word,
            'gg' => $this->faker->randomNumber,
            'peso_esperienza_acquisita' => $this->faker->randomFloat,
            'peso_risultati_ottenuti' => $this->faker->randomFloat,
            'peso_arricchimento_professionale' => $this->faker->randomFloat,
            'peso_impegno' => $this->faker->randomFloat,
            'peso_qualita_prestazione' => $this->faker->randomFloat,
            'gg_aspettative_pond_in_sede' => $this->faker->randomFloat,
            'gg_aspettative_pond_fuori_sede' => $this->faker->randomFloat,
            'gg_cateco_in_sede' => $this->faker->randomNumber,
            'gg_cateco_fuori_sede' => $this->faker->randomNumber,
            'gg_cateco_posfun_in_sede' => $this->faker->randomNumber,
            'gg_cateco_posfun_fuori_sede' => $this->faker->randomNumber,
            'gg_cateco_no_posfun_in_sede' => $this->faker->randomNumber,
            'gg_cateco_no_posfun_fuori_sede' => $this->faker->randomNumber,
            'gg_no_cateco_in_sede' => $this->faker->randomNumber,
            'gg_no_cateco_fuori_sede' => $this->faker->randomNumber,
            'gg_no_cateco_posfun_in_sede' => $this->faker->randomNumber,
            'gg_no_cateco_posfun_fuori_sede' => $this->faker->randomNumber,
            'gg_asz_cateco_posfun_in_sede' => $this->faker->randomNumber,
            'gg_asz_cateco_posfun_fuori_sede' => $this->faker->randomNumber,
            'gg_tot_pond' => $this->faker->randomFloat,
            'asz2ka' => $this->faker->randomNumber,
            'gg_presenze_in_anno' => $this->faker->randomNumber,
            'gg_assenze_in_anno' => $this->faker->randomNumber,
            'ore_assenze_in_anno' => $this->faker->randomNumber,
            'vincitore' => $this->faker->randomNumber,
            'perf_ind_2015' => $this->faker->randomFloat,
            'perf_ind_2016' => $this->faker->randomFloat,
            'perf_ind_2017' => $this->faker->randomFloat,
            'perf_ind_2018' => $this->faker->randomFloat,
            'perf_ind_2014' => $this->faker->randomFloat,
            'peso_perf_ind_media' => $this->faker->randomFloat,
            'risultato' => $this->faker->randomFloat,
            'ptime' => $this->faker->randomFloat,
            'costo_fascia_up' => $this->faker->randomFloat,
            'titolo_di_studio' => $this->faker->word,
            'gg_cateco_posfun_no_asz' => $this->faker->randomNumber,
            'perf_ind_2019' => $this->faker->randomFloat,
            'gg_cateco_posfun_in_sede_no_asz' => $this->faker->randomNumber,
            'perf_ind_2020' => $this->faker->randomFloat,
            'gg_cateco_sup_in_sede' => $this->faker->randomNumber,
            'gg_asz' => $this->faker->randomFloat,
            'hh_asz' => $this->faker->randomFloat,
            'eta' => $this->faker->randomFloat,
            'gg_in_sede_no_asz' => $this->faker->randomNumber,
            'scheda_type' => $this->faker->word,
            'post_type' => $this->faker->word,
        ];
    }
}
