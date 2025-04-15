<?php

declare(strict_types=1);

namespace Modules\IndennitaCondizioniLavoro\Filament\Resources\CondizioniLavoroResource\Pages;

use Filament\Actions;
use Filament\Forms\Components\Select;
use Filament\Tables\Actions\Action;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Enums\ActionsPosition;
use Filament\Tables\Enums\FiltersLayout;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;
use Modules\IndennitaCondizioniLavoro\Actions\MakePdf;
use Modules\IndennitaCondizioniLavoro\Actions\Populate;
use Modules\IndennitaCondizioniLavoro\Actions\ReplicateIndennita;
use Modules\IndennitaCondizioniLavoro\Filament\Resources\CondizioniLavoroResource;
use Modules\Ptv\Actions\FixValutatoreIdByAnno;
use Modules\Ptv\Actions\GetValutatoriOptions;
use Modules\Xot\Filament\Resources\Pages\XotBaseListRecords;

class ListCondizioniLavoros extends XotBaseListRecords
{
    protected static string $resource = CondizioniLavoroResource::class;

    public function getListTableColumns(): array
    {
        return [
            TextColumn::make('matr')->searchable(),
            TextColumn::make('cognome')->searchable(),
            TextColumn::make('nome')->searchable(),
            TextColumn::make('stabi')->searchable(),
            TextColumn::make('repar')->searchable(),
            TextColumn::make('indennitaTipoDettaglio')
                ->formatStateUsing(function (TextColumn $column) {
                    $state = $column->getState();

                    return $state->pluck('indennitaTipo.nome')->implode(','.PHP_EOL.PHP_EOL.'');
                })
                ->wrap()
                ->tooltip(function (TextColumn $column): ?string {
                    $state = $column->getState();

                    return $state?->map(fn ($item): string => '['.$item->indennitaTipo?->nome.'] '.$item->nome)->implode(' --------------------- ,'.PHP_EOL.PHP_EOL.'');
                }),
            TextColumn::make('quadrimestre')->searchable(),
            TextColumn::make('anno')->searchable(),
        ];
    }

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
            Actions\Action::make('exportPdf')
                ->label('Pdf ')
                ->icon('heroicon-s-document')
                ->action(fn () => app(MakePdf::class)->execute($this->tableFilters)),
            Actions\Action::make('replicate')
                ->label('')
                ->icon('heroicon-o-clipboard-document-list')
                ->tooltip('ricopia da quadrimentre precendente')
                ->action(fn () => app(ReplicateIndennita::class)->execute($this->tableFilters)),
        ];
    }

    protected function shouldPersistTableFiltersInSession(): bool
    {
        return true;
    }

    public function getTableActions(): array
    {
        return [
            Action::make('compila')
                ->label('Compila')
                ->icon('heroicon-m-pencil-square')
                ->url(fn ($record): string => CondizioniLavoroResource::getUrl('compila', ['record' => $record])),

            EditAction::make(),
        ];
    }

    public function table(Table $table): Table
    {
        $table = parent::table($table);
        $table->filters($this->getTableFilters(), layout: FiltersLayout::AboveContent)
            ->filtersFormColumns(1)
            ->actions($this->getTableActions())
            ->persistFiltersInSession();

        return $table;
    }

    public function getTableFilters(): array
    {
        return [
            SelectFilter::make('anno/valutatore')
                ->label('anno/valutatore')
                ->form([
                    Select::make('anno')
                        ->options([
                            '2023' => '2023',
                            '2024' => '2024',
                            '2025' => '2025',
                        ])
                        ->reactive(),
                    Select::make('quadrimestre')
                        ->options([
                            '1' => '1',
                            '2' => '2',
                            '3' => '3',
                        ])
                        ->reactive(),
                    Select::make('valutatore_id')
                        ->label('valutatore')
                        ->options(static fn (callable $get, callable $set) => app(GetValutatoriOptions::class)
                            ->execute('IndennitaCondizioniLavoro', $get('anno'))),
                ])
                ->query(static function (Builder $query, array $data) {
                    if ($data['anno'] == null) {
                        return $query->where('id', 0);
                    }
                    app(Populate::class)->execute($data);
                    app(FixValutatoreIdByAnno::class)->execute('IndennitaCondizioniLavoro', 'CondizioniLavoro', $data['anno']);

                    $query = $query->where($data);

                    if (! Auth::user()?->hasRole('super-admin')) {
                        return $query->whereHas('indennitaTipoDettaglio');
                    }

                    return $query;
                })->columns(4),
        ];
    }
}
