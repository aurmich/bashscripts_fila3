<?php

declare(strict_types=1);

use Illuminate\Database\Schema\Blueprint;
use Modules\Xot\Database\Migrations\XotBaseMigration;

/**
 * Class CreateEsclusiProgressioneTable.
 */
class CreateEsclusiProgressioneTable extends XotBaseMigration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('esclusi_progressione', static function (Blueprint $table): void {
            $table->increments('id');
            $table->integer('ente')->unsigned()->nullable();
            $table->integer('matr')->unsigned()->nullable();
            $table->string('cognome', 50)->nullable();
            $table->string('nome', 50)->nullable();
            $table->text('motivo')->nullable();
            $table->integer('anno')->nullable()->index();
            $table->timestamps();
            $table->string('created_by')->nullable();
            $table->string('updated_by')->nullable();
            $table->softDeletes();
            $table->string('deleted_by')->nullable();
            $table->string('deleted_ip')->nullable();
            $table->string('created_ip')->nullable();
            $table->string('updated_ip')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::drop('esclusi_progressione');
    }
}
