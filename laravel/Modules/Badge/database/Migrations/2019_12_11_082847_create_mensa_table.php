<?php

declare(strict_types=1);

use Illuminate\Database\Schema\Blueprint;
use Modules\Xot\Database\Migrations\XotBaseMigration;

/**
 * Class CreateMensaTable.
 */
class CreateMensaTable extends XotBaseMigration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // -- CREATE --
        $this->tableCreate(
            static function (Blueprint $table): void {
                $table->integer('id', true);
                $table->integer('ente')->nullable();
                $table->integer('matr')->nullable();
                $table->string('conome', 100)->nullable();
                $table->string('nome', 100)->nullable();
                $table->integer('propro')->nullable();
                $table->integer('posfun')->nullable();
                $table->integer('stabi')->nullable();
                $table->integer('repar')->nullable();
                $table->integer('data')->nullable();
                $table->integer('ora')->nullable();
                $table->integer('tipo')->nullable();
                $table->text('note')->nullable();
            });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::drop('mensa');
    }
}
