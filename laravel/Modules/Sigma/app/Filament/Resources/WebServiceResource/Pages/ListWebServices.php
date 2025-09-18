<?php

namespace Modules\Sigma\Filament\Resources\WebServiceResource\Pages;

use Filament\Actions;
use Filament\Tables;
use Modules\Sigma\Filament\Resources\WebServiceResource;
use Modules\Xot\Filament\Resources\Pages\XotBaseListRecords;

class ListWebServices extends XotBaseListRecords
{
    protected static string $resource = WebServiceResource::class;

    public function getListTableColumns(): array
    {
        return [
            'id' => Tables\Columns\TextColumn::make('id')
                ->sortable(),
            'name' => Tables\Columns\TextColumn::make('name')
                ->searchable()
                ->sortable(),
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

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
