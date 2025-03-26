<?php

namespace Modules\Progressioni\Filament\Resources\CriteriOptionResource\Pages;

use Filament\Actions;
use Illuminate\Support\Arr;
use Modules\Progressioni\Filament\Resources\CriteriOptionResource;
use Modules\Progressioni\Models\CriteriOption;
use Modules\Xot\Actions\Filament\Actions\CopyFromLastYearButton;
use Modules\Xot\Filament\Resources\Pages\XotBaseListRecords;

class ListCriteriOptions extends XotBaseListRecords
{
    protected static string $resource = CriteriOptionResource::class;

    protected function getHeaderActions(): array
    {
        $anno = Arr::get($this->tableFilters, 'anno.value');

        return [
            Actions\CreateAction::make(),
            app(CopyFromLastYearButton::class)
                ->execute(CriteriOption::class, 'anno', $anno),
        ];
    }

    public function getListTableColumns(): array
    {
        return [
            'id' => Tables\Columns\TextColumn::make('id')
                ->sortable(),
            'name' => Tables\Columns\TextColumn::make('name')
                ->searchable()
                ->sortable(),
            'value' => Tables\Columns\TextColumn::make('value')
                ->searchable()
                ->sortable(),
            'type' => Tables\Columns\TextColumn::make('type')
                ->searchable()
                ->sortable(),
            'anno' => Tables\Columns\TextColumn::make('anno')
                ->numeric()
                ->sortable(),
            'note' => Tables\Columns\TextColumn::make('note')
                ->html()
                ->wrap()
                ->searchable(),
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
