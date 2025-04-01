<?php

declare(strict_types=1);

use Illuminate\Database\Schema\Blueprint;
use Modules\Incentivi\Models\Project;
use Modules\Xot\Database\Migrations\XotBaseMigration;

return new class extends XotBaseMigration
{
    protected ?string $model_class = Project::class;

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // -- CREATE --
        $this->tableCreate(
            function (Blueprint $table): void {
                $table->id();
                $table->text('nome');
                $table->text('tipo');
                $table->text('stato');
                $table->foreignId('workgroup_id')->constrained('workgroups');
                $table->date('data_aggiudicazione');
                $table->date('data_inizio_esecuzione');
                $table->date('data_fine_esecuzione');
                $table->string('ente_finanziatore');
                $table->text('oggetto');
                $table->string('determina');
                $table->decimal('percentuale_fondo');
                $table->decimal('importo_totale');
                $table->decimal('importo_effettivo_fondo');
                $table->decimal('componente_incentivante');
                $table->decimal('componente_innovazione');
                $table->string('settore');
                $table->timestamps();
            });

        // -- UPDATE --
        $this->tableUpdate(
            function (Blueprint $table): void {
                if ( $this->hasColumn('settore')) {
                    $table->string('settore')->nullable()->change();
                }
                // if (! $this->hasColumn('tipo_liquidazione')) {
                //     $table->string('tipo_liquidazione');
                // }
                
                $this->updateTimestamps($table);
            }
        );
    }
};
