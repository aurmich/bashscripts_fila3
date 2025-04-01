<?php

declare(strict_types=1);

use Illuminate\Database\Schema\Blueprint;
use Modules\Xot\Database\Migrations\XotBaseMigration;

/**
 * Class CreateCriteriEsclusioneTable.
 */
class CreateCriteriEsclusioneTable extends XotBaseMigration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // -- CREATE --
        $this->tableCreate(
            static function (Blueprint $table): void {
                $table->integer('id', true);
                $table->integer('min_gg_posiz_1_in_sede')->nullable();
                $table->integer('min_gg_propro')->nullable();
                $table->integer('min_gg_propro_posfun')->nullable();
                $table->integer('min_gg_cateco_posfun_no_asz')->nullable();
                $table->integer('min_gg_cateco_posfun_lavorati_in_sede')->nullable();
                $table->integer('min_gg_anno')->nullable();
                $table->string('lista_propro_posfun', 250)->nullable();
                $table->string('lista_propro', 250)->nullable();
                $table->string('lista_posiz', 250)->nullable();
                $table->string('disci', 250)->nullable();
                $table->string('lista_asz_tip_cod_escluso_subito', 100)->nullable();
                $table->integer('min_gg_asz_tip_cod_escluso_subito')->nullable();
                $table->date('presenti_il_giorno')->nullable();
                $table->date('data_presenza_al')->nullable();
                $table->date('data_presenza_dal')->nullable();
                $table->integer('anno')->nullable();
            });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::drop('criteri_esclusione');
    }
}
