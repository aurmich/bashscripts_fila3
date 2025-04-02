<?php

declare(strict_types=1);

namespace Modules\Ptv\Filament\Resources\CriteriEsclusioneResource\Pages;

use Filament\Actions\CreateAction;
use Filament\Tables\Columns;
use Filament\Tables\Filters;
use Filament\Tables\Actions;
use Modules\Ptv\Filament\Resources\CriteriEsclusioneResource;
use Modules\Ptv\Filament\Actions\Header\CopyFromLastYearAction;
use Modules\Xot\Filament\Resources\Pages\XotBaseListRecords;
use function Safe\date;

class ListCriteriEsclusiones extends XotBaseListRecords
{
    protected static string $resource = CriteriEsclusioneResource::class;

    /**
     * @return array<string, CreateAction|CopyFromLastYearAction>
     */
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

    /**
     * @return array<string, Columns\TextColumn>
     */
    public function getListTableColumns(): array
    {
        return [
            'name' => Columns\TextColumn::make('name')
                ->searchable()
                ->sortable(),
            'field_name' => Columns\TextColumn::make('field_name')
                ->searchable()
                ->sortable(),
            'op' => Columns\TextColumn::make('op')
                ->searchable()
                ->sortable(),
            'value' => Columns\TextColumn::make('value')
                ->searchable()
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
     * @return array<string, Actions\EditAction|Actions\DeleteAction>
     */
    public function getTableActions(): array
    {
        return [
            'edit' => Actions\EditAction::make(),
            'delete' => Actions\DeleteAction::make(),
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
        ];
    }
}
