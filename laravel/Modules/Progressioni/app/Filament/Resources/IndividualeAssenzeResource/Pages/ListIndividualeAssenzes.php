<?php

namespace Modules\Performance\Filament\Resources\IndividualeAssenzeResource\Pages;

use Filament\Actions;
use Filament\Tables;
use Filament\Tables\Columns;
use Filament\Tables\Filters;
use Modules\Performance\Filament\Resources\IndividualeAssenzeResource;
use Modules\Xot\Filament\Resources\Pages\XotBaseListRecords;

class ListIndividualeAssenzes extends XotBaseListRecords
{
    protected static string $resource = IndividualeAssenzeResource::class;

    public function getListTableColumns(): array
    {
        return [
            'tipo' => Columns\TextColumn::make('tipo')
                ->numeric()
                ->sortable(),
            'codice' => Columns\TextColumn::make('codice')
                ->numeric()
                ->sortable(),
            'descr' => Columns\TextColumn::make('descr')
                ->searchable()
                ->wrap(),
            'anno' => Columns\TextColumn::make('anno')
                ->numeric()
                ->sortable(),
            'created_at' => Columns\TextColumn::make('created_at')
                ->dateTime()
                ->sortable()
                ->toggleable(isToggledHiddenByDefault: true),
            'updated_at' => Columns\TextColumn::make('updated_at')
                ->dateTime()
                ->sortable()
                ->toggleable(isToggledHiddenByDefault: true),
        ];
    }

    public function getTableFilters(): array
    {
        return [
            'anno' => Filters\SelectFilter::make('anno')
                ->options(function () {
                    $currentYear = (int) date('Y');

                    return [
                        $currentYear => $currentYear,
                        $currentYear - 1 => $currentYear - 1,
                        $currentYear - 2 => $currentYear - 2,
                    ];
                }),
            'tipo' => Filters\SelectFilter::make('tipo')
                ->searchable()
                ->preload(),
            'codice' => Filters\SelectFilter::make('codice')
                ->searchable()
                ->preload(),
        ];
    }

    

    protected function getHeaderActions(): array
    {
        return [
            ...parent::getHeaderActions(),
            \Modules\Ptv\Filament\Actions\Header\CopyFromLastYearAction::make(),
        ];
    }
}
