<?php

declare(strict_types=1);

use Illuminate\Database\Schema\Blueprint;
use Modules\Xot\Database\Migrations\XotBaseMigration;

/**
 * Class CreateValutazioneEdit2010Table.
 */
class CreateValutazioneEdit2010Table extends XotBaseMigration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('valutazione_edit_2010', static function (Blueprint $table): void {
            $table->increments('id');
            $table->integer('ente')->nullable();
            $table->integer('matr')->nullable();
            $table->string('cognome', 200)->nullable();
            $table->string('nome', 200)->nullable();
            $table->string('categoria', 5)->nullable();
            $table->integer('propro')->unsigned()->nullable();
            $table->integer('posfun')->unsigned()->nullable();
            $table->integer('stabi')->nullable();
            $table->string('giorni_stabi', 50)->nullable();
            $table->string('esperienza_acquisita', 50)->nullable();
            $table->string('risultati_ottenuti', 50)->nullable();
            $table->string('arricchimento_professionale', 50)->nullable();
            $table->string('impegno', 50)->nullable();
            $table->string('qualita_prestazione', 50)->nullable();
            $table->string('punteggio_finale', 50)->nullable();
            $table->string('email', 100)->nullable();
            $table->dateTime('datemod')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::drop('valutazione_edit_2010');
    }
}
