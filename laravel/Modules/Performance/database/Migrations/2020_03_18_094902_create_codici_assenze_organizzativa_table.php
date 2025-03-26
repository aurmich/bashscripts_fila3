<?php

declare(strict_types=1);

use Illuminate\Database\Schema\Blueprint;
use Modules\Performance\Models\OrganizzativaAssenze as MyModel;
use Modules\Xot\Database\Migrations\XotBaseMigration;

class CreateCodiciAssenzeOrganizzativaTable extends XotBaseMigration
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
                // Schema::connection('performance')->create('codici_assenze_organizzativa', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('tipo')->nullable();
                $table->integer('codice')->nullable();
                $table->text('descr')->nullable();
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
        Schema::connection('performance')->drop('codici_assenze_organizzativa');
    }
}
