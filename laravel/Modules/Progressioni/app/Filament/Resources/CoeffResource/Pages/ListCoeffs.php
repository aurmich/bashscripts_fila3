<?php

namespace Modules\Progressioni\Filament\Resources\CoeffResource\Pages;

use Filament\Actions;
use Illuminate\Support\Arr;
use Modules\Progressioni\Filament\Resources\CoeffResource;
use Modules\Progressioni\Models\Coeff;
use Modules\Xot\Actions\Filament\Actions\CopyFromLastYearButton;
use Modules\Xot\Filament\Resources\Pages\XotBaseListRecords;

class ListCoeffs extends XotBaseListRecords
{
    protected static string $resource = CoeffResource::class;

    protected function getHeaderActions(): array
    {
        $anno = Arr::get($this->tableFilters, 'anno.value');

        return [
            Actions\CreateAction::make(),
            app(CopyFromLastYearButton::class)
                ->execute(Coeff::class, 'anno', $anno),
        ];
    }

    public function getListTableColumns(): array
    {
        return [
            'cateco' => Tables\Columns\TextColumn::make('cateco')
                ->searchable()
                ->sortable(),
            'posfun' => Tables\Columns\TextColumn::make('posfun')
                ->searchable()
                ->sortable(),
            'coeff' => Tables\Columns\TextColumn::make('coeff')
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
                ->toggleable(isToggledHiddenByDefault: true),
        ];
    }
}
