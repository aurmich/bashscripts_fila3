<?php

declare(strict_types=1);

namespace Modules\Progressioni\Filament\Resources\ProgressioniResource\Pages;

use Filament\Actions;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Tables;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Enums\ActionsPosition;
use Filament\Tables\Enums\FiltersLayout;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\TernaryFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Arr;
use Modules\Progressioni\Actions\ShowMailSendedAt;
use Modules\Progressioni\Filament\Actions\Bulk\SendMailBulkAction;
use Modules\Progressioni\Filament\Actions\Header\ImportCedDiffAction;
use Modules\Progressioni\Filament\Actions\Header\RicalcolaAction;
use Modules\Progressioni\Filament\Resources\ProgressioniResource;
use Modules\Progressioni\Models\Progressioni;
use Modules\Ptv\Actions\Filament\Actions\PopulateYearButton;
use Modules\Ptv\Actions\Filament\Actions\TrovaEsclusiButton;
use Modules\Ptv\Actions\GetValutatoriOptions;
use Modules\Ptv\Actions\PopulateByYearAction;
// use Illuminate\Database\Eloquent\SoftDeletingScope;
use Modules\Ptv\Filament\Actions\Bulk\ZipSchedeBulkAction;
use Modules\Ptv\Filament\Actions\Header\MergeDoubleRowCatecoYearAction;
use Modules\Ptv\Filament\Actions\Header\ZipSchedeAction;
use Modules\UI\Filament\Tables\Columns\GroupColumn;
use Modules\Xot\Actions\Filament\Actions\CopyFromLastYearButton;
use Modules\Xot\Filament\Actions\Header\ExportXlsAction;
use Modules\Xot\Filament\Resources\Pages\XotBaseListRecords;

use function Safe\date;

class ListProgressionis extends XotBaseListRecords
{
    protected static string $resource = ProgressioniResource::class;

    protected function getHeaderActions(): array
    {
        // app(PopulateByYearAction::class)->execute(Progressioni::class,'anno','2023');

        $anno = Arr::get($this->tableFilters, 'anno.value');

        return [
            // Actions\CreateAction::make(),
            app(CopyFromLastYearButton::class)
                ->execute(Progressioni::class, 'anno', $anno),
            app(PopulateYearButton::class)
                ->execute(Progressioni::class, 'anno', $anno),
            app(TrovaEsclusiButton::class)
                ->execute(Progressioni::class, 'anno', $anno),
            MergeDoubleRowCatecoYearAction::make(),
            ExportXlsAction::make(),
            RicalcolaAction::make(),
            // ImportCedDiffAction::make(),
            // ZipSchedeAction::make(),
        ];
    }

