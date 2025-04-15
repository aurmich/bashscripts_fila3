<?php

use Illuminate\Database\Schema\Blueprint;
use Modules\Incentivi\Models\ActivityEmployee;
use Modules\Xot\Database\Migrations\XotBaseMigration;

return new class extends XotBaseMigration
{
    protected ?string $model_class = ActivityEmployee::class;

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // -- CREATE --
        $this->tableCreate(
            function (Blueprint $table): void {
                $table->id();
                $table->foreignId('activity_id')->constrained('activities')->onDelete('cascade');
                $table->foreignId('employee_id')->constrained('employees')->onDelete('cascade');
                $table->foreignId('project_id')->nullable()->constrained();
                $table->integer('percentuale_attivita_dipendente');
                $table->decimal('importo_attivita_dipendente');
                $table->unique(['activity_id', 'employee_id', 'project_id']);
            });

        // -- UPDATE --
        $this->tableUpdate(
            function (Blueprint $table): void {
                // if (! $this->hasColumn('percentuale_attivita_dipendente')) {
                //     $table->integer('percentuale_attivita_dipendente');
                // }
                // if (! $this->hasColumn('importo_attivita_dipendente')) {
                //     $table->decimal('importo_attivita_dipendente');
                // }
                // if ($this->hasColumn('importo_dipendente_attivita')) {
                //     $table->dropColumn('importo_dipendente_attivita');
                // }
                $this->updateTimestamps($table);
            }
        );
    }
};
