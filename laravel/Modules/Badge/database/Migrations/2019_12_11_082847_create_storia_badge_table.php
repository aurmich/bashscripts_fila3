<?php

declare(strict_types=1);

use Illuminate\Database\Schema\Blueprint;
use Modules\Xot\Database\Migrations\XotBaseMigration;

/**
 * Class CreateStoriaBadgeTable.
 */
class CreateStoriaBadgeTable extends XotBaseMigration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        $this->tableCreate(
            static function (Blueprint $table): void {
                $table->integer('id', true);
                $table->integer('ente')->nullable();
                $table->integer('matricola')->nullable();
                $table->string('cognome', 150)->nullable();
                $table->string('nome', 150)->nullable();
                $table->string('badge', 150)->nullable();
                $table->date('data')->nullable();
                $table->text('note')->nullable();
                $table->integer('last_stato')->nullable();
                $table->string('handle', 50)->nullable();
                $table->dateTime('datemod')->nullable();
            });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::drop('storia_badge');
    }
}
