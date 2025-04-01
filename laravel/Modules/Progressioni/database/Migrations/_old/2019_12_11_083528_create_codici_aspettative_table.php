<?php

declare(strict_types=1);

use Illuminate\Database\Schema\Blueprint;
use Modules\Xot\Database\Migrations\XotBaseMigration;

/**
 * Class CreateCodiciAspettativeTable.
 */
class CreateCodiciAspettativeTable extends XotBaseMigration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('codici_aspettative', static function (Blueprint $table): void {
            $table->increments('id');
            $table->integer('tipo')->nullable();
            $table->integer('codice')->nullable();
            $table->string('descr', 250)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::drop('codici_aspettative');
    }
}
