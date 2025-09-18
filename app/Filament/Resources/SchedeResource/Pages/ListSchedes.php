<?php

declare(strict_types=1);

namespace Modules\Progressioni\Filament\Resources\SchedeResource\Pages;

use Filament\Actions;
use Filament\Forms\Components\Select;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Tables;
use Filament\Tables\Actions\Action;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Arr;
use Modules\Progressioni\Actions\Populate;
use Modules\Progressioni\Filament\Resources\SchedeResource;
use Modules\Progressioni\Models\Schede;
use Modules\Ptv\Actions\FixValutatoreIdByAnno;
use Modules\Ptv\Actions\GetValutatoriOptions;
use Modules\Ptv\Filament\Actions\Bulk\SendSchedeBulkAction;
use Modules\UI\Enums\TableLayoutEnum;
use Modules\UI\Filament\Tables\Columns\GroupColumn;
use Modules\Xot\Actions\Filament\Actions\CopyFromLastYearButton;
use Modules\Xot\Filament\Actions\Header\ExportXlsAction;
use Modules\Xot\Filament\Actions\Table\PdfAction;
use Modules\Xot\Filament\Resources\Pages\XotBaseListRecords;
use Modules\Xot\Filament\Traits\HasXotTable;
use Modules\Xot\Filament\Traits\TransTrait;

class ListSchedes extends XotBaseListRecords
{
    use HasXotTable;
    use TransTrait;

    public TableLayoutEnum $layoutView = TableLayoutEnum::LIST;

    protected static string $resource = SchedeResource::class;

    protected function getHeaderActions(): array
    {
        $anno = Arr::get($this->tableFilters, 'anno.value');

        return [
            // Actions\CreateAction::make(),
            // app(CopyFromLastYearButton::class)
            //    ->execute(Schede::class, 'anno', $anno),
            SchedeResource\Actions\Header\MakePdfAction::make(),
            // ExportXlsAction::make(), // da togliere campi etc etc
        ];
    }

    public function getListTableColumns(): array
    {
        return [
            'id' => Tables\Columns\TextColumn::make('id')
                ->sortable(),
            'matr' => Tables\Columns\TextColumn::make('matr')
                ->searchable()
                ->sortable()
                ->toggleable(isToggledHiddenByDefault: true),
            'cognome' => Tables\Columns\TextColumn::make('cognome')
                ->searchable()
                ->sortable()
                ->toggleable(isToggledHiddenByDefault: true),
            'nome' => Tables\Columns\TextColumn::make('nome')
                ->searchable()
                ->sortable(),
            'email' => Tables\Columns\TextColumn::make('email')
                ->searchable()
                ->sortable(),
            'ha_diritto' => Tables\Columns\IconColumn::make('ha_diritto')
                ->boolean()
                ->sortable(),
            'motivo' => Tables\Columns\TextColumn::make('motivo')
                ->wrap()
                ->sortable(),
            'categoria_ecoval' => Tables\Columns\TextColumn::make('categoria_ecoval')
                ->searchable()
                ->sortable(),
            'posfunval' => Tables\Columns\TextColumn::make('posfunval')
                ->searchable()
                ->sortable(),
            'disci1' => Tables\Columns\TextColumn::make('disci1')
                ->searchable()
                ->sortable(),
            'disci1_txt' => Tables\Columns\TextColumn::make('disci1_txt')
                ->searchable()
                ->sortable(),
            'stabi' => Tables\Columns\TextColumn::make('stabi')
                ->searchable()
                ->sortable(),
            'stabi_txt' => Tables\Columns\TextColumn::make('stabi_txt')
                ->searchable()
                ->sortable(),
            'repar' => Tables\Columns\TextColumn::make('repar')
                ->searchable()
                ->sortable(),
            'repar_txt' => Tables\Columns\TextColumn::make('repar_txt')
                ->searchable()
                ->sortable(),
            'dal' => Tables\Columns\TextColumn::make('dal')
                ->date()
                ->sortable(),
            'al' => Tables\Columns\TextColumn::make('al')
                ->date()
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

    public function getTableFilters(): array
    {
        return [
            SelectFilter::make('anno/valutatore')
                ->label('anno/valutatore')
                ->form([
                    Select::make('anno')
                        ->options([
                            // '2022' => '2022',
                            // '2023' => '2023',
                            '2024' => '2024',
'2025' => '2025',
                        ])
                        ->reactive()
                        ->live(),

                    Select::make('valutatore_id')
                        ->label('valutatore')
                        ->options(static fn (Get $get, Set $set) => app(GetValutatoriOptions::class)
                            ->execute('Progressioni', $get('anno'))),
                ])

                ->query(static function (Builder $query, array $data) {
                    if ($data['anno'] == null /* || null == $data['valutatore_id'] */) {
                        return $query->where('id', 0);
                    }
                    app(Populate::class)->execute($data);
                    app(FixValutatoreIdByAnno::class)->execute('Progressioni', 'Schede', $data['anno']);

                    $query = $query->where($data);

                    return $query;
                })

                ->columns(4),
        ];
    }

    public function getTableActions(): array
    {
        return [
            // Tables\Actions\ViewAction::make(),

            Action::make('compila')
                ->label('')
                ->tooltip('Compila scheda')
                ->icon('heroicon-m-pencil-square')
                ->url(fn ($record): string => SchedeResource::getUrl('compila', ['record' => $record]))
                ->visible(fn ($record) => $record->ha_diritto),
            PdfAction::make('pdf')
                ->visible(fn ($record) => $record->ha_diritto),

            // EditAction::make(),
            // Tables\Actions\EditAction::make(),
        ];
    }

    public function getTableBulkActions(): array
    {
        return [
            // DeleteBulkAction::make(),
            SendSchedeBulkAction::make(),
        ];
    }
}
