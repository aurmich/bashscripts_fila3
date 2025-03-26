<?php

declare(strict_types=1);

namespace Modules\Performance\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Modules\Performance\Filament\Resources\MyLogResource\Pages;
use Modules\Performance\Models\MyLog;
use Modules\Xot\Filament\Resources\XotBaseResource;

class MyLogResource extends XotBaseResource
{
    protected static ?string $model = MyLog::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function getFormSchema(): array
    {
        return [
            'id_tbl' => Forms\Components\TextInput::make('id_tbl')
                ->numeric(),
            'tbl' => Forms\Components\TextInput::make('tbl')
                ->maxLength(50),
            'id_approvaz' => Forms\Components\TextInput::make('id_approvaz')
                ->numeric(),
            'note' => Forms\Components\Textarea::make('note')
                ->columnSpanFull(),
            'data' => Forms\Components\Textarea::make('data')
                ->columnSpanFull(),
            'datemod' => Forms\Components\DateTimePicker::make('datemod'),
            'handle' => Forms\Components\TextInput::make('handle')
                ->maxLength(150),
            'created_by' => Forms\Components\TextInput::make('created_by')
                ->maxLength(255),
            'updated_by' => Forms\Components\TextInput::make('updated_by')
                ->maxLength(255),
        ];
    }

    public static function getListTableColumns(): array
    {
        return [
            'id_tbl' => Tables\Columns\TextColumn::make('id_tbl')
                ->numeric()
                ->sortable(),
            'tbl' => Tables\Columns\TextColumn::make('tbl')
                ->searchable(),
            'id_approvaz' => Tables\Columns\TextColumn::make('id_approvaz')
                ->numeric()
                ->sortable(),
            'datemod' => Tables\Columns\TextColumn::make('datemod')
                ->dateTime()
                ->sortable(),
            'handle' => Tables\Columns\TextColumn::make('handle')
                ->searchable(),
        ];
    }

    public static function getTableFilters(): array
    {
        return [];
    }

    public static function getTableActions(): array
    {
        return [
            'edit' => Tables\Actions\EditAction::make(),
        ];
    }

    public static function getTableBulkActions(): array
    {
        return [
            'delete' => Tables\Actions\DeleteBulkAction::make(),
        ];
    }

    

    

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListMyLogs::route('/'),
            'create' => Pages\CreateMyLog::route('/create'),
            'edit' => Pages\EditMyLog::route('/{record}/edit'),
        ];
    }
}
