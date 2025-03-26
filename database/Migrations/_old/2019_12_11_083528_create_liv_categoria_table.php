<?php

declare(strict_types=1);

use Illuminate\Database\Schema\Blueprint;
use Modules\Xot\Database\Migrations\XotBaseMigration;

/**
 * Class CreateLivCategoriaTable.
 */
class CreateLivCategoriaTable extends XotBaseMigration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('liv_categoria', static function (Blueprint $table): void {
            $table->increments('id');
            $table->string('lista_propro', 250)->nullable();
            $table->string('nome', 250)->nullable();
            $table->integer('aventi_diritto')->nullable();
            $table->string('aventi_diritto_perc', 250)->nullable();
            $table->string('cat_succ', 250)->nullable();
            $table->integer('ordine')->unsigned()->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::drop('liv_categoria');
    }
}
