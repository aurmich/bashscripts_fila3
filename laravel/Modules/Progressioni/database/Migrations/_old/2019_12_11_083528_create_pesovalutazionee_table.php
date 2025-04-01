<?php

declare(strict_types=1);

use Illuminate\Database\Schema\Blueprint;
use Modules\Xot\Database\Migrations\XotBaseMigration;

/**
 * Class CreatePesovalutazioneeTable.
 */
class CreatePesovalutazioneeTable extends XotBaseMigration
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
                $table->string('profilo_profssionale', 250)->nullable();
                $table->string('categoria_economica', 250)->nullable();
                $table->string('peso_esperienza_acquisita', 250)->nullable();
                $table->string('peso_risultati_ottenuti', 250)->nullable();
                $table->string('peso_arricchimento_professionale', 250)->nullable();
                $table->string('peso_impegno', 250)->nullable();
                $table->string('peso_qualita_della_prestazione', 250)->nullable();
                $table->string('totale', 250)->nullable();
            });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::drop('pesovalutazionee');
    }
}
