<?php

declare(strict_types=1);

namespace Modules\Incentivi\Filament\Resources\SettlementResource\Pages;

use Filament\Tables;
use Modules\Incentivi\Filament\Resources\SettlementResource;
use Modules\Xot\Filament\Resources\Pages\XotBaseListRecords;

class ListSettlements extends XotBaseListRecords
{
    protected static string $resource = SettlementResource::class;

    public function getListTableColumns(): array
    {
        return [
            Tables\Columns\TextColumn::make('denominazione')
                // ->label('Denominazione')
                ->searchable(),
            Tables\Columns\TextColumn::make('project.nome')
                // ->label('Progetto')
                ->sortable(),
            Tables\Columns\TextColumn::make('tipologia')
                // ->label('Tipo di liquidazione')
                ->searchable(),
            Tables\Columns\TextColumn::make('created_at')
                // ->label('Creata')
                ->dateTime()
                ->sortable(),
            Tables\Columns\TextColumn::make('updated_at')
            // ->label('Aggiornata')
                ->dateTime()
                ->sortable(),
        ];
    }
}