    public function getTableColumns(): array
    {
        return [
            TextColumn::make('id'),
            TextColumn::make('cognome')->toggleable(isToggledHiddenByDefault: true)->searchable(),
            TextColumn::make('matr')->toggleable(isToggledHiddenByDefault: true)->searchable(),

            IconColumn::make('ha_diritto')
                ->default(false)
                ->boolean(),

            TextColumn::make('motivo')
                // ->searchable() //diventa troppo lento
                ->wrap(),
            TextColumn::make('mail_sended_at')
                ->html()
                ->default(fn ($record) => app(ShowMailSendedAt::class)->execute($record)),
            // ->formatStateUsing(fn (string $state) => dddx($state)),

            /*
                GroupColumn::make('diritto')->schema([
                    //TextColumn::make('ha_diritto'),
                    IconColumn::make('ha_diritto')
                        ->default(false)
                        ->boolean(),
                    TextColumn::make('motivo')
                        ->wrap()
                        //->formatStateUsing(fn (string $state) => dddx($state))
                        //->listWithLineBreaks()
                        //->badge()
                        //->separator(','),
                ]),
                */
            GroupColumn::make('lavoratore')->schema([
                TextColumn::make('matr')->searchable(),
                TextColumn::make('cognome')->searchable(),
                TextColumn::make('nome'),
                TextColumn::make('email'),
            ]),
            GroupColumn::make('criteri')->schema([
                TextColumn::make('gg'),
                TextColumn::make('gg_no_asz'),
                TextColumn::make('gg_asz'),
                TextColumn::make('gg_cateco_no_posfun_no_asz'),
                TextColumn::make('eta'),
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

    public function getListTableColumns(): array
    {
        return [
            'id' => Tables\Columns\TextColumn::make('id')
                ->sortable(),
            'cognome' => Tables\Columns\TextColumn::make('cognome')
                ->searchable()
                ->sortable()
                ->toggleable(isToggledHiddenByDefault: true),
            'matr' => Tables\Columns\TextColumn::make('matr')
                ->searchable()
                ->sortable()
                ->toggleable(isToggledHiddenByDefault: true),
            'ha_diritto' => Tables\Columns\IconColumn::make('ha_diritto')
                ->boolean()
                ->sortable(),
            'motivo' => Tables\Columns\TextColumn::make('motivo')
                ->wrap()
                ->sortable(),
            'mail_sended_at' => Tables\Columns\TextColumn::make('mail_sended_at')
                ->dateTime()
                ->sortable(),
            'anno' => Tables\Columns\TextColumn::make('anno')
                ->numeric()
                ->sortable(),
            'created_at' => Tables\Columns\TextColumn::make('created_at')
                ->dateTime()
                ->sortable()
                ->toggleable(isToggledHiddenByDefault: true),
            'updated_at' => Tables\Columns\TextColumn::make('updated_at')
                ->dateTime()
                ->sortable()
                ->toggleable(isToggledHiddenByDefault: true)
        ];
    }

    /*
    public function getTableFilters(): array
    {
        return [
            app(\Modules\Xot\Actions\Filament\Filter\GetYearFilter::class)->execute('anno', intval(date('Y')) - 3, intval(date('Y'))),


            SelectFilter::make('valutatore_id')
                    ->label('valutatore')
                    ->options(static fn (Get $get, Set $set) => app(GetValutatoriOptions::class)
                        ->execute('Progressioni', '2024')),

            TernaryFilter::make('ha_diritto'),
        ];
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
                        ->options(fn (callable $get, callable $set) => app(GetValutatoriOptions::class)
                            ->execute('Progressioni', $get('anno'))),
                    // TernaryFilter::make('ha_diritto'),
                    // *
                    Select::make('ha_diritto')->options([
                        null => '-',
                        true => 'Sì',
                        false => 'No',
                    ]),
                    // */
                    // Forms\Components\View::make('indennitacondizionilavoro::filament.tables.columns.button'),
                ])
                ->query(static function (Builder $query, array $data) {
                    if ($data['anno'] == null /* || null == $data['valutatore_id'] */) {
                        return $query->where('id', 0);
                    }

                    // unset($data['quadrimestre']);
                    if ($data['valutatore_id'] == null) {
                        unset($data['valutatore_id']);
                    }

                    if ($data['ha_diritto'] == null) {
                        unset($data['ha_diritto']);
                    }

                    $query = $query->where($data);

                    return $query;
                })->columns(4),
            // TernaryFilter::make('ha_diritto'),
        ];
    }

    public function getTableActions(): array
    {
        return [
            EditAction::make()->label('')->tooltip('Modifica'),
            Tables\Actions\ViewAction::make()->label('')->tooltip('Vedi'),
        ];
    }

    public function getTableBulkActions(): array
    {
        return [
            // Tables\Actions\BulkActionGroup::make([
            // Tables\Actions\DeleteBulkAction::make(),
            SendMailBulkAction::make('send-mail'),
            ZipSchedeBulkAction::make('zip-schede'),
            // ]),
        ];
    }

    public function table(Table $table): Table
    {
        return $table
            ->columns($this->getTableColumns())
            ->filters($this->getTableFilters())
            ->filtersLayout(FiltersLayout::AboveContent)
            ->filtersFormColumns(1)
           //  ->filtersFormWidth('4xl')
            ->persistFiltersInSession()
            ->actions($this->getTableActions())
            ->actionsPosition(ActionsPosition::BeforeColumns)
            ->bulkActions($this->getTableBulkActions());
    }
}
