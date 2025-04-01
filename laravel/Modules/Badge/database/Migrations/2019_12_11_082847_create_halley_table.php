<?php

declare(strict_types=1);

use Illuminate\Database\Schema\Blueprint;
use Modules\Xot\Database\Migrations\XotBaseMigration;

/**
 * Class CreateHalleyTable.
 */
class CreateHalleyTable extends XotBaseMigration
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
                $table->string('data', 20)->nullable();
                $table->string('uscita', 3)->nullable();
                $table->integer('matr')->unsigned()->nullable();
                $table->string('ora', 20)->nullable();
            });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::drop('halley');
    }
}
