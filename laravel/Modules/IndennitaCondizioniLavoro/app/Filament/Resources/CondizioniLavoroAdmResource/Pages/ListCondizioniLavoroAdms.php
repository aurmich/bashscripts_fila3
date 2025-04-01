<?php

namespace Modules\IndennitaCondizioniLavoro\Filament\Resources\CondizioniLavoroAdmResource\Pages;

use Filament\Actions;
use Illuminate\Support\Facades\Auth;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Resources\Pages\ListRecords;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use Modules\Ptv\Actions\GetValutatoriOptions;
use Modules\Ptv\Actions\FixValutatoreIdByAnno;
use Modules\IndennitaCondizioniLavoro\Actions\Populate;
use Modules\Xot\Filament\Resources\Pages\XotBaseListRecords;
use Modules\IndennitaCondizioniLavoro\Filament\Resources\CondizioniLavoroAdmResource;

class ListCondizioniLavoroAdms extends XotBaseListRecords
{
    protected static string $resource = CondizioniLavoroAdmResource::class;

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
                        /*
                    Select::make('valutatore_id')
                        ->label('valutatore')
                        ->options(static fn (callable $get, callable $set) => app(GetValutatoriOptions::class)
                            ->execute('IndennitaCondizioniLavoro', $get('anno'))),
                    */
                ])
                ->query(static function (Builder $query, array $data) {
                    if ($data['anno'] == null) {
                        return $query->where('id', 0);
                    }
                    //app(Populate::class)->execute($data);
                    //app(FixValutatoreIdByAnno::class)->execute('IndennitaCondizioniLavoro', 'CondizioniLavoro', $data['anno']);

                    $query = $query->where($data);

                    if (! Auth::user()?->hasRole('super-admin')) {
                        return $query->whereHas('indennitaTipoDettaglio');
                    }

                    return $query;
                })->columns(4),
        ];
    }
}
