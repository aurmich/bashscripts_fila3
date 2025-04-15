<?php

namespace Modules\Performance\Filament\Resources\IndividualeCatCoeffResource\Pages;

use Filament\Actions\CreateAction;
use Filament\Tables\Columns;
use Filament\Tables\Filters;
use Filament\Tables\Actions;
use Modules\Performance\Filament\Resources\IndividualeCatCoeffResource;
use Modules\Ptv\Filament\Actions\Header\CopyFromLastYearAction;
use Modules\Xot\Filament\Resources\Pages\XotBaseListRecords;
use function Safe\date;

class ListIndividualeCatCoeffs extends XotBaseListRecords
{
    protected static string $resource = IndividualeCatCoeffResource::class;

    /**
     * Get the list table columns.
     *
     * @return array<string, Columns\TextColumn>
     */
    public function getListTableColumns(): array
    {
        return [
            'lista_propro' => Columns\TextColumn::make('lista_propro')
                ->searchable(),
            'coeff' => Columns\TextColumn::make('coeff')
                ->numeric()
                ->sortable(),
            'descr' => Columns\TextColumn::make('descr')
                ->searchable()
                ->wrap(),
            'tot_giorni' => Columns\TextColumn::make('tot_giorni')
                ->numeric()
                ->sortable(),
            'tot_giorni_pt' => Columns\TextColumn::make('tot_giorni_pt')
                ->numeric()
                ->sortable(),
            'tot_giorni_pt_coeff' => Columns\TextColumn::make('tot_giorni_pt_coeff')
                ->numeric()
                ->sortable(),
            'quota_teorica' => Columns\TextColumn::make('quota_teorica')
                ->numeric()
                ->sortable(),
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

    /**
     * Get the table filters.
     *
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
            'lista_propro' => Filters\SelectFilter::make('lista_propro')
                ->searchable()
                ->preload(),
        ];
    }

    /**
     * Get the table actions.
     *
     * @return array<string, Actions\Action>
     */
    public function getTableActions(): array
    {
        return [
            'edit' => Actions\EditAction::make(),
            'delete' => Actions\DeleteAction::make(),
        ];
    }

    /**
     * Get the table bulk actions.
     *
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
