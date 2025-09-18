<?php

declare(strict_types=1);

namespace Modules\Incentivi\Filament\Resources\WorkgroupResource\Pages;

use Filament\Tables;
use Modules\Incentivi\Filament\Resources\WorkgroupResource;
use Modules\Incentivi\Filament\Resources\WorkgroupResource\Actions\WorkgroupSeederAction;
use Modules\Incentivi\Models\Workgroup;
use Modules\Xot\Filament\Resources\Pages\XotBaseListRecords;

class ListWorkgroups extends XotBaseListRecords
{
    protected static string $resource = WorkgroupResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ...parent::getHeaderActions(),
            WorkgroupSeederAction::make(),
        ];
    }

    /**
     * @return array<string, \Filament\Tables\Columns\Column>
     */
    public function getListTableColumns(): array
    {
        return [
            'denominazione' => Tables\Columns\TextColumn::make('denominazione')
                ->searchable(),
            'employees_cognome' => Tables\Columns\TextColumn::make('employees.cognome')
                ->label('Componenti')
                ->searchable()
                ->placeholder('Nessun componente presente.'),
            'created_at' => Tables\Columns\TextColumn::make('created_at')
                ->dateTime()
                ->sortable()
                ->toggleable(isToggledHiddenByDefault: true),
            'updated_at' => Tables\Columns\TextColumn::make('updated_at')
                ->dateTime()
                ->sortable()
                ->toggleable(isToggledHiddenByDefault: true),
        ];
    }

    /**
     * @return array<string, \Filament\Tables\Actions\Action|\Filament\Tables\Actions\ActionGroup>
     */
    public function getTableActions(): array
    {
        $parentActions = parent::getTableActions();
        
        return [
            ...$parentActions,
            'replicate' => Tables\Actions\ReplicateAction::make()
                ->beforeReplicaSaved(function (Workgroup $replica): void {
                    $replica->denominazione = $replica->denominazione.' (copia)';
                })
                ->modal(false)
                ->tooltip('duplica')
                // ->excludeAttributes(['matricola'])
                ->iconButton(),
        ];
    }
}
