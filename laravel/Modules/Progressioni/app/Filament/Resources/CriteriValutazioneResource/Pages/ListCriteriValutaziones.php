<?php

namespace Modules\Progressioni\Filament\Resources\CriteriValutazioneResource\Pages;

use Filament\Actions;
use Illuminate\Support\Arr;
use Modules\Progressioni\Filament\Resources\CriteriValutazioneResource;
use Modules\Progressioni\Models\CriteriValutazione;
use Modules\Xot\Actions\Filament\Actions\CopyFromLastYearButton;
use Modules\Xot\Filament\Resources\Pages\XotBaseListRecords;

class ListCriteriValutaziones extends XotBaseListRecords
{
    protected static string $resource = CriteriValutazioneResource::class;

    protected function getHeaderActions(): array
    {
        $anno = Arr::get($this->tableFilters, 'anno.value');

        return [
            Actions\CreateAction::make(),
            app(CopyFromLastYearButton::class)
                ->execute(CriteriValutazione::class, 'anno', $anno),
        ];
    }

    public function getListTableColumns(): array
    {
        return [
            'id' => Tables\Columns\TextColumn::make('id')
                ->sortable(),
            'parent_id' => Tables\Columns\TextColumn::make('parent_id')
                ->numeric()
                ->sortable(),
            'name' => Tables\Columns\TextColumn::make('name')
                ->searchable()
                ->sortable(),
            'label' => Tables\Columns\TextColumn::make('label')
                ->searchable()
                ->sortable(),
            'descr' => Tables\Columns\TextColumn::make('descr')
                ->searchable()
                ->sortable(),
            'post_type' => Tables\Columns\TextColumn::make('post_type')
                ->searchable()
                ->sortable(),
            'posizione' => Tables\Columns\TextColumn::make('posizione')
                ->numeric()
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
