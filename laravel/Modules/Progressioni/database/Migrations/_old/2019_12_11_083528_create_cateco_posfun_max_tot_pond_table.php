<?php

declare(strict_types=1);

use Illuminate\Database\Schema\Blueprint;
use Modules\Xot\Database\Migrations\XotBaseMigration;

/**
 * Class CreateCatecoPosfunMaxTotPondTable.
 */
class CreateCatecoPosfunMaxTotPondTable extends XotBaseMigration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('cateco_posfun_max_tot_pond', static function (Blueprint $table): void {
            $table->integer('id', true);
            $table->string('cateco', 50)->nullable();
            $table->string('posfun', 1)->nullable();
            $table->integer('anno');
            $table->decimal('max_gg_tot_pond', 10);
            $table->integer('aventi_diritto');
            $table->integer('aventi_diritto_perc');
            $table->integer('aventi_diritto_eff');
            $table->timestamps();
            $table->char('created_by', 50)->nullable();
            $table->char('updated_by', 50)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::drop('cateco_posfun_max_tot_pond');
    }
}
