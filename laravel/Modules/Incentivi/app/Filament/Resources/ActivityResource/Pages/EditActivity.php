<?php

declare(strict_types=1);

namespace Modules\Incentivi\Filament\Resources\ActivityResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Modules\Incentivi\Filament\Resources\ActivityResource;
use Modules\Incentivi\Models\Activity;

/**
 * Undocumented class.
 *
 * @property Activity $record
 */
class EditActivity extends \Modules\Xot\Filament\Resources\Pages\XotBaseEditRecord
{
    protected static string $resource = ActivityResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
            // Actions\ViewProjectAction::make(),
        ];
    }

    protected function getRelations(): array
    {
        return [
            // \App\Filament\Resources\ActivityResource\RelationManagers\EmployeesRelationManager::class,
        ];
    }

    /**
     * @return array<string, string>
     */
    public function getBreadcrumbs(): array
    {
        $nome = $this->record->getAttribute('nome');
        $activity_name = is_string($nome) ? $nome : (string)$nome;
        $project = $this->record->project;
        $project_name = '';
        if ($project !== null && isset($project->nome)) {
            // Fix for PHPStan - avoid direct cast from mixed to string
            $nome = $project->nome;
            $project_name = is_string($nome) ? $nome : (is_numeric($nome) || is_bool($nome) ? (string)$nome : '');
        }

        return [
            url('incentivi/admin/projects') => 'Progetti',
            url('incentivi/admin/projects/'.$this->record->project_id.'/edit') => $project_name,
            url('incentivi/admin/projects/'.$this->record->project_id.'/activities') => 'Attività',
            url('incentivi/admin/activities/'.$this->record->id.'/edit') => $activity_name,
            url('incentivi/admin/activities/'.$this->record->id.'/edit#') => 'Modifica',
        ];
    }
}
