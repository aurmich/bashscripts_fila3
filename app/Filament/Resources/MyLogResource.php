<?php

declare(strict_types=1);

<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> f3d4311a (Squashed 'laravel/Modules/Progressioni/' content from commit 72d99eef1)
namespace Modules\Progressioni\Filament\Resources;

use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Modules\Progressioni\Filament\Resources\MyLogResource\Pages;
use Modules\Progressioni\Filament\Resources\MyLogResource\RelationManagers;
use Modules\Progressioni\Models\MyLog;
<<<<<<< HEAD
=======
namespace Modules\Performance\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Modules\Performance\Filament\Resources\MyLogResource\Pages;
use Modules\Performance\Models\MyLog;
>>>>>>> 961ad402 (first)
=======
>>>>>>> f3d4311a (Squashed 'laravel/Modules/Progressioni/' content from commit 72d99eef1)
use Modules\Xot\Filament\Resources\XotBaseResource;

class MyLogResource extends XotBaseResource
{
    protected static ?string $model = MyLog::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function getFormSchema(): array
    {
        return [
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> f3d4311a (Squashed 'laravel/Modules/Progressioni/' content from commit 72d99eef1)
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

<<<<<<< HEAD
=======
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

    

    

>>>>>>> 961ad402 (first)
=======
>>>>>>> f3d4311a (Squashed 'laravel/Modules/Progressioni/' content from commit 72d99eef1)
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListMyLogs::route('/'),
            'create' => Pages\CreateMyLog::route('/create'),
            'edit' => Pages\EditMyLog::route('/{record}/edit'),
        ];
    }
}
