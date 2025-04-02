<?php

declare(strict_types=1);

use Illuminate\Database\Schema\Blueprint;
use Modules\Xot\Database\Migrations\XotBaseMigration;

/**
 * Class CreatePianoazionipositiveTable.
 */
class CreatePianoazionipositiveTable extends XotBaseMigration
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
                $table->integer('ente')->nullable()->index('ente');
                $table->integer('matr')->nullable()->index('matr');
                $table->string('cognome', 50)->nullable();
                $table->string('nome', 50)->nullable();
                $table->string('sesso', 2)->nullable();
                $table->integer('tipo')->nullable();
                $table->string('tipo_txt', 250)->nullable();
                $table->string('descr', 250)->nullable();
                $table->integer('cont')->nullable();
                $table->integer('propro')->nullable();
                $table->integer('posfun')->nullable();
                $table->string('despro', 50)->nullable();
                $table->integer('posiz')->nullable();
                $table->string('posiz_txt', 150)->nullable();
                $table->integer('propro_cur')->nullable();
                $table->integer('posfun_cur')->nullable();
                $table->string('despro_cur', 50)->nullable();
                $table->integer('posiz_cur')->nullable();
                $table->string('posiz_cur_txt', 150)->nullable();
                $table->integer('dal')->nullable();
                $table->integer('al')->nullable();
                $table->string('oree', 50)->nullable();
                $table->string('oret', 50)->nullable();
                $table->integer('giorni')->nullable();
                $table->integer('lustri')->nullable();
            });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::drop('pianoazionipositive');
    }
}
