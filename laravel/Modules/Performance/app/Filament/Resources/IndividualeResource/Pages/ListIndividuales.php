<?php

declare(strict_types=1);

namespace Modules\Performance\Filament\Resources\IndividualeResource\Pages;

use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Enums\ActionsPosition;
use Filament\Tables\Enums\FiltersLayout;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Support\Arr;
use Modules\Performance\Actions\ShowMailSendedAt;
use Modules\Performance\Enums\WorkerType;
use Modules\Performance\Filament\Actions\Bulk\SendMailBulkAction;
use Modules\Performance\Filament\Resources\IndividualeResource;
use Modules\Performance\Models\Individuale;
use Modules\Performance\Models\Organizzativa;
use Modules\Ptv\Filament\Resources\ReportResource\Widgets\FirmaStabiReparWidget;
use Modules\UI\Filament\Tables\Columns\GroupColumn;
use Modules\Xot\Filament\Actions\Header\ExportXlsAction;
use Modules\Xot\Filament\Resources\Pages\XotBaseListRecords;
use Modules\Xot\Filament\Traits\NavigationLabelTrait;

use function Safe\date;

/**
 * ---.
 */
class ListIndividuales extends XotBaseListRecords
{
    use NavigationLabelTrait;

    protected static string $resource = IndividualeResource::class;

    public function getModelLabel(): string
    {
        return static::trans('navigation.name');
    }

    public function getPluralModelLabel(): string
    {
        return static::trans('navigation.plural');
    }

    public function getListTableColumns(): array
    {
        return [
            'id' => Tables\Columns\TextColumn::make('id')
                ->sortable(),
            'ha_diritto' => Tables\Columns\ToggleColumn::make('ha_diritto')
                ->sortable(),
            'motivo' => Tables\Columns\TextColumn::make('motivo')
                ->wrap()
                ->searchable(),
            'matr' => Tables\Columns\TextColumn::make('matr')
                ->sortable()
                ->searchable(),
            'cognome' => Tables\Columns\TextColumn::make('cognome')
                ->sortable()
                ->searchable(),
            'nome' => Tables\Columns\TextColumn::make('nome')
                ->sortable()
                ->searchable(),
            'email' => Tables\Columns\TextColumn::make('email')
                ->sortable()
                ->searchable(),
            'stabi' => Tables\Columns\TextColumn::make('stabi')
                ->sortable()
                ->searchable(),
            'repar' => Tables\Columns\TextColumn::make('repar')
                ->sortable()
                ->searchable(),
            'anno' => Tables\Columns\TextColumn::make('anno')
                ->sortable()
                ->searchable(),
            'created_at' => Tables\Columns\TextColumn::make('created_at')
                ->dateTime()
                ->sortable()
                ->toggleable(isToggledHiddenByDefault: true),
            'updated_at' => Tables\Columns\TextColumn::make('updated_at')
                ->dateTime()
                ->sortable()
                ->toggleable(isToggledHiddenByDefault: true),
        ];
    }

