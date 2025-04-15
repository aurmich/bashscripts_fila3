<?php

namespace Modules\Ptv\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Modules\Ptv\Filament\Resources\CriteriEsclusioneResource\Pages;
use Modules\Ptv\Models\CriteriEsclusione;
use Modules\Xot\Filament\Resources\XotBaseResource;

use function Safe\date;

class CriteriEsclusioneResource extends XotBaseResource
{
    protected static ?string $model = CriteriEsclusione::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function getFormSchema(): array
    {
        return [
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

    

    

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCriteriEsclusiones::route('/'),
            'create' => Pages\CreateCriteriEsclusione::route('/create'),
            'edit' => Pages\EditCriteriEsclusione::route('/{record}/edit'),
        ];
    }
}
