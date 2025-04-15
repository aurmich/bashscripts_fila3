<?php

declare(strict_types=1);

use Illuminate\Database\Schema\Blueprint;
use Modules\Xot\Database\Migrations\XotBaseMigration;

/**
 * Class CreatePesoTable.
 */
class CreatePesoTable extends XotBaseMigration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // -- CREATE --
        $this->tableCreate(
            static function (Blueprint $table): void {
                $table->increments('id');
                $table->string('lista_propro', 250)->nullable();
                $table->string('descr', 50)->nullable();
                $table->integer('peso_esperienza_acquisita')->nullable();
                $table->integer('peso_risultati_ottenuti')->nullable();
                $table->integer('peso_arricchimento_professionale')->nullable();
                $table->integer('peso_impegno')->nullable();
                $table->integer('peso_qualita_prestazione')->nullable();
                $table->integer('anno')->nullable();
            });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::drop('peso');
    }
}
