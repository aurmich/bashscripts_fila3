<?php

declare(strict_types=1);

use Illuminate\Database\Schema\Blueprint;
use Modules\Xot\Database\Migrations\XotBaseMigration;

/**
 * Class CreateMenuTable.
 */
class CreateMenuTable extends XotBaseMigration
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
                $table->integer('id_padre')->default(0);
                $table->integer('id_new')->nullable();
                $table->string('lista_figli', 250)->nullable();
                $table->string('lista_aree', 250)->nullable();
                $table->string('nome', 250)->nullable();
                $table->string('img', 250)->nullable();
                $table->integer('ordine')->nullable();
                $table->string('obj', 250)->nullable();
                $table->string('act', 250)->nullable();
                $table->string('funzione', 250)->nullable();
                $table->text('subtitle')->nullable();
                $table->text('txt')->nullable();
                $table->text('query')->nullable();
                $table->text('order_by')->nullable();
                $table->string('load_tables', 250)->nullable();
                $table->string('fieldstorender', 250)->nullable();
                $table->string('hiddenfields', 250)->nullable();
                $table->string('defaults', 250)->nullable();
                $table->integer('visibility')->nullable();
                $table->text('processed')->nullable();
                $table->text('js_head')->nullable();
                $table->text('js_foot')->nullable();
                $table->integer('id_approvaz')->nullable();
            });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::drop('menu');
    }
}
