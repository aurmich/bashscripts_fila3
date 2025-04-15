<?php

namespace Modules\Performance\Filament\Resources\PerformanceFondoResource\Pages;

use Filament\Actions\CreateAction;
use Filament\Tables\Columns;
use Filament\Tables\Filters;
use Filament\Tables\Actions;
use Modules\Performance\Filament\Resources\PerformanceFondoResource;
use Modules\Ptv\Filament\Actions\Header\CopyFromLastYearAction;
use Modules\Xot\Filament\Resources\Pages\XotBaseListRecords;

class ListPerformanceFondos extends XotBaseListRecords
{
    protected static string $resource = PerformanceFondoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            'create' => CreateAction::make(),
            'copy_from_last_year' => CopyFromLastYearAction::make(),
        ];
    }

    public function getListTableColumns(): array
    {
        return [
            'quota_individuale' => Columns\TextColumn::make('quota_individuale')
                ->label('Quota Individuale')
                ->numeric()
                ->sortable(),
            'quota_organizzativa' => Columns\TextColumn::make('quota_organizzativa')
                ->label('Quota Organizzativa')
                ->numeric()
                ->sortable(),
            'anno' => Columns\TextColumn::make('anno')
                ->label('Anno')
                ->numeric()
                ->sortable(),
            'note' => Columns\TextColumn::make('note')
                ->label('Note')
                ->searchable()
                ->sortable()
                ->wrap(),
            'created_at' => Columns\TextColumn::make('created_at')
                ->label('Data Creazione')
                ->dateTime()
                ->sortable()
                ->toggleable(isToggledHiddenByDefault: true),
            'updated_at' => Columns\TextColumn::make('updated_at')
                ->label('Ultima Modifica')
                ->dateTime()
                ->sortable()
                ->toggleable(isToggledHiddenByDefault: true),
            'created_by' => Columns\TextColumn::make('created_by')
                ->label('Creato da')
                ->searchable()
                ->sortable()
                ->toggleable(isToggledHiddenByDefault: true),
            'updated_by' => Columns\TextColumn::make('updated_by')
                ->label('Modificato da')
                ->searchable()
                ->sortable()
                ->toggleable(isToggledHiddenByDefault: true),
        ];
    }
}
