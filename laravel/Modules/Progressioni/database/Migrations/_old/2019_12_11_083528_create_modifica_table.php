<?php

declare(strict_types=1);

use Illuminate\Database\Schema\Blueprint;
use Modules\Xot\Database\Migrations\XotBaseMigration;

/**
 * Class CreateModificaTable.
 */
class CreateModificaTable extends XotBaseMigration
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
                $table->text('matricola')->nullable();
                $table->text('propro')->nullable();
                $table->text('posfun')->nullable();
                $table->text('conc')->nullable();
                $table->text('posizione_economica')->nullable();
                $table->text('progressione_1_1_2006')->nullable();
                $table->text('partecipano')->nullable();
                $table->text('giorni')->nullable();
                $table->text('punteggioanz')->nullable();
            });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::drop('modifica');
    }
}
