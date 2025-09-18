<?php

namespace Modules\Performance\Filament\Resources\OrganizzativaAssenzeResource\Pages;

use Filament\Actions;
use Filament\Tables;
use Modules\Performance\Filament\Resources\OrganizzativaAssenzeResource;
use Modules\Xot\Filament\Resources\Pages\XotBaseListRecords;

class ListOrganizzativaAssenzes extends XotBaseListRecords
{
    protected static string $resource = OrganizzativaAssenzeResource::class;

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
            'tipo' => Tables\Columns\TextColumn::make('tipo')
                ->numeric()
                ->sortable(),
            'codice' => Tables\Columns\TextColumn::make('codice')
                ->numeric()
                ->sortable(),
            'descr' => Tables\Columns\TextColumn::make('descr')
                ->searchable()
                ->wrap(),
            'anno' => Tables\Columns\TextColumn::make('anno')
                ->numeric()
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
}
