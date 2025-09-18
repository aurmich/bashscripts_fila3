<?php

namespace Modules\Performance\Filament\Resources\IndividualeDecurtazioneAssenzeResource\Pages;

use Filament\Actions;
use Filament\Tables;
use Modules\Performance\Filament\Resources\IndividualeDecurtazioneAssenzeResource;
use Modules\Xot\Filament\Resources\Pages\XotBaseListRecords;

class ListIndividualeDecurtazioneAssenzes extends XotBaseListRecords
{
    protected static string $resource = IndividualeDecurtazioneAssenzeResource::class;

    public function getListTableColumns(): array
    {
        return [
            'id' => Tables\Columns\TextColumn::make('id')
                ->sortable(),
            'anno' => Tables\Columns\TextColumn::make('anno')
                ->sortable()
                ->searchable(),
            'individuale_id' => Tables\Columns\TextColumn::make('individuale.nome')
                ->sortable()
                ->searchable(),
            'decurtazione' => Tables\Columns\TextColumn::make('decurtazione')
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
            \Modules\Ptv\Filament\Actions\Header\CopyFromLastYearAction::make(),
        ];
    }
}
