<?php

namespace Modules\Performance\Filament\Resources\IndividualeAdmResource\Pages;

use Filament\Actions\CreateAction;
use Filament\Tables\Columns;
use Filament\Tables\Filters;
use Filament\Tables\Actions;
use Modules\Performance\Filament\Resources\IndividualeAdmResource;
use Modules\Ptv\Filament\Actions\Header\CopyFromLastYearAction;
use Modules\Xot\Filament\Resources\Pages\XotBaseListRecords;

class ListIndividualeAdms extends XotBaseListRecords
{
    protected static string $resource = IndividualeAdmResource::class;

    public function getListTableColumns(): array
    {
        return [
            'matr' => Columns\TextColumn::make('matr')
                ->numeric()
                ->sortable(),
            'cognome' => Columns\TextColumn::make('cognome')
                ->searchable()
                ->sortable(),
            'nome' => Columns\TextColumn::make('nome')
                ->searchable()
                ->sortable(),
            'email' => Columns\TextColumn::make('email')
                ->searchable(),
            'stabi_txt' => Columns\TextColumn::make('stabi_txt')
                ->searchable()
                ->sortable(),
            'repar_txt' => Columns\TextColumn::make('repar_txt')
                ->searchable()
                ->sortable(),
            'disci_txt' => Columns\TextColumn::make('disci_txt')
                ->searchable(),
            'categoria_eco' => Columns\TextColumn::make('categoria_eco')
                ->searchable()
                ->sortable(),
            'anno' => Columns\TextColumn::make('anno')
                ->numeric()
                ->sortable(),
            'totale_punteggio' => Columns\TextColumn::make('totale_punteggio')
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
            'stabi_txt' => Filters\SelectFilter::make('stabi_txt')
                ->searchable()
                ->preload(),
            'repar_txt' => Filters\SelectFilter::make('repar_txt')
                ->searchable()
                ->preload(),
            'disci_txt' => Filters\SelectFilter::make('disci_txt')
                ->searchable()
                ->preload(),
            'categoria_eco' => Filters\SelectFilter::make('categoria_eco')
                ->searchable()
                ->preload(),
        ];
    }

    public function getTableActions(): array
    {
        return [
            'edit' => Actions\EditAction::make(),
            'delete' => Actions\DeleteAction::make(),
        ];
    }

    public function getTableBulkActions(): array
    {
        return [
            'delete' => Actions\DeleteBulkAction::make(),
        ];
    }

    public function getTableHeaderActions(): array
    {
        return [
            'create' => Actions\CreateAction::make(),
            'copy' => \Modules\Ptv\Filament\Actions\Header\CopyFromLastYearAction::make(),
        ];
    }

    protected function getHeaderActions(): array
    {
        return [
            'create' => CreateAction::make(),
            'copy' => CopyFromLastYearAction::make(),
        ];
    }
}
