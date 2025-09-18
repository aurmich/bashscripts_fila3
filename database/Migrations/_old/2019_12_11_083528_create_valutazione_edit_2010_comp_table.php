<?php

declare(strict_types=1);

use Illuminate\Database\Schema\Blueprint;
use Modules\Xot\Database\Migrations\XotBaseMigration;

/**
 * Class CreateValutazioneEdit2010CompTable.
 */
class CreateValutazioneEdit2010CompTable extends XotBaseMigration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('valutazione_edit_2010_comp', static function (Blueprint $table): void {
            $table->integer('ente')->nullable();
            $table->integer('matr')->nullable();
            $table->string('cognome', 200)->nullable();
            $table->string('nome', 200)->nullable();
            $table->string('categoria', 5)->nullable();
            $table->integer('propro')->unsigned()->nullable();
            $table->integer('posfun')->unsigned()->nullable();
            $table->float('giorni_stabi', 10, 0)->nullable();
            $table->float('esperienza_acquisita', 10, 0)->nullable();
            $table->float('risultati_ottenuti', 10, 0)->nullable();
            $table->float('arricchimento_professionale', 10, 0)->nullable();
            $table->float('impegno', 10, 0)->nullable();
            $table->float('qualita_prestazione', 10, 0)->nullable();
            $table->float('punteggio_finale', 10, 0)->nullable();
            $table->string('email', 100)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::drop('valutazione_edit_2010_comp');
    }
}
