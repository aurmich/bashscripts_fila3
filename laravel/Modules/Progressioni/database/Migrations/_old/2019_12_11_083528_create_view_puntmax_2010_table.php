<?php

declare(strict_types=1);

use Illuminate\Database\Schema\Blueprint;
use Modules\Xot\Database\Migrations\XotBaseMigration;

/**
 * Class CreateViewPuntmax2010Table.
 */
class CreateViewPuntmax2010Table extends XotBaseMigration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('view_puntmax_2010', static function (Blueprint $table): void {
            $table->string('categoria', 250)->nullable();
            $table->string('lista_propro', 250)->nullable();
            $table->integer('posfun')->unsigned()->nullable();
            $table->float('mass', 10, 0)->nullable();
            $table->bigInteger('quanti')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::drop('view_puntmax_2010');
    }
}
