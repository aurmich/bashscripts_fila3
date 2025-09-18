<?php

declare(strict_types=1);

namespace Modules\Setting\Filament\Resources;

use Filament\Forms\Form;
use Filament\Resources\Resource;
use Modules\Setting\Filament\Resources\DatabaseConnectionResource\Pages;
use Modules\Setting\Models\DatabaseConnection;

class DatabaseConnectionResource extends Resource
{
    protected static ?string $model = DatabaseConnection::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
            ]);
    }

    public static function getRelations(): array
    {
        return [
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListDatabaseConnections::route('/'),
            'create' => Pages\CreateDatabaseConnection::route('/create'),
            'edit' => Pages\EditDatabaseConnection::route('/{record}/edit'),
        ];
    }
}
