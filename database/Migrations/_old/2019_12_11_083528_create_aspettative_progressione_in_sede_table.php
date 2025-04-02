<?php

declare(strict_types=1);

use Illuminate\Database\Schema\Blueprint;
use Modules\Xot\Database\Migrations\XotBaseMigration;

/**
 * Class CreateAspettativeProgressioneInSedeTable.
 */
class CreateAspettativeProgressioneInSedeTable extends XotBaseMigration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('aspettative_progressione_in_sede', static function (Blueprint $table): void {
            $table->integer('ente');
            $table->integer('matr');
            $table->integer('asztip');
            $table->integer('aszcod');
            $table->integer('asz2kd');
            $table->integer('asz2ka');
            $table->integer('qua2kd');
            $table->integer('qua2ka');
            $table->integer('dal');
            $table->integer('al');
            $table->integer('propro');
            $table->integer('posfun');
            $table->string('categoria_eco', 3);
            $table->integer('propro_val');
            $table->integer('posfun_val');
            $table->string('categoria_eco_val', 3);
            $table->bigInteger('gg');
            $table->decimal('peso', 5);
            $table->decimal('gg_pond', 12);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::drop('aspettative_progressione_in_sede');
    }
}
