<?php

declare(strict_types=1);

namespace Modules\Performance\Filament\Resources\OrganizzativaTotStabiResource\Pages;

use Filament\Actions\CreateAction;
use Filament\Tables\Columns;
use Modules\Performance\Filament\Resources\OrganizzativaTotStabiResource;
use Modules\Ptv\Filament\Actions\Header\CopyFromLastYearAction;
use Modules\Xot\Filament\Resources\Pages\XotBaseListRecords;

class ListOrganizzativaTotStabis extends XotBaseListRecords
{
    protected static string $resource = OrganizzativaTotStabiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            'create' => CreateAction::make(),
            'copy' => CopyFromLastYearAction::make(),
        ];
    }

    public function getListTableColumns(): array
    {
        return [
            'stabi' => Columns\TextColumn::make('stabi')
                ->label('Stabilimento')
                ->numeric()
                ->sortable(),
            'tot_budget_assegnato' => Columns\TextColumn::make('tot_budget_assegnato')
                ->label('Budget Assegnato')
                ->numeric()
                ->sortable(),
            'tot_budget_assegnato_min_punteggio' => Columns\TextColumn::make('tot_budget_assegnato_min_punteggio')
                ->label('Budget Min Punteggio')
                ->numeric()
                ->sortable(),
            'tot_quota_effettiva' => Columns\TextColumn::make('tot_quota_effettiva')
                ->label('Quota Effettiva')
                ->numeric()
                ->sortable(),
            'tot_quota_effettiva_min_punteggio' => Columns\TextColumn::make('tot_quota_effettiva_min_punteggio')
                ->label('Quota Min Punteggio')
                ->numeric()
                ->sortable(),
            'tot_resti' => Columns\TextColumn::make('tot_resti')
                ->label('Resti')
                ->numeric()
                ->sortable(),
            'tot_resti_min_punteggio' => Columns\TextColumn::make('tot_resti_min_punteggio')
                ->label('Resti Min Punteggio')
                ->numeric()
                ->sortable(),
            'delta' => Columns\TextColumn::make('delta')
                ->label('Delta')
                ->numeric()
                ->sortable(),
            'delta_min_punteggio' => Columns\TextColumn::make('delta_min_punteggio')
                ->label('Delta Min Punteggio')
                ->numeric()
                ->sortable(),
            'anno' => Columns\TextColumn::make('anno')
                ->label('Anno')
                ->numeric()
                ->sortable(),
            'created_at' => Columns\TextColumn::make('created_at')
                ->label('Data Creazione')
                ->dateTime()
                ->sortable()
                ->toggleable(isToggledHiddenByDefault: true),
            'updated_at' => Columns\TextColumn::make('updated_at')
                ->label('Ultima Modifica')
                ->dateTime()
                ->sortable()
                ->toggleable(isToggledHiddenByDefault: true),
        ];
    }
}
