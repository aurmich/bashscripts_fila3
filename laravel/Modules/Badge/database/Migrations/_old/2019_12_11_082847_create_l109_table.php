<?php

declare(strict_types=1);

use Illuminate\Database\Schema\Blueprint;
use Modules\Xot\Database\Migrations\XotBaseMigration;

/**
 * Class CreateL109Table.
 */
class CreateL109Table extends XotBaseMigration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // -- CREATE --
        $this->tableCreate(
            static function (Blueprint $table): void {
                $table->text('ente')->nullable();
                $table->text('matr')->nullable();
                $table->text('cognome')->nullable();
                $table->text('nome')->nullable();
                $table->text('voce_8000')->nullable();
                $table->text('voce_8001')->nullable();
                $table->text('voce_6900')->nullable();
                $table->text('voce_6920')->nullable();
                $table->text('voce_47730')->nullable();
                $table->text('voce_46930')->nullable();
                $table->text('voce_48000')->nullable();
                $table->text('voce_7700')->nullable();
                $table->text('diritto_alla_redistribuzione')->nullable();
                $table->text('voce_7703')->nullable();
                $table->text('controllo')->nullable();
                $table->text('controllo1')->nullable();
                $table->text('recupero')->nullable();
                $table->text('somma_r')->nullable();
                $table->text('diritto_1')->nullable();
                $table->text('skei')->nullable();
            });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::drop('l109');
    }
}
