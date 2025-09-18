<?php

declare(strict_types=1);

namespace Modules\Incentivi\Filament\Resources\EmployeeResource\Pages;

use Filament\Tables;
use Modules\Incentivi\Filament\Resources\EmployeeResource;
use Modules\Incentivi\Filament\Resources\EmployeeResource\Actions\UploadEmpoyeesAction;
use Modules\Xot\Filament\Resources\Pages\XotBaseListRecords;

class ListEmployees extends XotBaseListRecords
{
    protected static string $resource = EmployeeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            // ...parent::getHeaderActions(),
            UploadEmpoyeesAction::make('Carica/Aggiorna Dipendenti'),
        ];
    }

    public function getListTableColumns(): array
    {
        return [
            Tables\Columns\TextColumn::make('matricola')
                ->searchable()
                ->sortable(),
            Tables\Columns\TextColumn::make('cognome')
                ->searchable()
                ->sortable(),
            Tables\Columns\TextColumn::make('nome')
                ->searchable()
                ->sortable(),
            Tables\Columns\TextColumn::make('tipologia'),
            Tables\Columns\TextColumn::make('sesso'),
            Tables\Columns\TextColumn::make('codice_fiscale'),
            Tables\Columns\TextColumn::make('posizione_inail'),
        ];
    }

    /**
     * Undocumented function.
     *
     * @return array<Tables\Actions\Action|Tables\Actions\ActionGroup>
     */
    public function getTableActions(): array
    {
        return [
            // ...parent::getTableActions(),
        ];
    }
}
