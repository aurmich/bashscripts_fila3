<?php

declare(strict_types=1);

namespace Modules\Setting\Filament\Resources\DatabaseConnectionResource\Pages;

use Filament\Resources\Pages\ListRecords;
use Modules\Setting\Filament\Resources\DatabaseConnectionResource;

class ListDatabaseConnections extends ListRecords
{
    protected static string $resource = DatabaseConnectionResource::class;

    public function getListTableColumns(): array
    {
        return [
            'name' => Tables\Columns\TextColumn::make('name')
                ->searchable(),

            'driver' => Tables\Columns\TextColumn::make('driver')
                ->searchable(),

            'host' => Tables\Columns\TextColumn::make('host')
                ->searchable(),

            'database' => Tables\Columns\TextColumn::make('database')
                ->searchable(),

            'status' => Tables\Columns\BadgeColumn::make('status')
                ->colors([
                    'danger' => 'inactive',
                    'warning' => 'testing',
                    'success' => 'active',
                ]),

            'created_at' => Tables\Columns\TextColumn::make('created_at')
                ->dateTime()
                ->sortable(),
        ];
    }

    public function getTableFilters(): array
    {
        return [
            Tables\Filters\SelectFilter::make('driver')
                ->options([
                    'mysql' => 'MySQL',
                    'pgsql' => 'PostgreSQL',
                    'sqlite' => 'SQLite',
                    'sqlsrv' => 'SQL Server',
                ]),

            Tables\Filters\SelectFilter::make('status')
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
            Tables\Actions\EditAction::make(),
            Tables\Actions\DeleteAction::make(),
            Tables\Actions\Action::make('test')
                ->action(fn ($record) => $record->testConnection())
                ->icon('heroicon-o-check-circle')
                ->color('success'),
        ];
    }

    public function getTableBulkActions(): array
    {
        return [
            Tables\Actions\DeleteBulkAction::make(),
        ];
    }

    public function getTableHeaderActions(): array
    {
        return [
            Tables\Actions\CreateAction::make(),
        ];
    }
}
