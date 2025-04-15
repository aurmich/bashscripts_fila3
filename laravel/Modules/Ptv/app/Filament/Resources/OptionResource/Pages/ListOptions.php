<?php

namespace Modules\Ptv\Filament\Resources\OptionResource\Pages;

use Filament\Tables;
use Filament\Actions;
use Modules\Ptv\Enums\WorkerType;
use Modules\Performance\Models\Option;
use Filament\Tables\Filters\SelectFilter;
use Modules\Ptv\Filament\Resources\OptionResource;
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
                Tables\Columns\TextColumn::make('id')
                    ->numeric()
                    ->sortable(),
                /*
                Tables\Columns\TextInputColumn::make('parent_id')
                    ->type('number')
                    ->sortable(),
                */
                Tables\Columns\SelectColumn::make('parent_id')->options(function ($record) {
                    $opts = Option::where('year', $record->year)
                        ->where('option_type', $record->option_type)
                        ->where('name', $record->name)
                        ->where('id', '!=', $record->getKey())
                        ->where('value', '!=', '')
                        ->get()
                        ->mapWithKeys(function ($item) {
                            $k = $item->id;
                            $v = $item->id.' ]'.$item->value;

                            return [$k => $v];
                        })
                        ->concat([null => 'Root'])
                        ->toArray();

                    return $opts;
                }),
                Tables\Columns\TextColumn::make('option_type')
                    ->searchable(),
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('value')
                    ->searchable()
                    ->wrap(),
                Tables\Columns\TextColumn::make('txt')
                    ->searchable()
                    ->wrap()
                    ->html(),
                Tables\Columns\TextColumn::make('txt1')
                    ->searchable()
                    ->wrap()
                    ->html(),
                /*
                Tables\Columns\TextColumn::make('option_id')
                    ->numeric()
                    ->sortable(),
                */
                /*
                Tables\Columns\TextColumn::make('pos')
                    ->numeric()
                    ->sortable(),
                */
                Tables\Columns\TextColumn::make('year')
                    ->numeric()
                    ->sortable(),
            ];
    }

    public function getTableFilters(): array{
        return [
            SelectFilter::make('year')
                    ->options(function () {
                        $currentYear = (int) date('Y');

                        return [
                            $currentYear => $currentYear,
                            $currentYear - 1 => $currentYear - 1,
                            $currentYear - 2 => $currentYear - 2,
                        ];
                    }),
                SelectFilter::make('option_type')
                    ->options(WorkerType::class),
                ];
        
    }
}
