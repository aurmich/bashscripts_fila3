<?php

declare(strict_types=1);

use Illuminate\Database\Schema\Blueprint;
use Modules\Performance\Models\Organizzativa as MyModel;
use Modules\Xot\Database\Migrations\XotBaseMigration;

class CreatePerformanceOrganizzativaTable extends XotBaseMigration
{
    protected ?string $model_class = MyModel::class;

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // -- CREATE --
        $this->tableCreate(
            static function (Blueprint $table): void {
                // Schema::connection('performance')->create('performance_organizzativa', function (Blueprint $table) {
                $table->integer('id', true);
                $table->integer('ente')->default(0);
                $table->integer('matr')->nullable();
                $table->string('cognome', 250)->nullable();
                $table->string('nome', 250)->nullable();
                $table->string('email', 250)->nullable();
                $table->integer('stabi')->nullable();
                $table->integer('repar')->nullable();
                $table->integer('stabival')->nullable();
                $table->integer('reparval')->nullable();
                $table->string('stabi_txt', 250)->nullable();
                $table->string('repar_txt', 250)->nullable();
                $table->integer('disci')->nullable();
                $table->string('disci_txt', 100)->nullable();
                $table->integer('rep2kd')->nullable();
                $table->integer('rep2ka')->nullable();
                $table->integer('posiz')->nullable();
                $table->integer('propro')->nullable();
                $table->integer('posfun')->nullable();
                $table->string('categoria_eco', 50)->nullable();
                $table->integer('qua2kd')->nullable();
                $table->integer('qua2ka')->nullable();
                $table->integer('dal')->nullable();
                $table->integer('al')->nullable();
                $table->integer('anno')->nullable();
                $table->integer('giornitempodet')->nullable();
                $table->integer('ha_diritto')->nullable();
                $table->string('motivo', 250)->nullable();
                $table->decimal('esperienza_acquisita', 10)->nullable();
                $table->decimal('risultati_ottenuti', 10)->nullable();
                $table->decimal('arricchimento_professionale', 10)->nullable();
                $table->decimal('impegno', 10)->nullable();
                $table->decimal('qualita_prestazione', 10)->nullable();
                $table->decimal('totale_punteggio', 10)->nullable();
                $table->string('lista_auth', 250)->nullable();
                $table->decimal('peso_esperienza_acquisita', 10)->nullable();
                $table->decimal('peso_risultati_ottenuti', 10)->nullable();
                $table->decimal('peso_arricchimento_professionale', 10)->nullable();
                $table->decimal('peso_impegno', 10)->nullable();
                $table->decimal('peso_qualita_prestazione', 10)->nullable();
                $table->dateTime('datemod')->nullable();
                $table->text('note')->nullable();
                $table->decimal('oree', 10)->nullable();
                $table->decimal('oret', 10)->nullable();
                $table->decimal('perc_parttime', 10, 3)->nullable();
                $table->decimal('perc_parttimepond', 10, 3)->nullable();
                $table->integer('gg_parttimevert')->nullable();
                $table->decimal('ore_assenza', 10, 3)->nullable();
                $table->decimal('giorni_assenza', 10)->nullable();
                $table->decimal('giorni_presenza', 10)->nullable();
                $table->decimal('categ_coeff', 15, 5)->nullable();
                $table->decimal('quota_teorica', 15, 5)->nullable();
                $table->decimal('budget_assegnato', 15, 5)->nullable();
                $table->decimal('quota_effettiva', 15, 5)->nullable();
                $table->decimal('resti', 15, 5)->nullable();
                $table->decimal('resti_pond', 15, 5)->nullable();
                $table->decimal('importo_totale', 15, 5)->nullable();
                $table->decimal('gg_totale_sigma', 10)->nullable();
                $table->decimal('gg_validi_sigma', 10)->nullable();
                $table->decimal('gg_assenz_sigma', 10)->nullable();
                $table->decimal('decurtazione_perc', 10)->nullable();
                $table->integer('gg_tempo_determinato')->nullable();
                $table->integer('gg_posiz_1_in_sede')->nullable();
                $table->integer('gg_assenza_anno')->nullable();
                $table->integer('gg_presenza_anno')->nullable();
                $table->integer('gg_ruolo')->nullable();
                $table->date('last_data_assunz')->nullable();
                $table->decimal('ore_assenza_anno', 10)->nullable();
                $table->timestamps();
                $table->string('created_by')->nullable();
                $table->string('updated_by')->nullable();
                $table->string('posiz_txt')->nullable();
                $table->integer('clafun')->nullable();
                $table->integer('disci1')->nullable();
                $table->string('disci1_txt')->nullable();
                $table->integer('gg_assenza_dalal')->nullable();
                $table->decimal('hh_assenza_anno', 10, 3)->nullable();
                $table->decimal('hh_assenza_dalal', 10, 3)->nullable();
                $table->decimal('gg_parttimevert_anno', 10, 3)->nullable();
                $table->decimal('perc_parttimepond_anno', 10, 3)->nullable();
                $table->decimal('perc_parttimepond_dalal', 10, 3)->nullable();
                $table->decimal('gg_parttimevert_dalal', 10, 3)->nullable();
                $table->decimal('gg_presenza_dalal', 10, 3)->nullable();
                $table->decimal('perc_parttime_dalal', 10, 3)->nullable();
                $table->decimal('perc_parttime_anno', 10, 3)->nullable();
            });

        // -- UPDATE --
        $this->tableUpdate(
            function (Blueprint $table): void {
                if (! $this->hasColumn('updated_at')) {
                    $table->timestamps();
                }
            });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::connection('performance')->drop('performance_organizzativa');
    }
}
