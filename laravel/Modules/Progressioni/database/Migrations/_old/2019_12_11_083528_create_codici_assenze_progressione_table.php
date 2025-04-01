<?php

declare(strict_types=1);

use Illuminate\Database\Schema\Blueprint;
use Modules\Xot\Database\Migrations\XotBaseMigration;

/**
 * Class CreateCodiciAssenzeProgressioneTable.
 */
class CreateCodiciAssenzeProgressioneTable extends XotBaseMigration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('codici_assenze_progressione', static function (Blueprint $table): void {
            $table->increments('id');
            $table->integer('tipo')->nullable()->index('tipo');
            $table->integer('codice')->nullable()->index('codice');
            $table->string('descr', 250)->nullable();
            $table->integer('anno')->nullable()->index('anno');
            $table->string('umi', 2)->nullable();
            $table->string('dur', 50)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::drop('codici_assenze_progressione');
    }
}
