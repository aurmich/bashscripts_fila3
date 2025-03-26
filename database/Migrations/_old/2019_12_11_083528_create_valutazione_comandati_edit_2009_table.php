<?php

declare(strict_types=1);

use Illuminate\Database\Schema\Blueprint;
use Modules\Xot\Database\Migrations\XotBaseMigration;

/**
 * Class CreateValutazioneComandatiEdit2009Table.
 */
class CreateValutazioneComandatiEdit2009Table extends XotBaseMigration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('valutazione_comandati_edit_2009', static function (Blueprint $table): void {
            $table->integer('id')->unsigned()->default(0);
            $table->string('ente', 50)->nullable();
            $table->string('matr', 50)->nullable();
            $table->string('cognome', 200)->nullable();
            $table->string('nome', 200)->nullable();
            $table->string('stabi', 50)->nullable();
            $table->string('esperienza_acquisita', 50)->nullable();
            $table->string('risultati_ottenuti', 50)->nullable();
            $table->string('arricchimento_professionale', 50)->nullable();
            $table->string('impegno', 50)->nullable();
            $table->string('qualita_prestazione', 50)->nullable();
            $table->dateTime('datemod')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::drop('valutazione_comandati_edit_2009');
    }
}