    /**
     * ---.
     */
    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
            \Modules\Ptv\Filament\Actions\Header\CopyFromLastYearAction::make(),
            \Modules\Ptv\Filament\Actions\Header\PopulateYearAction::make(),
            ExportXlsAction::make(),
            Actions\Action::make('copy_from_organizzativa')->action(
                function () {
                    $tableFilters = [];
                    if (is_array($this->tableFilters)) {
                        $tableFilters = $this->tableFilters;
                    }
                    $anno = Arr::get($tableFilters, 'anno.value');
                    if ($anno < 2023) {
                        dddx('non si puo');
                    }
                    $rows = Organizzativa::where('anno', $anno)->get();
                    foreach ($rows as $row) {
                        $data = $row->toArray();
                        $where = Arr::only($data, ['ente', 'matr', 'dal', 'al']);
                        $up = Individuale::where($where)->get();
                        if ($up->count() != 1) {
                            dddx('noo');
                        }
                        $up->first()?->update($data);
                    }
                    Notification::make()
                        ->title('Saved successfully')
                        ->success()
                        ->send();
                }
            ),
        ];
    }

    public function getTableColumns(): array
    {
        return [
            /*
    Tables\Columns\TextColumn::make('type')
    ->searchable(),
    */
            TextColumn::make('matr')->searchable()->toggleable(isToggledHiddenByDefault: true),
            TextColumn::make('cognome')->searchable()->toggleable(isToggledHiddenByDefault: true),
            TextColumn::make('nome')->searchable()->toggleable(isToggledHiddenByDefault: true),
            TextColumn::make('email')->searchable()->toggleable(isToggledHiddenByDefault: true),

            ToggleColumn::make('ha_diritto')->searchable(),
            TextColumn::make('motivo')->searchable(),
            // *
            TextColumn::make('mail_sended_at')
                ->html()
                ->default(fn ($record) => app(ShowMailSendedAt::class)->execute($record)),
            // */
            GroupColumn::make('lavoratore')->schema([
                TextColumn::make('matr')->searchable(),
                TextColumn::make('cognome')->searchable(),
                TextColumn::make('nome'),
                TextColumn::make('email'),
                TextColumn::make('totale_punteggio'),
            ]),
            GroupColumn::make('qua')->schema([
                TextColumn::make('propro'),
                TextColumn::make('posfun'),
                TextColumn::make('categoria_eco'),
                TextColumn::make('categoria_ecoval'),
                TextColumn::make('posfunval'),
                TextColumn::make('posiz'),
                TextColumn::make('posiz_txt'),
                TextColumn::make('disci1'),
                TextColumn::make('disci1_txt'),
            ]),
            GroupColumn::make('rep')->schema([
                TextColumn::make('stabi'),
                TextColumn::make('stabi_txt'),
                TextColumn::make('repar'),
                TextColumn::make('repar_txt'),
            ]),
            GroupColumn::make('periodo')->schema([
                TextColumn::make('dal'),
                TextColumn::make('al'),
                TextColumn::make('anno'),
            ]),
        ];
    }

    public function getTableFilters(): array
    {
        return [
            app(\Modules\Xot\Actions\Filament\Filter\GetYearFilter::class)->execute('anno', intval(date('Y')) - 3, intval(date('Y'))),
            SelectFilter::make('type')
                ->options(WorkerType::class),
        ];
    }

    public function getTableActions(): array
    {
        return [
            Tables\Actions\EditAction::make(),
        ];
    }

    public function getTableBulkActions(): array
    {
        return [
            SendMailBulkAction::make('send-mail'),
        ];
    }

    public function table(Table $table): Table
    {
        return $table
            // ->query($this->getTableQuery())
            ->actions($this->getTableActions())
            // ->actionsColumnLabel($this->getTableActionsColumnLabel())
            // ->checkIfRecordIsSelectableUsing($this->isTableRecordSelectable())
            ->columns($this->getTableColumns())
            // ->columnToggleFormColumns($this->getTableColumnToggleFormColumns())
            // ->columnToggleFormMaxHeight($this->getTableColumnToggleFormMaxHeight())
            // ->columnToggleFormWidth($this->getTableColumnToggleFormWidth())
            // ->content($this->getTableContent())
            // ->contentFooter($this->getTableContentFooter())
            // ->contentGrid($this->getTableContentGrid())
            // ->defaultSort($this->getDefaultTableSortColumn(), $this->getDefaultTableSortDirection())
            // ->deferLoading($this->isTableLoadingDeferred())
            // ->description($this->getTableDescription())
            // ->deselectAllRecordsWhenFiltered($this->shouldDeselectAllRecordsWhenTableFiltered())
            // ->emptyState($this->getTableEmptyState())
            // ->emptyStateActions($this->getTableEmptyStateActions())
            // ->emptyStateDescription($this->getTableEmptyStateDescription())
            // ->emptyStateHeading($this->getTableEmptyStateHeading())
            // ->emptyStateIcon($this->getTableEmptyStateIcon())
            ->filters($this->getTableFilters())
            // ->filtersFormMaxHeight($this->getTableFiltersFormMaxHeight())
            // ->filtersFormWidth($this->getTableFiltersFormWidth())
            // ->groupedBulkActions($this->getTableBulkActions())
            // ->header($this->getTableHeader())
            // ->headerActions($this->getTableHeaderActions())
            // ->modelLabel($this->getTableModelLabel())
            // ->paginated($this->isTablePaginationEnabled())
            // ->paginatedWhileReordering($this->isTablePaginationEnabledWhileReordering())
            // ->paginationPageOptions($this->getTableRecordsPerPageSelectOptions())
            // ->persistSearchInSession($this->shouldPersistTableSearchInSession())
            // ->persistColumnSearchesInSession($this->shouldPersistTableColumnSearchInSession())
            // ->persistSortInSession($this->shouldPersistTableSortInSession())
            // ->pluralModelLabel($this->getTablePluralModelLabel())
            // ->poll($this->getTablePollingInterval())
            // ->recordAction($this->getTableRecordActionUsing())
            // ->recordClasses($this->getTableRecordClassesUsing())
            // ->recordTitle(fn (Model $record): ?string => $this->getTableRecordTitle($record))
            // ->recordUrl($this->getTableRecordUrlUsing())
            // ->reorderable($this->getTableReorderColumn())
            // ->selectCurrentPageOnly($this->shouldSelectCurrentPageOnly())
            // ->striped($this->isTableStriped())
            ->bulkActions($this->getTableBulkActions())
            ->filtersLayout(FiltersLayout::AboveContent)
            // ->filtersFormColumns(1)
            ->actionsPosition(ActionsPosition::BeforeColumns)
            ->persistFiltersInSession();
    }

    public function getHeaderWidgets(): array
    {
        // dddx($this->tableFilters);
        /*
         "stabi_repar_anno" => array:4 [▼
      "anno" => "2023"
      "stabi" => "611"
      "repar" => "38"
      "ha_diritto" => null
    ]
    */
        $filters = Arr::get($this->tableFilters ?? [], 'stabi_repar_anno');

        return [

            FirmaStabiReparWidget::make(['resource' => static::$resource, 'filters' => $filters]),
        ];
    }
}
