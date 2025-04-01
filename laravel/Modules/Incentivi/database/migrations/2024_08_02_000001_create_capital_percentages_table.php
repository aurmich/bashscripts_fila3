<?php

use Illuminate\Database\Schema\Blueprint;
use Modules\Incentivi\Models\CapitalPercentage;
use Modules\Xot\Database\Migrations\XotBaseMigration;

return new class extends XotBaseMigration
{
    protected ?string $model_class = CapitalPercentage::class;

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // -- CREATE --
        $this->tableCreate(
            function (Blueprint $table): void {
                $table->id();
                $table->string('nome');
                $table->string('descrizione');
                $table->decimal('valore');
                $table->timestamps();
            });

        // -- UPDATE --
        $this->tableUpdate(
            function (Blueprint $table): void {
                // if (! $this->hasColumn('email')) {
                //    $table->string('email')->nullable();
                // }
                $this->updateTimestamps($table);
            }
        );
    }
};
