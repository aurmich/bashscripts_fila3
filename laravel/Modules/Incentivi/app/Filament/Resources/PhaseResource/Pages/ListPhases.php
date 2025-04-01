<?php

namespace Modules\Incentivi\Filament\Resources\PhaseResource\Pages;

use Modules\Incentivi\Filament\Resources\PhaseResource;
use Filament\Actions;
use Filament\Tables;
use Filament\Resources\Pages\ListRecords;
use Modules\Xot\Filament\Resources\Pages\XotBaseListRecords;

class ListPhases extends XotBaseListRecords
{
    protected static string $resource = PhaseResource::class;

    public function getListTableColumns(): array {
        return [
            'name' =>
                Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->sortable(),
            'description' =>
                Tables\Columns\TextColumn::make('description')
                    ->searchable()
                    ->sortable(),
            'start_date' =>
                Tables\Columns\TextColumn::make('start_date')
                    ->searchable()
                    ->sortable(),
            'end_date' =>
                Tables\Columns\TextColumn::make('end_date')
                    ->searchable()
                    ->sortable(),
            'settlement' => 
                Tables\Columns\TextColumn::make('settlement.denominazione')
            ];
    }

}
