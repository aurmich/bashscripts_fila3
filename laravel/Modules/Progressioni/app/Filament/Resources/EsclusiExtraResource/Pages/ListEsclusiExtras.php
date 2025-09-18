<?php

namespace Modules\Progressioni\Filament\Resources\EsclusiExtraResource\Pages;

use Filament\Actions;
use Illuminate\Support\Arr;
use Modules\Progressioni\Filament\Resources\EsclusiExtraResource;
use Modules\Progressioni\Models\EsclusiExtra;
use Modules\Xot\Actions\Filament\Actions\CopyFromLastYearButton;
use Modules\Xot\Filament\Resources\Pages\XotBaseListRecords;

class ListEsclusiExtras extends XotBaseListRecords
{
    protected static string $resource = EsclusiExtraResource::class;

    protected function getHeaderActions(): array
    {
        $anno = Arr::get($this->tableFilters, 'anno.value');

        return [
            Actions\CreateAction::make(),
            app(CopyFromLastYearButton::class)
                ->execute(EsclusiExtra::class, 'anno', $anno),
        ];
    }

    public function getListTableColumns(): array
    {
        return [
            'id' => Tables\Columns\TextColumn::make('id')
                ->sortable(),
            'ente' => Tables\Columns\TextColumn::make('ente')
                ->searchable()
                ->sortable(),
            'matr' => Tables\Columns\TextColumn::make('matr')
                ->numeric()
                ->sortable(),
            'cognome' => Tables\Columns\TextColumn::make('cognome')
                ->searchable()
                ->sortable(),
            'nome' => Tables\Columns\TextColumn::make('nome')
                ->searchable()
                ->sortable(),
            'motivo' => Tables\Columns\TextColumn::make('motivo')
                ->searchable()
                ->sortable(),
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
                ->toggleable(isToggledHiddenByDefault: true)
        ];
    }
}
