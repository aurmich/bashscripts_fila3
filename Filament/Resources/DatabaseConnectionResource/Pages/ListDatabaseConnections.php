<?php

declare(strict_types=1);

namespace Modules\Setting\Filament\Resources\DatabaseConnectionResource\Pages;

use Filament\Resources\Pages\ListRecords;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Actions\Action;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\CreateAction;
use Modules\Setting\Filament\Resources\DatabaseConnectionResource;

class ListDatabaseConnections extends ListRecords
{
    protected static string $resource = DatabaseConnectionResource::class;

    public function getListTableColumns(): array
    {
        return [
            'name' => TextColumn::make('name')
                ->searchable(),

            'driver' => TextColumn::make('driver')
                ->searchable(),

            'host' => TextColumn::make('host')
                ->searchable(),

            'database' => TextColumn::make('database')
                ->searchable(),

            'status' => BadgeColumn::make('status')
                ->colors([
                    'danger' => 'inactive',
                    'warning' => 'testing',
                    'success' => 'active',
                ]),

            'created_at' => TextColumn::make('created_at')
                ->dateTime()
                ->sortable(),
        ];
    }

    public function getTableFilters(): array
    {
        return [
            SelectFilter::make('driver')
                ->options([
                    'mysql' => 'MySQL',
                    'pgsql' => 'PostgreSQL',
                    'sqlite' => 'SQLite',
                    'sqlsrv' => 'SQL Server',
                ]),

            SelectFilter::make('status')
                ->options([
                    'active' => 'Active',
                    'inactive' => 'Inactive',
                    'testing' => 'Testing',
                ]),
        ];
    }

    public function getTableActions(): array
    {
        return [
            EditAction::make(),
            DeleteAction::make(),
            Action::make('test')
                ->action(fn ($record) => $record->testConnection())
                ->icon('heroicon-o-check-circle')
                ->color('success'),
        ];
    }

    public function getTableBulkActions(): array
    {
        return [
            DeleteBulkAction::make(),
        ];
    }

    public function getTableHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
