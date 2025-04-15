<?php

declare(strict_types=1);

namespace Modules\Setting\Filament\Resources\DatabaseConnectionResource\Pages;

<<<<<<< HEAD
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
=======
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Modules\Setting\Filament\Actions\Table\DatabaseBackupTableAction;
use Modules\Setting\Filament\Resources\DatabaseConnectionResource;
use Modules\Xot\Filament\Pages\XotBaseListRecords;

class ListDatabaseConnections extends XotBaseListRecords
{
    protected static string $resource = DatabaseConnectionResource::class;

    public function getTableColumns(): array
    {
        return [
            TextColumn::make('name')->searchable()->sortable(),
            TextColumn::make('driver')->searchable()->sortable(),
            TextColumn::make('database')->searchable()->sortable(),
>>>>>>> origin/dev
        ];
    }

    public function getTableFilters(): array
    {
        return [
<<<<<<< HEAD
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
=======
>>>>>>> origin/dev
        ];
    }

    public function getTableActions(): array
    {
        return [
<<<<<<< HEAD
            EditAction::make(),
            DeleteAction::make(),
            Action::make('test')
                ->action(fn ($record) => $record->testConnection())
                ->icon('heroicon-o-check-circle')
                ->color('success'),
=======
            // Tables\Actions\EditAction::make(),
            DatabaseBackupTableAction::make(),
>>>>>>> origin/dev
        ];
    }

    public function getTableBulkActions(): array
    {
        return [
<<<<<<< HEAD
            DeleteBulkAction::make(),
        ];
    }

    public function getTableHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
=======
            // Tables\Actions\BulkActionGroup::make([
            Tables\Actions\DeleteBulkAction::make(),
            // ]),
        ];
    }

    public function table(Table $table): Table
    {
        return $table
            ->columns($this->getTableColumns())
            ->filters($this->getTableFilters())
            ->actions($this->getTableActions())
            ->bulkActions($this->getTableBulkActions());
>>>>>>> origin/dev
    }
}
