<?php

<<<<<<< HEAD
namespace Modules\Progressioni\Filament\Resources\MyLogResource\Pages;

use Filament\Actions;
use Modules\Progressioni\Filament\Resources\MyLogResource;
=======
namespace Modules\Performance\Filament\Resources\MyLogResource\Pages;

use Filament\Actions\CreateAction;
use Filament\Tables\Columns;
use Filament\Tables\Filters;
use Filament\Tables\Actions;
use Modules\Performance\Filament\Resources\MyLogResource;
>>>>>>> 961ad402 (first)
use Modules\Xot\Filament\Resources\Pages\XotBaseListRecords;

class ListMyLogs extends XotBaseListRecords
{
    protected static string $resource = MyLogResource::class;

    protected function getHeaderActions(): array
    {
        return [
<<<<<<< HEAD
            Actions\CreateAction::make(),
=======
            'create' => CreateAction::make(),
>>>>>>> 961ad402 (first)
        ];
    }

    public function getListTableColumns(): array
    {
        return [
<<<<<<< HEAD
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
=======
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
>>>>>>> 961ad402 (first)
        ];
    }
}
