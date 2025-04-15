<?php

declare(strict_types=1);

namespace Modules\Progressioni\Filament\Resources\CedDiffResource\Pages;

use Filament\Actions;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Enums\ActionsPosition;
use Filament\Tables\Enums\FiltersLayout;
use Filament\Tables\Table;
use Modules\Progressioni\Filament\Imports\CedDiffImporter;
use Modules\Progressioni\Filament\Resources\CedDiffResource;
use Modules\Progressioni\Models\CedDiff;
use Modules\Progressioni\Models\Schede;
use Modules\Xot\Filament\Resources\Pages\XotBaseListRecords;

class ListCedDiffs extends XotBaseListRecords
{
    protected static string $resource = CedDiffResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
            Actions\ImportAction::make()
                ->importer(CedDiffImporter::class)
                ->label(__('progressioni::messages.import_ced_diff')) // Traduzione
                ->modalHeading(__('progressioni::messages.import_modal_heading')) // Titolo della modale
                ->successNotificationTitle(__('progressioni::messages.import_success')) // Messaggio di successo
                ->color('success'), // Colore dell'azione
            Actions\Action::make('escludi da progressione')
                ->form([
                    TextInput::make('anno')
                        ->numeric()
                        ->required(),
                ])
                ->action(function (array $data) {
                    $matricole = CedDiff::all()->pluck('matricola')->toArray();

                    $rows = Schede::where('anno', $data['anno'])
                        ->whereIn('matr', $matricole)
                        ->get();
                    foreach ($rows as $row) {
                        $motivo_arr = explode(',', $row->motivo);
                        $motivo_arr[] = 'gradino';
                        $motivo_arr = array_unique($motivo_arr);
                        $motivo_arr = array_filter($motivo_arr);
                        /*
                        $row->update([
                            'ha_diritto'=>0,
                            'motivo'=>implode(',', $motivo_arr),
                        ]);
                        */
                        // dddx($row);
                        $row->ha_diritto = 0;
                        $row->motivo = implode(',', $motivo_arr);
                        $row->save();
                    }
                }),
        ];
    }

    public function getListTableColumns(): array
    {
        return [
            TextColumn::make('matricola')->searchable()->sortable(),
            TextColumn::make('cognome')->searchable()->sortable(),
            TextColumn::make('nome')->searchable()->sortable(),
            TextColumn::make('dal')->sortable(),
            TextColumn::make('al')->sortable(),
            TextColumn::make('importo_forzato')->searchable()->sortable(),
            TextColumn::make('importo_base')->searchable()->sortable(),
            TextColumn::make('voce')->searchable()->sortable(),
            TextColumn::make('descrizione')->searchable()->sortable(),
            TextColumn::make('istituto')->searchable()->sortable(),
            TextColumn::make('tipo')->searchable()->sortable(),
            TextColumn::make('ruolo')->searchable()->sortable(),
            TextColumn::make('ruolo_txt')->searchable()->sortable(),
            TextColumn::make('profilo')->searchable()->sortable(),
            TextColumn::make('profilo_txt')->searchable()->sortable(),
            TextColumn::make('posizione_funzionale')->searchable()->sortable(),
            TextColumn::make('descr_posizione_funzionale')->searchable()->sortable(),
            TextColumn::make('stabilimento')->searchable()->sortable(),
            TextColumn::make('stabi_txt')->searchable()->sortable(),
            TextColumn::make('reparto')->searchable()->sortable(),
            TextColumn::make('repar_txt')->searchable()->sortable(),
        ];
    }

    public function getTableFilters(): array
    {
        return [
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
