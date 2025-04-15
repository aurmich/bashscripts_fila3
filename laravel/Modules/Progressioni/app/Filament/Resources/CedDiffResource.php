<?php

namespace Modules\Progressioni\Filament\Resources;

use Filament\Forms;
use Modules\Progressioni\Filament\Resources\CedDiffResource\Pages;
use Modules\Progressioni\Models\CedDiff;
use Modules\Xot\Filament\Resources\XotBaseResource;

class CedDiffResource extends XotBaseResource
{
    protected static ?string $model = CedDiff::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function getFormSchema(): array
    {
        return [
            'matr' => Forms\Components\TextInput::make('matr')
                ->required()
                ->numeric(),
            'cognome' => Forms\Components\TextInput::make('cognome')
                ->required()
                ->maxLength(50),
            'nome' => Forms\Components\TextInput::make('nome')
                ->required()
                ->maxLength(50),
            'cateco' => Forms\Components\TextInput::make('cateco')
                ->required()
                ->maxLength(50),
            'posfun' => Forms\Components\TextInput::make('posfun')
                ->required()
                ->maxLength(50),
            'anno' => Forms\Components\TextInput::make('anno')
                ->required()
                ->numeric()
                ->default(date('Y')),
            'created_by' => Forms\Components\TextInput::make('created_by')
                ->maxLength(50)
                ->disabled()
                ->dehydrated(false)
                ->hiddenOn('create'),
        ];
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCedDiffs::route('/'),
            'create' => Pages\CreateCedDiff::route('/create'),
            'edit' => Pages\EditCedDiff::route('/{record}/edit'),
        ];
    }
}
