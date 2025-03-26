<?php

declare(strict_types=1);

use Illuminate\Database\Schema\Blueprint;
use Modules\Xot\Database\Migrations\XotBaseMigration;

/**
 * Class CreateSpecialtypetableTable.
 */
class CreateSpecialtypetableTable extends XotBaseMigration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('_specialtypetable', static function (Blueprint $table): void {
            $table->integer('id', true);
            $table->string('tablename', 250)->nullable();
            $table->string('fieldname', 250)->nullable();
            $table->string('fieldtype', 250)->nullable();
            $table->text('fieldoptions')->nullable();
            $table->text('fieldattributes')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::drop('_specialtypetable');
    }
}
