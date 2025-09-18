<?php

namespace Modules\Progressioni\Filament\Resources\MaxCatecoPosfunAnnoResource\Pages;

use Filament\Actions;
use Filament\Tables;
use Illuminate\Support\Arr;
use Modules\Progressioni\Models\MaxCatecoPosfunAnno;
use Modules\Progressioni\Filament\Resources\MaxCatecoPosfunAnnoResource;
use Modules\Xot\Filament\Resources\Pages\XotBaseListRecords;
use Modules\Progressioni\Filament\Resources\MaxCatecoPosfunAnnoResource\Pages\CopyFromLastYearButton;

class ListMaxCatecoPosfunAnnos extends XotBaseListRecords
{
    protected static string $resource = MaxCatecoPosfunAnnoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
            app(CopyFromLastYearButton::class)
                ->execute(MaxCatecoPosfunAnno::class, 'anno', $this->getAnnoFromFilter()),
        ];
    }

    protected function getAnnoFromFilter(): ?int
    {
        return Arr::get($this->tableFilters, 'anno.value');
    }

    public function getListTableColumns(): array
    {
        return [
            'id' => Tables\Columns\TextColumn::make('id')
                ->sortable(),
            'cateco' => Tables\Columns\TextColumn::make('cateco')
                ->searchable()
                ->sortable(),
            'pos_fun' => Tables\Columns\TextColumn::make('pos_fun')
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
