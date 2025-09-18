<?php

<<<<<<< HEAD
declare(strict_types=1);

namespace Modules\Progressioni\Filament\Resources;

use Filament\Forms\Components\TextInput;
use Modules\Progressioni\Filament\Resources\CriteriEsclusioneResource\Pages;
use Modules\Progressioni\Filament\Resources\CriteriEsclusioneResource\RelationManagers;
use Modules\Progressioni\Models\CriteriEsclusione;
=======
namespace Modules\Performance\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Modules\Performance\Filament\Resources\CriteriEsclusioneResource\Pages;
use Modules\Performance\Models\CriteriEsclusione;
>>>>>>> 961ad402 (first)
use Modules\Xot\Filament\Resources\XotBaseResource;

use function Safe\date;

class CriteriEsclusioneResource extends XotBaseResource
{
    protected static ?string $model = CriteriEsclusione::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function getFormSchema(): array
    {
        return [
<<<<<<< HEAD
            'id' => TextInput::make('id')
                ->disabled(),
            'name' => TextInput::make('name')
                ->required()
                ->maxLength(50),
            'field_name' => TextInput::make('field_name')
                ->required()
                ->maxLength(50),
            'op' => TextInput::make('op')
                ->required()
                ->maxLength(50),
            'value' => TextInput::make('value')
                ->required()
                ->maxLength(50),
            'type' => TextInput::make('type')
                ->maxLength(50),
            'anno' => TextInput::make('anno')
                ->required()
                ->numeric()
                ->default(date('Y')),
        ];
    }

    /**
     * @return array<RelationManagers>
     */
    public static function getRelations(): array
    {
        return [
        ];
    }

=======
            Forms\Components\TextInput::make('name')
                ->maxLength(50),
            Forms\Components\TextInput::make('field_name')
                ->maxLength(50),
            Forms\Components\TextInput::make('op')
                ->maxLength(50),
            Forms\Components\TextInput::make('value')
                ->maxLength(50),
            Forms\Components\TextInput::make('anno')
                ->numeric(),
        ];
    }

    public static function getListTableColumns(): array
    {
        return [
            'name' => Tables\Columns\TextColumn::make('name')
                ->searchable(),
            'field_name' => Tables\Columns\TextColumn::make('field_name')
                ->searchable(),
            'op' => Tables\Columns\TextColumn::make('op')
                ->searchable(),
            'value' => Tables\Columns\TextColumn::make('value')
                ->searchable(),
            'anno' => Tables\Columns\TextColumn::make('anno')
                ->numeric()
                ->sortable(),
        ];
    }

    public static function getTableFilters(): array
    {
        return [
            'anno' => app(\Modules\Xot\Actions\Filament\Filter\GetYearFilter::class)
                ->execute('anno', intval(date('Y')) - 3, intval(date('Y'))),
        ];
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
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCriteriEsclusiones::route('/'),
            'create' => Pages\CreateCriteriEsclusione::route('/create'),
            'edit' => Pages\EditCriteriEsclusione::route('/{record}/edit'),
        ];
    }
}
