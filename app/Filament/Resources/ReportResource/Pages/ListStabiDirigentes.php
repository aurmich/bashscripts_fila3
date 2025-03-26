<?php

declare(strict_types=1);

namespace Modules\Ptv\Filament\Resources\ReportResource\Pages;

use Filament\Actions\CreateAction;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Enums\ActionsPosition;
use Filament\Tables\Enums\FiltersLayout;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Modules\Xot\Filament\Resources\Pages\XotBaseListRecords;
use Modules\Ptv\Filament\Resources\StabiDirigenteResource\Pages\ListStabiDirigentes as PtvListStabiDirigentes;

// use Modules\Ptv\Filament\Resources\StabiDirigenteResource;

class ListStabiDirigentes extends XotBaseListRecords
{
    // protected static string $resource = StabiDirigenteResource::class;

    protected function getTableFiltersLayout(): FiltersLayout
    {
        return FiltersLayout::AboveContent;
    }

    protected function getTableActionsPosition(): ActionsPosition
    {
        return ActionsPosition::BeforeColumns;
    }

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }

    public function getListTableColumns(): array
    {
        return [
            TextColumn::make('id'),
            TextColumn::make('valutatore_id'),
            TextColumn::make('stabi')->searchable(),
            TextColumn::make('repar')->searchable(),
            TextColumn::make('nome_stabi')->searchable(),
            TextColumn::make('nome_diri')->searchable(),
            TextColumn::make('nome_diri_plus')->searchable(),
            TextColumn::make('anno'),
        ];
    }

    public function getTableFilters(): array
    {
        return [
            SelectFilter::make('anno')
                ->options([
                    '2021' => '2021',
                    '2022' => '2022',
                    '2023' => '2023',
                    '2024' => '2024',
'2025' => '2025',
                ])->query(static function (Builder $query, array $data): Builder {
                    if ($data['value'] == null) {
                        return $query->where('id', 0);
                    }

                    return $query->where('anno', $data['value']);
                }),
        ];
    }

    public function getTableActions(): array
    {
        return [
            EditAction::make()
                ->label('')
                ->tooltip('Modifica'),
        ];
    }

    public function getTableBulkActions(): array
    {
        return [
            DeleteBulkAction::make(),
        ];
    }

    public function table(Table $table): Table
    {
        return $table
            ->columns($this->getListTableColumns())
            ->filters($this->getTableFilters())
            ->actions($this->getTableActions())
            ->filtersLayout($this->getTableFiltersLayout())
            ->actionsPosition($this->getTableActionsPosition())
            ->filtersFormColumns(1)
            ->persistFiltersInSession()
            ->bulkActions($this->getTableBulkActions());
    }
}
