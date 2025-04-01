<?php

declare(strict_types=1);

namespace Modules\Performance\Filament\Resources\IndividualeAdmResource\Pages;

use Filament\Actions\CreateAction;
use Filament\Tables\Columns;
use Filament\Tables\Filters;
use Filament\Tables\Actions;
use Modules\Performance\Filament\Resources\IndividualeAdmResource;
use Modules\Ptv\Filament\Actions\Header\CopyFromLastYearAction;
use Modules\Xot\Filament\Resources\Pages\XotBaseListRecords;
use function Safe\date;

class ListIndividualeAdms extends XotBaseListRecords
{
    protected static string $resource = IndividualeAdmResource::class;

    /**
     * @return array<string, Columns\TextColumn>
     */
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

    /**
     * @return array<string, Filters\SelectFilter>
     */
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

    /**
     * @return array<string, Actions\DeleteBulkAction>
     */
    public function getTableBulkActions(): array
    {
        return [
            'delete' => Actions\DeleteBulkAction::make(),
        ];
    }

    /**
     * Get the header actions for the list page.
     *
     * @return array<int, \Filament\Actions\Action>
     */
    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
            CopyFromLastYearAction::make(),
        ];
    }
}
