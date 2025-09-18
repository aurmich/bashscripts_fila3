<?php

declare(strict_types=1);

namespace Modules\Progressioni\Filament\Resources\CriteriEsclusioneResource\Pages;

use Filament\Actions;
use Filament\Tables\Actions as TableActions;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Enums\ActionsPosition;
use Filament\Tables\Enums\FiltersLayout;
use Filament\Tables\Table;
use Illuminate\Support\Arr;
use Modules\Progressioni\Filament\Resources\CriteriEsclusioneResource;
use Modules\Progressioni\Models\CriteriEsclusione;
use Modules\Xot\Actions\Filament\Actions\CopyFromLastYearButton;
use Modules\Xot\Filament\Resources\Pages\XotBaseListRecords;

use function Safe\date;

class ListCriteriEsclusiones extends XotBaseListRecords
{
    protected static string $resource = CriteriEsclusioneResource::class;

    protected function getHeaderActions(): array
    {
        $anno = Arr::get($this->tableFilters, 'anno.value');

        return [
            Actions\CreateAction::make(),

            app(CopyFromLastYearButton::class)
                ->execute(CriteriEsclusione::class, 'anno', $anno),
        ];
    }

    public function getListTableColumns(): array
    {
        return [
            TextColumn::make('id'),
            TextColumn::make('name'),
            TextColumn::make('field_name'),
            TextColumn::make('op'),
            TextColumn::make('value'),
            TextColumn::make('type'),
            TextColumn::make('anno'),
        ];
    }

    public function getTableFilters(): array
    {
        return [
            app(\Modules\Xot\Actions\Filament\Filter\GetYearFilter::class)->execute('anno', intval(date('Y')) - 3, intval(date('Y'))),
        ];
    }

    public function getTableActions(): array
    {
        return [
            TableActions\Action::make('check')
                ->action(function ($record): void {
                    // dddx($record->schede);
                    // app(\Modules\Ptv\Actions\CriteriEsclusione\Check::class)->execute($scheda, $criteriEsclusione,$criteriOption);
                    app(\Modules\Ptv\Actions\CriteriEsclusione\CheckCriterio::class)->execute($record);
                }),

            TableActions\ViewAction::make()
                ->label(''),
            TableActions\EditAction::make()
                ->label(''),
            TableActions\DeleteAction::make()
                ->label('')
                ->requiresConfirmation(),
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
            // ->columns($this->getTableColumns())
            ->columns($this->layoutView->getTableColumns())
            ->contentGrid($this->layoutView->getTableContentGrid())
            ->headerActions($this->getTableHeaderActions())

            ->filters($this->getTableFilters())
            ->filtersLayout(FiltersLayout::AboveContent)
            ->persistFiltersInSession()
            ->actions($this->getTableActions())
            ->bulkActions($this->getTableBulkActions())
            ->actionsPosition(ActionsPosition::BeforeColumns)
            ->defaultSort(
                column: 'created_at',
                direction: 'DESC',
            );
    }
}
