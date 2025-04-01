<?php

declare(strict_types=1);

namespace Modules\IndennitaResponsabilita\Filament\Resources\RatingResource\Pages;

use Filament\Actions\CreateAction;
use Filament\Forms\Components\Select;
use Filament\Tables\Actions\Action;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Enums\ActionsPosition;
use Filament\Tables\Enums\FiltersLayout;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Arr;
use Modules\IndennitaResponsabilita\Filament\Resources\RatingResource;
use Modules\IndennitaResponsabilita\Models\Rating;
use Modules\Rating\Filament\Resources\RatingResource\Pages\ListRatings as BaseListRatings;

class ListRatings extends BaseListRatings
{
    protected static string $resource = RatingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }

    public function getTableHeaderActions(): array
    {
        return [
            ...parent::getTableHeaderActions(),
            Action::make('aaa')
                ->action(function () {
                    $anno = Arr::get($this->tableFilters, 'filter.anno');
                    $anno_prec = $anno - 1;
                    $model = $this->getModel();
                    $rows = $model::withExtraAttributes('anno', $anno_prec)->get();
                    foreach ($rows as $row) {
                        $data = $row->toArray();
                        $data_where = Arr::only($data, ['title']);
                        unset($data['id']);

                        $row = $model::withExtraAttributes('anno', $anno)->firstOrCreate($data_where, $data);

                        $row->extra_attributes->set('anno', $anno);
                        $row->save();
                    }
                }),
        ];
    }

    public function getListTableColumns(): array
    {
        $cols = parent::getListTableColumns();
        $prepend = [
            TextColumn::make('extra_attributes.type')->label('type'),
            TextColumn::make('extra_attributes.anno')->label('anno'),
        ];

        return array_merge($prepend, $cols);
    }

    public function getTableFilters(): array
    {
        return [
            Filter::make('filter')
                ->form([
                    Select::make('anno')
                        ->label('Anno')
                        ->options(self::getYears()),
                ])
                ->query(function (Builder $query, array $data): Builder {
                    if (! isset($data['anno'])) {
                        return $query;
                    }

                    return $query->withExtraAttributes('anno', $data['anno']);
                }),
        ];
    }

    protected static function getYears(): array
    {
        /*
        return Rating::selectRaw('YEAR(extra_attributes->year) as year')
            ->distinct()
            ->pluck('year', 'year')
            ->toArray();
        */
        return [
            '2023' => '2023',
            '2024' => '2024',
'2025' => '2025',
        ];
    }

    public function getTableActions(): array
    {
        return [
            ViewAction::make()
                ->label(''),
            EditAction::make()
                ->label(''),
            DeleteAction::make()
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
