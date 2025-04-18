<?php

declare(strict_types=1);

namespace Modules\Job\Filament\Resources\ImportResource\Pages;

use Filament\Actions;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Modules\Job\Filament\Resources\ImportResource;
use Modules\Xot\Filament\Resources\Pages\XotBaseListRecords;

class ListImports extends XotBaseListRecords
{
    protected static string $resource = ImportResource::class;

    public function getListTableColumns(): array
    {
        return [
            'id' => TextColumn::make('id')
                ->searchable()
                ->sortable(),
            'file_name' => TextColumn::make('file_name')
                ->searchable()
                ->sortable()
                ->wrap(),
            'importer' => TextColumn::make('importer')
                ->searchable()
                ->sortable(),
            'processed_rows' => TextColumn::make('processed_rows')
                ->numeric()
                ->sortable(),
            'total_rows' => TextColumn::make('total_rows')
                ->numeric()
                ->sortable(),
            'successful_rows' => TextColumn::make('successful_rows')
                ->numeric()
                ->sortable(),
            'completed_at' => TextColumn::make('completed_at')
                ->dateTime()
                ->sortable(),
            'created_at' => TextColumn::make('created_at')
                ->dateTime()
                ->sortable(),
            'updated_at' => TextColumn::make('updated_at')
                ->dateTime()
                ->sortable(),
        ];
    }

    public function getTableFilters(): array
    {
        return [
        ];
    }

    public function getTableActions(): array
    {
        return [
            Tables\Actions\EditAction::make(),
        ];
    }

    public function getTableBulkActions(): array
    {
        return [
            Tables\Actions\DeleteBulkAction::make(),
        ];
    }
}
