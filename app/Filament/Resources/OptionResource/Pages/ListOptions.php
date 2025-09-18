<?php

namespace Modules\Performance\Filament\Resources\OptionResource\Pages;

use Filament\Actions;
use Filament\Tables;
use Modules\Performance\Filament\Resources\OptionResource;
use Modules\Xot\Filament\Resources\Pages\XotBaseListRecords;

class ListOptions extends XotBaseListRecords
{
    protected static string $resource = OptionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
            \Modules\Ptv\Filament\Actions\Header\CopyFromLastYearAction::make(),
        ];
    }

    public function getListTableColumns(): array
    {
        return [
            'post_type' => Tables\Columns\TextColumn::make('post_type')
                ->searchable()
                ->sortable(),
            'post_id' => Tables\Columns\TextColumn::make('post_id')
                ->numeric()
                ->sortable(),
            'meta_key' => Tables\Columns\TextColumn::make('meta_key')
                ->searchable()
                ->sortable(),
            'meta_value' => Tables\Columns\TextColumn::make('meta_value')
                ->searchable()
                ->wrap()
                ->limit(50),
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
}
