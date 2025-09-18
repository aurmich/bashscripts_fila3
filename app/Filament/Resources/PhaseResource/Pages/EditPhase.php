<?php

namespace Modules\Incentivi\Filament\Resources\PhaseResource\Pages;

use Modules\Incentivi\Filament\Resources\PhaseResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPhase extends \Modules\Xot\Filament\Resources\Pages\XotBaseEditRecord
{
    protected static string $resource = PhaseResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    public function getBreadcrumbs(): array
    {
        $phase_name = strval($this->record->getAttribute('name'));
        $project = $this->record->project;
        $project_name = $project ? $project->nome : '';

        return [
            url('incentivi/admin/projects') => 'Progetti',
            url('incentivi/admin/projects/'.$this->record->project_id.'/edit') => $project_name,
            url('incentivi/admin/projects/'.$this->record->project_id.'/activities') => 'Fasi',
            url('incentivi/admin/activities/'.$this->record->id.'/edit') => $phase_name,
            url('incentivi/admin/activities/'.$this->record->id.'/edit#') => 'Modifica',
        ];
    }

}
