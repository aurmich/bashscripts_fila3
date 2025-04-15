<?php

declare(strict_types=1);

namespace Modules\Incentivi\Filament\Resources\ProjectResource\Pages;

use Filament\Tables;
use Modules\Incentivi\Filament\Resources\ProjectResource;
use Modules\Xot\Filament\Resources\Pages\XotBaseListRecords;

class ListProjects extends XotBaseListRecords
{
    protected static string $resource = ProjectResource::class;

    public function getListTableColumns(): array
    {
        return [
            Tables\Columns\TextColumn::make('nome')
                ->searchable()
                ->limit(50)
                ->wrap(),
            Tables\Columns\TextColumn::make('tipo')
                ->searchable(),
            // Tables\Columns\TextColumn::make('settore')
            //     ->sortable(),
            Tables\Columns\TextColumn::make('stato')
                ->badge()
                ->sortable(),
            Tables\Columns\TextColumn::make('workgroup.denominazione')
                // ->label('Gruppo di lavoro')
                ->searchable()
                ->toggleable()
                ->sortable(),
            Tables\Columns\TextColumn::make('data_aggiudicazione')
                ->dateTime('D, d M Y')
                ->sortable()
                ->toggleable(isToggledHiddenByDefault: true),
            Tables\Columns\TextColumn::make('data_inizio_esecuzione')
                ->dateTime('D, d M Y')
                ->sortable()
                ->toggleable(isToggledHiddenByDefault: true),
            Tables\Columns\TextColumn::make('data_fine_esecuzione')
                ->dateTime('D, d M Y')
                ->sortable()
                ->toggleable(isToggledHiddenByDefault: true),
            // Tables\Columns\TextColumn::make('oggetto')
            //     ->searchable()
            //     ->limit(30),
            Tables\Columns\TextColumn::make('determina')
                ->searchable()
                ->toggleable(isToggledHiddenByDefault: true),
            Tables\Columns\TextColumn::make('percentuale_fondo')
                ->searchable()
            // ->label('% fondo')
            ,
            Tables\Columns\TextColumn::make('importo_totale')
                ->money('EUR')
                ->searchable(),
            Tables\Columns\TextColumn::make('importo_effettivo_fondo')
                ->money('EUR')
                ->searchable(),
            Tables\Columns\TextColumn::make('componente_incentivante')
                ->money('EUR')
                ->searchable(),
            Tables\Columns\TextColumn::make('componente_innovazione')
                ->money('EUR')
                ->searchable(),
            Tables\Columns\TextColumn::make('created_at')
                ->dateTime()
                ->sortable()
                ->toggleable(isToggledHiddenByDefault: true),
            Tables\Columns\TextColumn::make('updated_at')
                ->dateTime()
                ->sortable()
                ->toggleable(isToggledHiddenByDefault: true),
        ];
    }
}
