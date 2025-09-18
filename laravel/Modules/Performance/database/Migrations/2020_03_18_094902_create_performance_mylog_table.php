<?php

declare(strict_types=1);

use Illuminate\Database\Schema\Blueprint;
use Modules\Performance\Models\MyLog as MyModel;
use Modules\Xot\Database\Migrations\XotBaseMigration;

class CreatePerformanceMylogTable extends XotBaseMigration
{
    protected ?string $model_class = MyModel::class;

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // -- CREATE --
        $this->tableCreate(
            static function (Blueprint $table): void {
                // Schema::connection('performance')->create('mylog', function (Blueprint $table) {
                $table->integer('id', true);
                $table->integer('id_tbl')->nullable();
                $table->string('tbl', 50)->nullable();
                $table->integer('id_approvaz')->nullable();
                $table->text('note')->nullable();
                $table->text('data')->nullable();
                $table->dateTime('datemod')->nullable();
                $table->string('handle', 150)->nullable();
                $table->timestamps();
                $table->string('created_by')->nullable();
                $table->string('updated_by')->nullable();
            });

        // -- UPDATE --
        $this->tableUpdate(
            function (Blueprint $table): void {
                if (! $this->hasColumn('updated_at')) {
                    $table->timestamps();
                }
            });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::connection('performance')->drop('mylog');
    }
}
