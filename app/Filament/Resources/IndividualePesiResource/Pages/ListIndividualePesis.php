<?php

namespace Modules\Performance\Filament\Resources\IndividualePesiResource\Pages;

use Filament\Actions\CreateAction;
use Filament\Tables\Columns;
use Filament\Tables\Filters;
use Filament\Tables\Actions;
use Modules\Performance\Filament\Resources\IndividualePesiResource;
use Modules\Ptv\Filament\Actions\Header\CopyFromLastYearAction;
use Modules\Xot\Filament\Resources\Pages\XotBaseListRecords;

class ListIndividualePesis extends XotBaseListRecords
{
    protected static string $resource = IndividualePesiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            'create' => CreateAction::make(),
            'copy' => CopyFromLastYearAction::make(),
        ];
    }

    public function getListTableColumns(): array
    {
        return [
            'name' => Columns\TextColumn::make('name')
                ->label('Nome')
                ->searchable()
                ->sortable(),
            'field_name' => Columns\TextColumn::make('field_name')
                ->label('Campo')
                ->searchable()
                ->sortable(),
            'op' => Columns\TextColumn::make('op')
                ->label('Operatore')
                ->searchable()
                ->sortable(),
            'value' => Columns\TextColumn::make('value')
                ->label('Valore')
                ->searchable()
                ->sortable(),
            'anno' => Columns\TextColumn::make('anno')
                ->label('Anno')
                ->numeric()
                ->sortable(),
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
        ];
    }
}
