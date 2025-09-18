<?php

namespace Modules\Progressioni\Filament\Resources\StipendioTabellareResource\Pages;

use Filament\Actions;
use Illuminate\Support\Arr;
use Modules\Progressioni\Filament\Resources\StipendioTabellareResource;
use Modules\Progressioni\Models\StipendioTabellare;
use Modules\Xot\Actions\Filament\Actions\CopyFromLastYearButton;
use Modules\Xot\Filament\Resources\Pages\XotBaseListRecords;

class ListStipendioTabellares extends XotBaseListRecords
{
    protected static string $resource = StipendioTabellareResource::class;

    protected function getHeaderActions(): array
    {
        $anno = Arr::get($this->tableFilters, 'anno.value');

        return [
            Actions\CreateAction::make(),
            app(CopyFromLastYearButton::class)
                ->execute(StipendioTabellare::class, 'anno', $anno),
        ];
    }

    public function getListTableColumns(): array
    {
        return [
            'id' => Tables\Columns\TextColumn::make('id')
                ->sortable(),
            'cateco' => Tables\Columns\TextColumn::make('cateco')
                ->searchable()
                ->sortable(),
            'posfun' => Tables\Columns\TextColumn::make('posfun')
                ->searchable()
                ->sortable(),
            'importo' => Tables\Columns\TextColumn::make('importo')
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
