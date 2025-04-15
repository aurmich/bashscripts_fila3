<?php

declare(strict_types=1);

use Illuminate\Database\Schema\Blueprint;
use Modules\Xot\Database\Migrations\XotBaseMigration;

/**
 * Class CreateEsclusi2010Table.
 */
class CreateEsclusi2010Table extends XotBaseMigration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('esclusi_2010', static function (Blueprint $table): void {
            $table->increments('id');
            $table->integer('ente')->unsigned()->nullable();
            $table->integer('matr')->unsigned()->nullable();
            $table->text('note')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::drop('esclusi_2010');
    }
}
