<?php

namespace Modules\Ptv\Filament\Resources\MessageResource\Pages;

use Filament\Actions;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Modules\Ptv\Filament\Resources\MessageResource;
use Modules\Xot\Filament\Resources\Pages\XotBaseListRecords;
use Modules\Xot\Filament\Traits\HasXotTable;

class ListMessages extends XotBaseListRecords
{
    use HasXotTable;

    protected static string $resource = MessageResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    public function getListTableColumns(): array
    {
        return [
            TextColumn::make('id'),
            TextColumn::make('parent_id'),
            TextColumn::make('type'),
            TextColumn::make('title'),
            // TextColumn::make('txt'),
            TextColumn::make('anno'),
        ];
    }

    public function getTableFilters(): array
    {
        return [
            SelectFilter::make('anno')
                ->options([
                    '2023' => '2023',
                    '2024' => '2024',
'2025' => '2025',
                ]),
        ];
    }
}
