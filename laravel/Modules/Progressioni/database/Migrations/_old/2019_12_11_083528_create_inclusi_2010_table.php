<?php

declare(strict_types=1);

use Illuminate\Database\Schema\Blueprint;
use Modules\Xot\Database\Migrations\XotBaseMigration;

/**
 * Class CreateInclusi2010Table.
 */
class CreateInclusi2010Table extends XotBaseMigration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('inclusi_2010', static function (Blueprint $table): void {
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
        Schema::drop('inclusi_2010');
    }
}
