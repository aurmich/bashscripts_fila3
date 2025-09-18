<?php

declare(strict_types=1);

use Illuminate\Database\Schema\Blueprint;
use Modules\Performance\Models\IndividualeCatCoeff as MyModel;
use Modules\Xot\Database\Migrations\XotBaseMigration;

class CreateIndividualeCatCoeffsTable extends XotBaseMigration
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
                // Schema::connection('performance')->create('individuale_cat_coeffs', function (Blueprint $table) {
                $table->increments('id');
                $table->string('lista_propro', 250)->nullable();
                $table->decimal('coeff', 10, 3)->nullable();
                $table->text('descr')->nullable();
                $table->decimal('tot_giorni', 20, 5)->nullable();
                $table->decimal('tot_giorni_pt', 20, 5)->nullable();
                $table->decimal('tot_giorni_pt_coeff', 20, 5)->nullable();
                $table->decimal('quota_teorica', 20, 5)->nullable();
                $table->integer('anno')->nullable();
                $table->timestamps();
                $table->string('created_by', 50)->nullable();
                $table->string('updated_by', 50)->nullable();
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
        Schema::connection('performance')->drop('individuale_cat_coeffs');
    }
}
