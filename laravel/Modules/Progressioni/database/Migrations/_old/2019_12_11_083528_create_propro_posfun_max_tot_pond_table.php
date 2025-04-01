<?php

declare(strict_types=1);

use Illuminate\Database\Schema\Blueprint;
use Modules\Xot\Database\Migrations\XotBaseMigration;

/**
 * Class CreateProproPosfunMaxTotPondTable.
 */
class CreateProproPosfunMaxTotPondTable extends XotBaseMigration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('propro_posfun_max_tot_pond', static function (Blueprint $table): void {
            $table->integer('id', true);
            $table->integer('propro')->nullable();
            $table->string('posfun', 1)->nullable();
            $table->integer('anno');
            $table->decimal('max_gg_tot_pond', 10);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::drop('propro_posfun_max_tot_pond');
    }
}
