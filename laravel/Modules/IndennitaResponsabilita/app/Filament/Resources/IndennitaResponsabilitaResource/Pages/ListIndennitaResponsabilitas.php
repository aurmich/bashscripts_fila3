<?php

declare(strict_types=1);

namespace Modules\IndennitaResponsabilita\Filament\Resources\IndennitaResponsabilitaResource\Pages;

use Filament\Actions;
use Filament\Forms\Components\Select;
use Filament\Pages\Actions\CreateAction;
use Filament\Tables;
use Filament\Tables\Actions\Action;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Enums\ActionsPosition;
// use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Enums\FiltersLayout;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\TernaryFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Modules\IndennitaResponsabilita\Actions\MakePdf;
use Modules\IndennitaResponsabilita\Actions\MakePdfByRecord;
use Modules\IndennitaResponsabilita\Actions\Populate;
use Modules\IndennitaResponsabilita\Actions\SendMailByRecords;
use Modules\IndennitaResponsabilita\Filament\Exports\IndennitaResponsabilitaExporter;
use Modules\IndennitaResponsabilita\Filament\Resources\IndennitaResponsabilitaResource;
use Modules\Ptv\Actions\FixValutatoreIdByAnno;
use Modules\Ptv\Actions\GetValutatoriOptions;
use Modules\Ptv\Actions\Scheda\GetSentEmailListHtml;
use Modules\Ptv\Filament\Actions\Bulk\SendSchedeBulkAction;
use Modules\Ptv\Filament\Actions\Bulk\ZipSchedeBulkAction;
use Modules\Xot\Filament\Actions\Header\ExportXlsAction;
use Modules\Xot\Filament\Resources\Pages\XotBaseListRecords;

class ListIndennitaResponsabilitas extends XotBaseListRecords
{
    protected static string $resource = IndennitaResponsabilitaResource::class;

    protected function getHeaderActions(): array
    {
        // dddx($this->getTableQuery());

        return [
            Actions\Action::make('exportPdf')
                ->label('Pdf ')
                ->icon('heroicon-s-document')
               // ->url(route('export.pdf', []))
                ->action(fn () => app(MakePdf::class)->execute($this->tableFilters)),

            Actions\Action::make('SendMail')
                ->label('invia schede ')
                ->icon('heroicon-o-paper-airplane')
                ->url(fn () => IndennitaResponsabilitaResource::getUrl('send-mail', $this->tableFilters))
                ->visible(false),

            // CreateAction::make(),
            /*
            Actions\ExportAction::make()
               ->exporter(IndennitaResponsabilitaExporter::class)
               ->label('')
               ->tooltip('esporta xls')
               ->icon('fas-file-excel')
               ->modifyQueryUsing(function ($query) {
                   return $this->getTableQuery();
               }),
            */
            ExportXlsAction::make('exportXls'),
            // ->exportOnlyFiltered(),
        ];
    }

    public function getListTableColumns(): array
    {
        return [
            TextColumn::make('matr')->sortable()->searchable(),
            TextColumn::make('cognome')->sortable()->searchable(),
            TextColumn::make('nome')->sortable()->searchable(),
            TextColumn::make('stabi')->sortable()->searchable(),
            TextColumn::make('repar')->sortable()->searchable(),
            TextColumn::make('anno')->sortable()->searchable(),
            TextColumn::make('sent_email_list')->html()->default(fn ($record) => app(GetSentEmailListHtml::class)->execute($record)),
        ];
    }

    public function getTableBulkActions(): array
    {
        return [
            // DeleteBulkAction::make(),

            Tables\Actions\BulkAction::make('send-mail')
                ->label('invia schede - verranno inviate solo quelle compilate')
                ->icon('heroicon-o-paper-airplane')
                ->requiresConfirmation()
                // ->action(fn (Collection $records) => $records->each->update(['is_completed' => true]))
                ->action(fn (Collection $records) => app(SendMailByRecords::class)->execute($records))
            // ->visible(false) // da togliere quando lo diranno loro
            // ->deselectRecordsAfterCompletion()
            ,

            // SendSchedeBulkAction::make('send-mail'),
            ZipSchedeBulkAction::make('zip-schede'),
        ];
    }

