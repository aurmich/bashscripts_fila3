<?php

declare(strict_types=1);

namespace Modules\Progressioni\Filament\Resources;

use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Modules\Progressioni\Filament\Resources\MyLogResource\Pages;
use Modules\Progressioni\Filament\Resources\MyLogResource\RelationManagers;
use Modules\Progressioni\Models\MyLog;
use Modules\Xot\Filament\Resources\XotBaseResource;

class MyLogResource extends XotBaseResource
{
    protected static ?string $model = MyLog::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function getFormSchema(): array
    {
        return [
            'id' => Forms\Components\TextInput::make('id')
                ->disabled(),
            'id_tbl' => Forms\Components\TextInput::make('id_tbl')
                ->required()
                ->numeric(),
            'tbl' => Forms\Components\TextInput::make('tbl')
                ->required()
                ->maxLength(50),
            'id_approvaz' => Forms\Components\TextInput::make('id_approvaz')
                ->numeric(),
            'note' => Forms\Components\TextInput::make('note')
                ->maxLength(255),
            'obj' => Forms\Components\TextInput::make('obj')
                ->maxLength(50),
            'act' => Forms\Components\TextInput::make('act')
                ->required()
                ->maxLength(50),
            'datemod' => Forms\Components\TextInput::make('datemod')
                ->maxLength(50),
            'handle' => Forms\Components\TextInput::make('handle')
                ->maxLength(50),
        ];
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id'),
                TextColumn::make('id_tbl'),
                TextColumn::make('tbl'),
                TextColumn::make('id_approvaz'),
                TextColumn::make('note'),
                TextColumn::make('obj'),
                TextColumn::make('act'),
                // TextColumn::make('data'),
                TextColumn::make('datemod'),
                TextColumn::make('handle'),
            ])
            ->filters([
            ])
            ->persistFiltersInSession()
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    /**
     * @return RelationManagers[]
     */
    public static function getRelations(): array
    {
        return [
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
