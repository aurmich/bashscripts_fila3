<?php

declare(strict_types=1);

use Illuminate\Database\Schema\Blueprint;
use Modules\Xot\Database\Migrations\XotBaseMigration;

/**
 * Class CreatePianoazionipositiveCompressoTable.
 */
class CreatePianoazionipositiveCompressoTable extends XotBaseMigration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pianoazionipositive_compresso', static function (Blueprint $table): void {
            $table->integer('id', true);
            $table->integer('ente')->nullable();
            $table->integer('matr')->nullable();
            $table->string('cognome', 50)->nullable();
            $table->string('nome', 50)->nullable();
            $table->string('sesso', 2)->nullable();
            $table->integer('propro_cur')->nullable();
            $table->integer('posfun_cur')->nullable();
            $table->string('despro_cur', 50)->nullable();
            $table->integer('tot_giorni')->nullable();
            $table->string('anni', 50)->nullable();
            $table->integer('anni_int')->nullable();
            $table->integer('lustri')->nullable();
            $table->string('casella', 50)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::drop('pianoazionipositive_compresso');
    }
}