    public function getTableActions(): array
    {
        return [
            // Tables\Actions\ViewAction::make(),

            Action::make('compila')
                ->label('Compila')
                ->icon('heroicon-m-pencil-square')
                ->url(fn ($record): string => IndennitaResponsabilitaResource::getUrl('compila', ['record' => $record])),

            Action::make('record-pdf')
                ->label('pdf')
                ->icon('heroicon-o-document')
                // ->url( fn ($record): string => IndennitaResponsabilitaResource::getUrl('pdf', ['record' => $record])),
                ->action(fn ($record) => app(MakePdfByRecord::class)->execute($record))
                ->visible(fn ($record) => $record->ratings->sum('pivot.value') > 0),

            EditAction::make(),
            // Tables\Actions\EditAction::make(),
        ];
    }

    /*
    protected function getTableFiltersLayout(): ?string
    {
        return FiltersLayout::AboveContent;
    }

    protected function getTableFiltersFormColumns(): int
    {
        return 1;
    }

    protected function getTableFiltersFormWidth(): string
    {
        return '4xl';
    }

    protected function shouldPersistTableFiltersInSession(): bool
    {
        return true;
    }
    */
    public function getTableFilters(): array
    {
        return [
            SelectFilter::make('anno/valutatore')
                ->label('anno/valutatore')
                ->form([
                    Select::make('anno')
                        ->options([
                            // '2022' => '2022',
                            '2023' => '2023',
                            '2024' => '2024',
                            '2025' => '2025',
                        ])
                        ->reactive(),

                    Select::make('valutatore_id')
                        ->label('valutatore')
                        ->options(static fn (callable $get, callable $set) => app(GetValutatoriOptions::class)
                            ->execute('IndennitaResponsabilita', $get('anno'))),
                ])

                ->query(static function (Builder $query, array $data) {
                    if (null == $data['anno'] /* || null == $data['valutatore_id'] */) {
                        return $query->where('id', 0);
                    }
                    app(Populate::class)->execute($data);
                    /* -- riutilizzabile in performance, progressioni ... */
                    app(FixValutatoreIdByAnno::class)->execute('IndennitaResponsabilita', 'IndennitaResponsabilita', $data['anno']);

                    $query = $query->where($data);

                    // $query->whereHas('ratings', function ($query) {
                    //    $query->havingRaw('SUM(value) > 0');
                    // });

                    // if (! Auth::user()?->hasRole('super-admin')) {
                    //    $query = $query->whereHas('indennitaTipoDettaglio');
                    // }
                    return $query;
                })

                ->columns(2),
            TernaryFilter::make('is_compiled')
                ->columns(2)
                ->queries(
                    true: fn (Builder $query) => $query->isCompiled(),
                    false: fn (Builder $query) => $query->isNotCompiled(),
                    blank: fn (Builder $query) => $query, // In this example, we do not want to filter the query when it is blank.
                ),
        ];
    }

    /*
    public function table(Table $table): Table {
        $table = parent::table($table);
        $table->filters($this->getTableFilters(), layout: FiltersLayout::AboveContent)
            ->filtersFormColumns(1)
           //  ->filtersFormWidth('4xl')
           ->actions($this->getTableActions())
        ;

        return $table;
    }
    */

    public function getTableFiltersFormColumns(): int
    {
        return 2;
    }
    /*
    public function table(Table $table): Table
    {
        return $table
            // ->columns($this->getTableColumns())

            ->columns($this->layoutView->getTableColumns())
            ->contentGrid($this->layoutView->getTableContentGrid())
            ->headerActions($this->getTableHeaderActions())
             ->filtersFormColumns($this->getTableFiltersFormColumns())
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
    */
}
