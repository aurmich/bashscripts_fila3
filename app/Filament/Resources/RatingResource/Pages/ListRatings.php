<?php

declare(strict_types=1);

<<<<<<< HEAD
<<<<<<< HEAD
namespace Modules\Rating\Filament\Resources\RatingResource\Pages;

<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> 2df6fbc8 (first)
=======
namespace Modules\IndennitaResponsabilita\Filament\Resources\RatingResource\Pages;

use Filament\Actions\CreateAction;
use Filament\Forms\Components\Select;
use Filament\Tables\Actions\Action;
>>>>>>> e0005d7d (first)
=======
namespace Modules\Rating\Filament\Resources\RatingResource\Pages;

>>>>>>> bc2abf99 (.)
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\ViewAction;
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> bc2abf99 (.)
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Enums\ActionsPosition;
use Filament\Tables\Enums\FiltersLayout;
use Filament\Tables\Table;
use Modules\Rating\Filament\Resources\RatingResource;
use Modules\Xot\Filament\Resources\Pages\XotBaseListRecords;

class ListRatings extends XotBaseListRecords
{
    protected static string $resource = RatingResource::class;

    public function getListTableColumns(): array
    {
        return [
<<<<<<< HEAD
            'id' => TextColumn::make('id')
                ->sortable()
                ->searchable(),
            'title' => TextColumn::make('title')
                ->sortable()
                ->searchable(),
            'rule' => TextColumn::make('rule')
                ->badge(),
            'is_disabled' => IconColumn::make('is_disabled')
                ->boolean(),
            'is_readonly' => IconColumn::make('is_readonly')
=======
            TextColumn::make('id')

                ->sortable()
                ->searchable(),
            TextColumn::make('title')

                ->sortable()
                ->searchable(),
            TextColumn::make('rule')

                ->badge(),
            IconColumn::make('is_disabled')
                ->boolean(),
            IconColumn::make('is_readonly')
>>>>>>> bc2abf99 (.)
                ->boolean(),
        ];

        // TextColumn::make('extra_attributes.type'),
        // TextColumn::make('extra_attributes.anno'),

        // TextColumn::make('is_readonly'),
        // TextColumn::make('is_disabled'),
        // ToggleColumn::make('is_readonly'),

        // TextColumn::make('color'),
<<<<<<< HEAD
=======
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
>>>>>>> e0005d7d (first)
=======
>>>>>>> bc2abf99 (.)
    }

    public function getTableFilters(): array
    {
        return [
<<<<<<< HEAD
<<<<<<< HEAD
=======
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
>>>>>>> e0005d7d (first)
=======
>>>>>>> bc2abf99 (.)
        ];
    }

    public function getTableActions(): array
    {
        return [
<<<<<<< HEAD
<<<<<<< HEAD
            'view' => ViewAction::make()
                ->label(''),
            'edit' => EditAction::make()
                ->label(''),
            'delete' => DeleteAction::make()
=======
=======
>>>>>>> bc2abf99 (.)
            ViewAction::make()
                ->label(''),
            EditAction::make()
                ->label(''),
            DeleteAction::make()
<<<<<<< HEAD
>>>>>>> e0005d7d (first)
=======
>>>>>>> bc2abf99 (.)
                ->label('')
                ->requiresConfirmation(),
        ];
    }

    public function getTableBulkActions(): array
    {
        return [
<<<<<<< HEAD
<<<<<<< HEAD
            'delete' => DeleteBulkAction::make(),
=======
            DeleteBulkAction::make(),
>>>>>>> e0005d7d (first)
=======
            DeleteBulkAction::make(),
>>>>>>> bc2abf99 (.)
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
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use Filament\Tables\Table;
use Filament\Tables\Actions\DeleteBulkAction;
use Modules\Rating\Filament\Resources\RatingResource;

class ListRatings extends ListRecords
{
    protected static string $resource = RatingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }

    protected function getTableBulkActions(): array
    {
        return [
            DeleteBulkAction::make(),
        ];
    }

    /**
     * Ottiene le colonne della tabella.
     *
     * @return array<\Filament\Tables\Columns\Column>
     */
    protected function getTableColumns(): array
    {
        return $this->layoutView->getTableColumns();
    }

    /**
     * Configura le opzioni aggiuntive della tabella.
     *
     * @param Table $table
     * @return array<string, mixed>
     */
    protected function getTableConfiguration(): array
    {
        return [
            'defaultSort' => 'created_at',
            'defaultSortDirection' => 'desc',
            'paginated' => true,
            'recordsPerPage' => 25,
        ];
>>>>>>> 6a338e09 (Merge commit 'e1d791bbad6512f4a9dade9d330c2e1ce0a99418' as 'laravel/Modules/Rating')
=======
>>>>>>> 2df6fbc8 (first)
=======
>>>>>>> e0005d7d (first)
=======
>>>>>>> bc2abf99 (.)
    }
}
