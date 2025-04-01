<?php

declare(strict_types=1);

namespace Modules\Incentivi\Filament\Resources\CapitalPercentageResource\Pages;

use Filament\Tables;
use Modules\Incentivi\Filament\Resources\CapitalPercentageResource;
use Modules\Incentivi\Filament\Resources\CapitalPercentageResource\Actions\CapitalPercentageSeederAction;
use Modules\Xot\Filament\Resources\Pages\XotBaseListRecords;

class ListCapitalPercentages extends XotBaseListRecords
{
    protected static string $resource = CapitalPercentageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ...parent::getHeaderActions(),
            CapitalPercentageSeederAction::make('Carica Percentuali Fondo'),
        ];
    }

    /**
     * @return array<string, \Filament\Tables\Columns\Column>
     */
    public function getListTableColumns(): array
    {
        return [
            'nome' => Tables\Columns\TextColumn::make('nome')
                ->searchable(),
            'descrizione' => Tables\Columns\TextColumn::make('descrizione')
                ->searchable(),
            'valore' => Tables\Columns\TextColumn::make('valore')
                ->numeric()
                ->sortable(),
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

    // public function getTableActions():array{

    //     $acts=[
    //         ...parent::getTableActions(),
    //         ];
    //     return $acts;
    // }
}
