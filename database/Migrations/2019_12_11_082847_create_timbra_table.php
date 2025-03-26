<?php

declare(strict_types=1);

use Illuminate\Database\Schema\Blueprint;
use Modules\Xot\Database\Migrations\XotBaseMigration;

/**
 * Class CreateTimbraTable.
 */
class CreateTimbraTable extends XotBaseMigration
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
                $table->text('field0')->nullable();
                $table->text('field1')->nullable();
                $table->text('field2')->nullable();
                $table->text('field3')->nullable();
                $table->text('field4')->nullable();
                $table->text('field5')->nullable();
                $table->string('field6', 50)->nullable();
                $table->text('field7')->nullable();
                $table->text('field8')->nullable();
                $table->text('field9')->nullable();
                $table->text('field10')->nullable();
                $table->text('field11')->nullable();
                $table->text('field12')->nullable();
                $table->text('field13')->nullable();
                $table->text('field14')->nullable();
                $table->text('field15')->nullable();
                $table->text('field16')->nullable();
                $table->text('field17')->nullable();
                $table->text('field18')->nullable();
                $table->text('field19')->nullable();
                $table->text('field20')->nullable();
                $table->text('field21')->nullable();
                $table->text('field22')->nullable();
                $table->text('field23')->nullable();
                $table->text('field24')->nullable();
                $table->text('field25')->nullable();
                $table->text('field26')->nullable();
                $table->text('field27')->nullable();
                $table->text('field28')->nullable();
                $table->text('field29')->nullable();
                $table->text('field30')->nullable();
                $table->text('field31')->nullable();
                $table->text('field32')->nullable();
                $table->text('field33')->nullable();
                $table->text('field34')->nullable();
                $table->text('field35')->nullable();
                $table->text('field36')->nullable();
                $table->text('field37')->nullable();
                $table->text('field38')->nullable();
                $table->text('field39')->nullable();
                $table->text('field40')->nullable();
                $table->text('field41')->nullable();
                $table->text('field42')->nullable();
                $table->text('field43')->nullable();
                $table->text('field44')->nullable();
                $table->text('field45')->nullable();
                $table->text('field46')->nullable();
                $table->text('field47')->nullable();
                $table->text('field48')->nullable();
                $table->text('field49')->nullable();
                $table->text('field50')->nullable();
                $table->text('field51')->nullable();
                $table->text('field52')->nullable();
                $table->text('field53')->nullable();
                $table->text('field54')->nullable();
            });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::drop('timbra');
    }
}
