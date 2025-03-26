<?php

namespace Modules\Progressioni\Filament\Resources\PesiResource\Pages;

use Filament\Actions;
use Illuminate\Support\Arr;
use Modules\Progressioni\Filament\Resources\PesiResource;
use Modules\Progressioni\Models\Pesi;
use Modules\Xot\Actions\Filament\Actions\CopyFromLastYearButton;
use Modules\Xot\Filament\Resources\Pages\XotBaseListRecords;

class ListPesis extends XotBaseListRecords
{
    protected static string $resource = PesiResource::class;

    protected function getHeaderActions(): array
    {
        $anno = Arr::get($this->tableFilters, 'anno.value');

        return [
            Actions\CreateAction::make(),
            app(CopyFromLastYearButton::class)
                ->execute(Pesi::class, 'anno', $anno),
        ];
    }

    public function getListTableColumns(): array
    {
        return [
            'id' => Tables\Columns\TextColumn::make('id')
                ->sortable(),
            'lista_propro' => Tables\Columns\TextColumn::make('lista_propro')
                ->searchable()
                ->sortable(),
            'descr' => Tables\Columns\TextColumn::make('descr')
                ->searchable()
                ->sortable(),
            'peso_esperienza_acquisita' => Tables\Columns\TextColumn::make('peso_esperienza_acquisita')
                ->numeric()
                ->sortable(),
            'peso_risultati_ottenuti' => Tables\Columns\TextColumn::make('peso_risultati_ottenuti')
                ->numeric()
                ->sortable(),
            'peso_arricchimento_professionale' => Tables\Columns\TextColumn::make('peso_arricchimento_professionale')
                ->numeric()
                ->sortable(),
            'peso_impegno' => Tables\Columns\TextColumn::make('peso_impegno')
                ->numeric()
                ->sortable(),
            'peso_qualita_prestazione' => Tables\Columns\TextColumn::make('peso_qualita_prestazione')
                ->numeric()
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
