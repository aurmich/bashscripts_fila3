<?php

namespace Modules\Progressioni\Filament\Resources\ValutatoreResource\Pages;

use Filament\Actions;
use Illuminate\Support\Arr;
use Modules\Progressioni\Filament\Resources\ValutatoreResource;
use Modules\Progressioni\Models\Valutatore;
use Modules\Xot\Actions\Filament\Actions\CopyFromLastYearButton;
use Modules\Xot\Filament\Resources\Pages\XotBaseListRecords;

class ListValutatores extends XotBaseListRecords
{
    protected static string $resource = ValutatoreResource::class;

    protected function getHeaderActions(): array
    {
        $anno = Arr::get($this->tableFilters, 'anno.value');

        return [
            Actions\CreateAction::make(),
            app(CopyFromLastYearButton::class)
                ->execute(Valutatore::class, 'anno', $anno),
        ];
    }

    public function getListTableColumns(): array
    {
        return [
            'id' => Tables\Columns\TextColumn::make('id')
                ->sortable(),
            'matr_valutatore' => Tables\Columns\TextColumn::make('matr_valutatore')
                ->numeric()
                ->sortable(),
            'matr_valutato' => Tables\Columns\TextColumn::make('matr_valutato')
                ->numeric()
                ->sortable(),
            'cognome_valutatore' => Tables\Columns\TextColumn::make('cognome_valutatore')
                ->searchable()
                ->sortable(),
            'nome_valutatore' => Tables\Columns\TextColumn::make('nome_valutatore')
                ->searchable()
                ->sortable(),
            'cognome_valutato' => Tables\Columns\TextColumn::make('cognome_valutato')
                ->searchable()
                ->sortable(),
            'nome_valutato' => Tables\Columns\TextColumn::make('nome_valutato')
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
