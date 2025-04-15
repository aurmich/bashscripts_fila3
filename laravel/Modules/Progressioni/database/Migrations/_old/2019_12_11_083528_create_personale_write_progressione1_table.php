<?php

declare(strict_types=1);

use Illuminate\Database\Schema\Blueprint;
use Modules\Xot\Database\Migrations\XotBaseMigration;

/**
 * Class CreatePersonaleWriteProgressione1Table.
 */
class CreatePersonaleWriteProgressione1Table extends XotBaseMigration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('personale_write_progressione1', static function (Blueprint $table): void {
            $table->integer('id', true);
            $table->string('matr', 250)->nullable();
            $table->string('conome', 250)->nullable();
            $table->string('nome', 250)->nullable();
            $table->text('mindidecorrenza_dal')->nullable();
            $table->text('sommadigiorni_totali')->nullable();
            $table->text('ptime')->nullable();
            $table->text('descrizione_del_settore')->nullable();
            $table->text('cat')->nullable();
            $table->text('posizione_economica')->nullable();
            $table->text('al_giorno')->nullable();
            $table->text('cdr_di_convenzione')->nullable();
            $table->text('esperienza_acquisita')->nullable();
            $table->text('risultati_ottenuti')->nullable();
            $table->text('arricchimento_professionale')->nullable();
            $table->text('impegno')->nullable();
            $table->text('qualita_della_prestazione')->nullable();
            $table->text('propro')->nullable();
            $table->text('posfun')->nullable();
            $table->text('a')->nullable();
            $table->text('peso_a')->nullable();
            $table->text('peso_r')->nullable();
            $table->text('peso_a_p')->nullable();
            $table->text('peso_i')->nullable();
            $table->text('peso_q')->nullable();
            $table->text('dirigente')->nullable();
            $table->text('percorso_da')->nullable();
            $table->text('percorso_a')->nullable();
            $table->text('password')->nullable();
            $table->text('contatore')->nullable();
            $table->text('esp1')->nullable();
            $table->text('esp2')->nullable();
            $table->text('esp3')->nullable();
            $table->text('esp4')->nullable();
            $table->text('esp5')->nullable();
            $table->text('esp6')->nullable();
            $table->text('motivoesclusione')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::drop('personale_write_progressione1');
    }
}
