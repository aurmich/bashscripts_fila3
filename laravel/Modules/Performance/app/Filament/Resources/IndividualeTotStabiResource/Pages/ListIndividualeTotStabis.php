<?php

namespace Modules\Performance\Filament\Resources\IndividualeTotStabiResource\Pages;

use Filament\Actions;
use Filament\Tables\Columns\TextColumn;
use Modules\Performance\Filament\Resources\IndividualeTotStabiResource;
use Modules\Xot\Filament\Resources\Pages\XotBaseListRecords;

class ListIndividualeTotStabis extends XotBaseListRecords
{
    protected static string $resource = IndividualeTotStabiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
            \Modules\Ptv\Filament\Actions\Header\CopyFromLastYearAction::make(),
        ];
    }

    public function getListTableColumns(): array
    {
        return [
            'stabi' => TextColumn::make('stabi')
                ->numeric()
                ->sortable(),
            'tot_budget_assegnato' => TextColumn::make('tot_budget_assegnato')
                ->numeric()
                ->sortable(),
            'tot_budget_assegnato_min_punteggio' => TextColumn::make('tot_budget_assegnato_min_punteggio')
                ->numeric()
                ->sortable(),
            'tot_quota_effettiva' => TextColumn::make('tot_quota_effettiva')
                ->numeric()
                ->sortable(),
            'tot_quota_effettiva_min_punteggio' => TextColumn::make('tot_quota_effettiva_min_punteggio')
                ->numeric()
                ->sortable(),
            'tot_resti' => TextColumn::make('tot_resti')
                ->numeric()
                ->sortable(),
            'tot_resti_min_punteggio' => TextColumn::make('tot_resti_min_punteggio')
                ->numeric()
                ->sortable(),
            'delta' => TextColumn::make('delta')
                ->numeric()
                ->sortable(),
            'delta_min_punteggio' => TextColumn::make('delta_min_punteggio')
                ->numeric()
                ->sortable(),
            'anno' => TextColumn::make('anno')
                ->numeric()
                ->sortable(),
            'n_diritto' => TextColumn::make('n_diritto')
                ->numeric()
                ->sortable(),
            'n_diritto_excellence' => TextColumn::make('n_diritto_excellence')
                ->numeric()
                ->sortable(),
        ];
    }
}
