<?php

namespace Modules\Progressioni\Filament\Resources\SchedaCriteriResource\Pages;

use Filament\Actions;
use Illuminate\Support\Arr;
use Modules\Progressioni\Filament\Resources\SchedaCriteriResource;
use Modules\Progressioni\Models\SchedaCriteri;
use Modules\Ptv\Filament\Actions\Header\CopyFromLastYearAction;
use Modules\Xot\Actions\Filament\Actions\CopyFromLastYearButton;
use Modules\Xot\Filament\Actions\Header\ExportXlsAction;
use Modules\Xot\Filament\Resources\Pages\XotBaseListRecords;

class ListSchedaCriteris extends XotBaseListRecords
{
    protected static string $resource = SchedaCriteriResource::class;

    protected function getHeaderActions(): array
    {
        $anno = Arr::get($this->tableFilters, 'anno.value');

        return [
            Actions\CreateAction::make(),
            ExportXlsAction::make(),
            CopyFromLastYearAction::make(),
            app(CopyFromLastYearButton::class)
                ->execute(SchedaCriteri::class, 'anno', $anno),
        ];
    }

    public function getListTableColumns(): array
    {
        return [
            'id' => Tables\Columns\TextColumn::make('id')
                ->sortable(),
            'criteri_id' => Tables\Columns\TextColumn::make('criteri_id')
                ->numeric()
                ->sortable(),
            'scheda_id' => Tables\Columns\TextColumn::make('scheda_id')
                ->numeric()
                ->sortable(),
            'valore' => Tables\Columns\TextColumn::make('valore')
                ->numeric()
                ->sortable(),
            'note' => Tables\Columns\TextColumn::make('note')
                ->searchable()
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
}
