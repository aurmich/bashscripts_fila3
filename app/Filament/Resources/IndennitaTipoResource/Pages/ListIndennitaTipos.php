<?php

namespace Modules\IndennitaCondizioniLavoro\Filament\Resources\IndennitaTipoResource\Pages;

use Filament\Pages\Actions\CreateAction;
use Modules\IndennitaCondizioniLavoro\Filament\Resources\IndennitaTipoResource;
use Modules\Xot\Filament\Resources\Pages\XotBaseListRecords;
use Filament\Tables;

class ListIndennitaTipos extends XotBaseListRecords
{
    protected static string $resource = IndennitaTipoResource::class;


    public function getListTableColumns(): array
    {
        return [
            'id' => Tables\Columns\TextColumn::make('id')
                ->sortable()
                ->searchable(),
            'nome' => Tables\Columns\TextColumn::make('nome')
                ->label('Nome')
                ->sortable()
                ->searchable(),
            'descrizione' => Tables\Columns\TextColumn::make('descrizione')
                ->label('Descrizione')
                ->limit(50)
                ->searchable(),
            'attivo' => Tables\Columns\BooleanColumn::make('attivo')
                ->label('Attivo')
                ->sortable(),
            'updated_at' => Tables\Columns\TextColumn::make('updated_at')
                ->label('Ultima Modifica')
                ->dateTime()
                ->sortable(),
        ];
    }
}
