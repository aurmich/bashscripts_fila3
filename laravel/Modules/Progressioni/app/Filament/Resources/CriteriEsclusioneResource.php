<?php

declare(strict_types=1);

namespace Modules\Progressioni\Filament\Resources;

use Filament\Forms\Components\TextInput;
use Modules\Progressioni\Filament\Resources\CriteriEsclusioneResource\Pages;
use Modules\Progressioni\Filament\Resources\CriteriEsclusioneResource\RelationManagers;
use Modules\Progressioni\Models\CriteriEsclusione;
use Modules\Xot\Filament\Resources\XotBaseResource;

use function Safe\date;

class CriteriEsclusioneResource extends XotBaseResource
{
    protected static ?string $model = CriteriEsclusione::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function getFormSchema(): array
    {
        return [
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

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCriteriEsclusiones::route('/'),
            'create' => Pages\CreateCriteriEsclusione::route('/create'),
            'edit' => Pages\EditCriteriEsclusione::route('/{record}/edit'),
        ];
    }
}
