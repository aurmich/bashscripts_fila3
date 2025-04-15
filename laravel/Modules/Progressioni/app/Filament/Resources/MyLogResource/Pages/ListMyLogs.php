<?php

namespace Modules\Progressioni\Filament\Resources\MyLogResource\Pages;

use Filament\Actions;
use Modules\Progressioni\Filament\Resources\MyLogResource;
use Modules\Xot\Filament\Resources\Pages\XotBaseListRecords;

class ListMyLogs extends XotBaseListRecords
{
    protected static string $resource = MyLogResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    public function getListTableColumns(): array
    {
        return [
            'id' => Tables\Columns\TextColumn::make('id')
                ->sortable(),
            'id_tbl' => Tables\Columns\TextColumn::make('id_tbl')
                ->numeric()
                ->sortable(),
            'tbl' => Tables\Columns\TextColumn::make('tbl')
                ->searchable()
                ->sortable(),
            'id_approvaz' => Tables\Columns\TextColumn::make('id_approvaz')
                ->numeric()
                ->sortable(),
            'note' => Tables\Columns\TextColumn::make('note')
                ->searchable()
                ->sortable(),
            'obj' => Tables\Columns\TextColumn::make('obj')
                ->searchable()
                ->sortable(),
            'act' => Tables\Columns\TextColumn::make('act')
                ->searchable()
                ->sortable(),
            'datemod' => Tables\Columns\TextColumn::make('datemod')
                ->sortable(),
            'handle' => Tables\Columns\TextColumn::make('handle')
                ->searchable()
                ->sortable(),
            'created_at' => Tables\Columns\TextColumn::make('created_at')
                ->dateTime()
                ->sortable()
                ->toggleable(isToggledHiddenByDefault: true),
            'updated_at' => Tables\Columns\TextColumn::make('updated_at')
                ->dateTime()
                ->sortable()
                ->toggleable(isToggledHiddenByDefault: true)
        ];
    }
}
