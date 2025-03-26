<?php

declare(strict_types=1);

namespace Modules\Progressioni\Filament\Resources\AssenzeResource\Pages;

use Filament\Actions;
use Illuminate\Support\Arr;
use Modules\Progressioni\Filament\Resources\AssenzeResource;
use Modules\Progressioni\Models\Assenze;
use Modules\Xot\Actions\Filament\Actions\CopyFromLastYearButton;
use Modules\Xot\Filament\Resources\Pages\XotBaseListRecords;

class ListAssenzes extends XotBaseListRecords
{
    protected static string $resource = AssenzeResource::class;

    protected function getHeaderActions(): array
    {
        $parent_actions = parent::getHeaderActions();
        $anno = Arr::get($this->tableFilters, 'anno.value');

        $actions = [
            Actions\CreateAction::make(),
            app(CopyFromLastYearButton::class)->execute(Assenze::class, 'anno', $anno),
        ];

        return array_merge($actions, $parent_actions);
    }

    public function getListTableColumns(): array
    {
        return [
            'matr' => Tables\Columns\TextColumn::make('matr')
                ->searchable()
                ->sortable(),
            'cognome' => Tables\Columns\TextColumn::make('cognome')
                ->searchable()
                ->sortable(),
            'nome' => Tables\Columns\TextColumn::make('nome')
                ->searchable()
                ->sortable(),
            'anno' => Tables\Columns\TextColumn::make('anno')
                ->numeric()
                ->sortable(),
            'giorni_assenza' => Tables\Columns\TextColumn::make('giorni_assenza')
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
}
