<?php

declare(strict_types=1);

use Illuminate\Database\Schema\Blueprint;
use Modules\Xot\Database\Migrations\XotBaseMigration;

/**
 * Class CreateCoeffProgressioneTable.
 */
class CreateCoeffProgressioneTable extends XotBaseMigration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('coeff_progressione', static function (Blueprint $table): void {
            $table->integer('id', true);
            $table->string('name', 50)->nullable();
            $table->decimal('value', 10, 3)->nullable();
            $table->integer('anno')->nullable();
            $table->timestamps();
            $table->string('updated_by')->nullable();
            $table->string('created_by')->nullable();
            $table->softDeletes();
            $table->string('deleted_by')->nullable();
            $table->string('deleted_ip')->nullable();
            $table->string('created_ip')->nullable();
            $table->string('updated_ip')->nullable();
            $table->string('guid')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::drop('coeff_progressione');
    }
}
