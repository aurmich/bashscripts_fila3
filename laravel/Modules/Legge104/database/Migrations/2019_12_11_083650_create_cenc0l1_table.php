<?php

declare(strict_types=1);

use Illuminate\Database\Schema\Blueprint;
use Modules\Xot\Database\Migrations\XotBaseMigration;

/**
 * Class CreateCenc0l1Table.
 */
class CreateCenc0l1Table extends XotBaseMigration
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
                $table->text('ente')->nullable();
                $table->text('ccsta')->nullable();
                $table->text('ccrep')->nullable();
                $table->text('ccsre')->nullable();
                $table->text('ccdes')->nullable();
                $table->text('ccann')->nullable();
            });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::drop('cenc0l1');
    }
}
