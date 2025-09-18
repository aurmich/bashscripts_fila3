<?php

<<<<<<< HEAD
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

=======
namespace Modules\Performance\Filament\Resources\CriteriEsclusioneResource\Pages;

use Filament\Actions\CreateAction;
use Filament\Tables\Columns;
use Filament\Tables\Filters;
use Filament\Tables\Actions;
use Modules\Performance\Filament\Resources\CriteriEsclusioneResource;
use Modules\Ptv\Filament\Actions\Header\CopyFromLastYearAction;
use Modules\Xot\Filament\Resources\Pages\XotBaseListRecords;

>>>>>>> 961ad402 (first)
class ListCriteriEsclusiones extends XotBaseListRecords
{
    protected static string $resource = CriteriEsclusioneResource::class;

    protected function getHeaderActions(): array
    {
<<<<<<< HEAD
        $anno = Arr::get($this->tableFilters, 'anno.value');

        return [
            Actions\CreateAction::make(),

            app(CopyFromLastYearButton::class)
                ->execute(CriteriEsclusione::class, 'anno', $anno),
=======
        return [
            'create' => CreateAction::make(),
            'copy' => CopyFromLastYearAction::make(),
>>>>>>> 961ad402 (first)
        ];
    }

    public function getListTableColumns(): array
    {
        return [
<<<<<<< HEAD
            TextColumn::make('id'),
            TextColumn::make('name'),
            TextColumn::make('field_name'),
            TextColumn::make('op'),
            TextColumn::make('value'),
            TextColumn::make('type'),
            TextColumn::make('anno'),
=======
            'name' => Columns\TextColumn::make('name')
                ->label('Nome')
                ->searchable()
                ->sortable(),
            'field_name' => Columns\TextColumn::make('field_name')
                ->label('Campo')
                ->searchable()
                ->sortable(),
            'op' => Columns\TextColumn::make('op')
                ->label('Operatore')
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
                ->dateTime()
                ->sortable()
                ->toggleable(isToggledHiddenByDefault: true),
>>>>>>> 961ad402 (first)
        ];
    }

    public function getTableFilters(): array
    {
        return [
<<<<<<< HEAD
            app(\Modules\Xot\Actions\Filament\Filter\GetYearFilter::class)->execute('anno', intval(date('Y')) - 3, intval(date('Y'))),
=======
            'anno' => Filters\SelectFilter::make('anno')
                ->label('Anno')
                ->options(function () {
                    $currentYear = date('Y');

                    return [
                        $currentYear => $currentYear,
                        $currentYear - 1 => $currentYear - 1,
                        $currentYear - 2 => $currentYear - 2,
                    ];
                }),
>>>>>>> 961ad402 (first)
        ];
    }

    public function getTableActions(): array
    {
        return [
<<<<<<< HEAD
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
=======
            'edit' => Actions\EditAction::make(),
            'delete' => Actions\DeleteAction::make(),
>>>>>>> 961ad402 (first)
        ];
    }

    public function getTableBulkActions(): array
    {
        return [
<<<<<<< HEAD
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
=======
            'delete' => Actions\DeleteBulkAction::make(),
        ];
    }
>>>>>>> 961ad402 (first)
}
