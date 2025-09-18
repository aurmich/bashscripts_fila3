<?php

<<<<<<< HEAD
namespace Modules\Progressioni\Filament\Resources\CriteriOptionResource\Pages;

use Filament\Actions;
use Illuminate\Support\Arr;
use Modules\Progressioni\Filament\Resources\CriteriOptionResource;
use Modules\Progressioni\Models\CriteriOption;
use Modules\Xot\Actions\Filament\Actions\CopyFromLastYearButton;
=======
namespace Modules\Performance\Filament\Resources\CriteriOptionResource\Pages;

use Filament\Actions;
use Filament\Tables\Columns;
use Filament\Tables\Filters;
use Modules\Performance\Filament\Resources\CriteriOptionResource;
>>>>>>> 961ad402 (first)
use Modules\Xot\Filament\Resources\Pages\XotBaseListRecords;

class ListCriteriOptions extends XotBaseListRecords
{
    protected static string $resource = CriteriOptionResource::class;

<<<<<<< HEAD
    protected function getHeaderActions(): array
    {
        $anno = Arr::get($this->tableFilters, 'anno.value');

        return [
            Actions\CreateAction::make(),
            app(CopyFromLastYearButton::class)
                ->execute(CriteriOption::class, 'anno', $anno),
        ];
    }

    public function getListTableColumns(): array
    {
        return [
            'id' => Tables\Columns\TextColumn::make('id')
                ->sortable(),
            'name' => Tables\Columns\TextColumn::make('name')
                ->searchable()
                ->sortable(),
            'value' => Tables\Columns\TextColumn::make('value')
                ->searchable()
                ->sortable(),
            'type' => Tables\Columns\TextColumn::make('type')
                ->searchable()
                ->sortable(),
            'anno' => Tables\Columns\TextColumn::make('anno')
                ->numeric()
                ->sortable(),
            'note' => Tables\Columns\TextColumn::make('note')
                ->html()
                ->wrap()
                ->searchable(),
            'created_at' => Tables\Columns\TextColumn::make('created_at')
                ->dateTime()
                ->sortable()
                ->toggleable(isToggledHiddenByDefault: true),
            'updated_at' => Tables\Columns\TextColumn::make('updated_at')
=======
    public function getListTableColumns(): array
    {
        return [
            'name' => Columns\TextColumn::make('name')
                ->label('Nome')
                ->searchable()
                ->sortable(),
            'value' => Columns\TextColumn::make('value')
                ->label('Valore')
                ->searchable()
                ->sortable(),
            'anno' => Columns\TextColumn::make('anno')
                ->label('Anno')
                ->numeric()
                ->sortable(),
            'created_at' => Columns\TextColumn::make('created_at')
                ->label('Data Creazione')
                ->dateTime()
                ->sortable()
                ->toggleable(isToggledHiddenByDefault: true),
            'updated_at' => Columns\TextColumn::make('updated_at')
                ->label('Ultima Modifica')
>>>>>>> 961ad402 (first)
                ->dateTime()
                ->sortable()
                ->toggleable(isToggledHiddenByDefault: true),
        ];
    }
<<<<<<< HEAD
=======

    public function getTableFilters(): array
    {
        return [
            'anno' => Filters\SelectFilter::make('anno')
                ->label('Anno')
                ->options(function () {
                    $currentYear = (int) date('Y');

                    return [
                        $currentYear => $currentYear,
                        $currentYear - 1 => $currentYear - 1,
                        $currentYear - 2 => $currentYear - 2,
                    ];
                }),
        ];
    }

    protected function getHeaderActions(): array
    {
        return [
            'create' => Actions\CreateAction::make(),
            'copy' => \Modules\Ptv\Filament\Actions\Header\CopyFromLastYearAction::make(),
        ];
    }
>>>>>>> 961ad402 (first)
}
