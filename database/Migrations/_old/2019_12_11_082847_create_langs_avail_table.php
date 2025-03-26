<?php

declare(strict_types=1);

use Illuminate\Database\Schema\Blueprint;
use Modules\Xot\Database\Migrations\XotBaseMigration;

/**
 * Class CreateLangsAvailTable.
 */
class CreateLangsAvailTable extends XotBaseMigration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('langs_avail', static function (Blueprint $table): void {
            $table->string('id', 10)->unique('langs_avail_id_index');
            $table->string('name', 200)->nullable();
            $table->text('meta')->nullable();
            $table->string('error_text', 250)->nullable();
            $table->string('encoding', 16)->default('iso-8859-1');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::drop('langs_avail');
    }
}
