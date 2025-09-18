<?php

declare(strict_types=1);

use Illuminate\Database\Schema\Blueprint;
use Modules\Xot\Database\Migrations\XotBaseMigration;

/**
 * Class CreateTmpTable.
 */
class CreateTmpTable extends XotBaseMigration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // -- CREATE --
        $this->tableCreate(
            static function (Blueprint $table): void {
                $table->integer('id')->default(0);
                $table->string('matricola', 250)->nullable();
                $table->string('cognome', 250)->nullable();
                $table->string('nome', 250)->nullable();
                $table->string('data_nascita', 250)->nullable();
                $table->string('cod_stabilimento', 250)->nullable();
                $table->string('des_stabilimento', 250)->nullable();
                $table->string('cod_reparto', 250)->nullable();
                $table->string('des_reparto', 250)->nullable();
                $table->string('profilo_professionale', 250)->nullable();
                $table->string('liv_categoria', 250)->nullable();
                $table->string('fascia', 250)->nullable();
                $table->string('pos_giuridica', 250)->nullable();
                $table->string('des_pos_giuridica', 250)->nullable();
                $table->string('esperienza_acquisita', 250)->nullable();
                $table->string('risultati_ottenuti', 250)->nullable();
                $table->string('arricchimento_professionale', 250)->nullable();
                $table->string('impegno', 250)->nullable();
                $table->string('qualita_della_prestazione', 250)->nullable();
            });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::drop('tmp');
    }
}
