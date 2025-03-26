<?php

declare(strict_types=1);

use Illuminate\Database\Schema\Blueprint;
use Modules\Performance\Models\IndividualeDecurtazioneAssenze as MyModel;
use Modules\Xot\Database\Migrations\XotBaseMigration;

class CreatePesoAssenzeTable extends XotBaseMigration
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
                // Schema::connection('performance')->create('peso_assenze', function (Blueprint $table) {
                $table->integer('id', true);
                $table->integer('anno')->nullable();
                $table->timestamps();
                $table->string('created_by', 50)->nullable();
                $table->string('updated_by', 50)->nullable();
                $table->decimal('min_perc', 10, 2)->nullable();
                $table->decimal('max_perc', 10, 2)->nullable();
                $table->decimal('min_gg_365', 10, 2)->nullable();
                $table->decimal('max_gg_365', 10, 2)->nullable();
                $table->decimal('decurtazione_perc', 10, 2)->nullable();
            });

        // -- UPDATE --
        $this->tableUpdate(
            function (Blueprint $table): void {
                if (! $this->hasColumn('updated_at')) {
                    $table->timestamps();
                }
            });
    }
}
