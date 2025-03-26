<?php

declare(strict_types=1);

use Illuminate\Database\Schema\Blueprint;
use Modules\Xot\Database\Migrations\XotBaseMigration;

/**
 * Class CreateTmpAspettativeTable.
 */
class CreateTmpAspettativeTable extends XotBaseMigration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tmp_aspettative', static function (Blueprint $table): void {
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
            $table->integer('gg');
            $table->decimal('peso', 3);
            $table->decimal('gg_pond', 3);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::drop('tmp_aspettative');
    }
}
