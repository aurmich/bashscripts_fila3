<?php

declare(strict_types=1);

use Illuminate\Database\Schema\Blueprint;
use Modules\Xot\Database\Migrations\XotBaseMigration;

/**
 * Class CreateStipendioTabellareOldTable.
 */
class CreateStipendioTabellareOldTable extends XotBaseMigration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('stipendio_tabellare_old', static function (Blueprint $table): void {
            $table->increments('id');
            $table->string('liv_categoria', 250)->nullable();
            $table->string('stip010106', 250)->nullable();
            $table->string('stip010207', 250)->nullable();
            $table->string('stip_01_04_2008', 250)->nullable();
            $table->string('stip_01_07_2008', 250)->nullable();
            $table->string('stip_01_01_2009', 250)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::drop('stipendio_tabellare_old');
    }
}
