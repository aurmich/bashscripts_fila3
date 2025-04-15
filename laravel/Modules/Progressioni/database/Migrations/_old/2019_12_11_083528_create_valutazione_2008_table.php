<?php

declare(strict_types=1);

use Illuminate\Database\Schema\Blueprint;
use Modules\Xot\Database\Migrations\XotBaseMigration;

/**
 * Class CreateValutazione2008Table.
 */
class CreateValutazione2008Table extends XotBaseMigration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('valutazione_2008', static function (Blueprint $table): void {
            $table->increments('id');
            $table->integer('ente')->nullable();
            $table->integer('matr')->nullable();
            $table->string('cognome', 100)->nullable();
            $table->string('nome', 100)->nullable();
            $table->string('tipco', 50)->nullable();
            $table->string('rapp', 50)->nullable();
            $table->string('ruolo', 50)->nullable();
            $table->string('propro', 50)->nullable();
            $table->string('posfun', 50)->nullable();
            $table->string('posiz', 50)->nullable();
            $table->string('despro', 50)->nullable();
            $table->string('lista_stabi', 50)->nullable();
            $table->string('giorni_altro_ente_fascia', 50)->nullable();
            $table->string('giorni_altro_ente_nofascia', 50)->nullable();
            $table->string('giorni_altro_ente_tot', 50)->nullable();
            $table->string('giorni_altro_fascia_24mesi', 50)->nullable();
            $table->string('giorni_questo_ente_fascia', 50)->nullable();
            $table->string('giorni_questo_ente_nofascia', 50)->nullable();
            $table->string('giorni_questo_ente_tot', 50)->nullable();
            $table->string('giorni_fascia_24mesi', 50)->nullable();
            $table->string('giorni_aspettativa_fascia', 50)->nullable();
            $table->string('giorni_aspettativa_nofascia', 50)->nullable();
            $table->string('giorni_aspettativa_tot', 50)->nullable();
            $table->string('giorni_aspettativa_24mesi', 50)->nullable();
            $table->string('anno', 50)->nullable();
            $table->string('ha_diritto', 50)->nullable();
            $table->string('motivo_escluso', 250)->nullable();
            $table->string('giorni_ponderati', 50)->nullable();
            $table->string('categoria', 50)->nullable();
            $table->string('max_giorni', 50)->nullable();
            $table->string('punteggio', 50)->nullable();
            $table->index(['ente', 'matr'], 'ente_matr');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::drop('valutazione_2008');
    }
}
