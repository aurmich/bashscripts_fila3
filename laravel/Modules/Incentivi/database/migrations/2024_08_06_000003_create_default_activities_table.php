<?php

use Illuminate\Database\Schema\Blueprint;
use Modules\Incentivi\Models\DefaultActivity;
use Modules\Incentivi\Models\Phase;
use Modules\Xot\Database\Migrations\XotBaseMigration;

return new class extends XotBaseMigration
{
    protected ?string $model_class = DefaultActivity::class;

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
                $table->string('tipo');
                $table->integer('quota_percentuale');
                $table->integer('importo')->default(null)->nullable();
                $table->string('anno_competenza');
                $table->timestamps();
            });

        // -- UPDATE --
        $this->tableUpdate(
            function (Blueprint $table): void {
                if (! $this->hasColumn('phase_id')) {
                    $table->foreignIdFor(Phase::class, 'phase_id')->nullable();
                }
                $this->updateTimestamps($table);
            }
        );
    }
};
