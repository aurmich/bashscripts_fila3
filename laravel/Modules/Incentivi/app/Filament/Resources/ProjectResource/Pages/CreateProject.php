<?php

namespace Modules\Incentivi\Filament\Resources\ProjectResource\Pages;

use Filament\Resources\Pages\CreateRecord;
use Modules\Incentivi\Filament\Resources\ProjectResource;
use Modules\Incentivi\Models\Activity;
use Modules\Incentivi\Models\DefaultActivity;

class CreateProject extends CreateRecord
{
    protected static string $resource = ProjectResource::class;

    protected function afterCreate(): void
    {
        $project = $this->getRecord();
        // dd($project);

        if ($project === null) {
            return;
        }

        $listaDefaultActivity = DefaultActivity::where('tipo', $project->tipo)->get();
        // dd($listaDefaultActivity);

        $importo_effettivo_fondo = (float) $project->importo_effettivo_fondo;

        foreach ($listaDefaultActivity as $activity) {
            Activity::create([
                'nome' => $activity->nome,
                'tipo' => $activity->tipo,
                'quota_percentuale' => $activity->quota_percentuale,
                'importo' => $importo_effettivo_fondo * ($activity->quota_percentuale / 100),
                'anno_competenza' => $activity->anno_competenza,
                'project_id' => $project->id,
            ]);
        }
    }
}
