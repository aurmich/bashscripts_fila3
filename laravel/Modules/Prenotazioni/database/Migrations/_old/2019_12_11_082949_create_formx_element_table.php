<?php

declare(strict_types=1);

use Illuminate\Database\Schema\Blueprint;
use Modules\Xot\Database\Migrations\XotBaseMigration;

/**
 * Class CreateFormxElementTable.
 */
class CreateFormxElementTable extends XotBaseMigration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('formx_element', static function (Blueprint $table): void {
            $table->integer('id', true);
            $table->integer('id_form')->nullable();
            $table->string('tipo', 100)->nullable();
            $table->string('nome', 100)->nullable();
            $table->string('label', 100)->nullable();
            $table->text('options')->nullable();
            $table->text('attributes')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::drop('formx_element');
    }
}
