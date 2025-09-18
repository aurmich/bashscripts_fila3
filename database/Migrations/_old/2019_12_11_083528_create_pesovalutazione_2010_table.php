<?php

declare(strict_types=1);

use Illuminate\Database\Schema\Blueprint;
use Modules\Xot\Database\Migrations\XotBaseMigration;

/**
 * Class CreatePesovalutazione2010Table.
 */
class CreatePesovalutazione2010Table extends XotBaseMigration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pesovalutazione_2010', static function (Blueprint $table): void {
            $table->integer('id')->default(0);
            $table->integer('propro')->nullable();
            $table->integer('posfun')->unsigned()->nullable();
            $table->string('categoria_economica', 250)->nullable();
            $table->string('peso_esperienza_acquisita', 250)->nullable();
            $table->string('peso_risultati_ottenuti', 250)->nullable();
            $table->string('peso_arricchimento_professionale', 250)->nullable();
            $table->string('peso_impegno', 250)->nullable();
            $table->string('peso_qualita_prestazione', 250)->nullable();
            $table->string('totale', 250)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::drop('pesovalutazione_2010');
    }
}
