<?php

declare(strict_types=1);

namespace Modules\Incentivi\Filament\Resources;

use Filament\Forms;
use Modules\Incentivi\Filament\Resources\CapitalPercentageResource\Pages;
use Modules\Incentivi\Models\CapitalPercentage;
use Modules\Xot\Filament\Resources\XotBaseResource;

class CapitalPercentageResource extends XotBaseResource
{
    protected static ?string $model = CapitalPercentage::class;

    protected static ?string $navigationIcon = 'heroicon-o-receipt-percent';

    protected static ?string $navigationGroup = 'Impostazioni';

    protected static ?int $navigationSort = 6;

    /**
     * @return array<string, \Filament\Forms\Components\Component>
     */
    public static function getFormSchema(): array
    {
        return [
            'nome' => Forms\Components\TextInput::make('nome')
                ->required()
                ->maxLength(255),
            'descrizione' => Forms\Components\TextInput::make('descrizione')
                ->required()
                ->maxLength(255),
            'valore' => Forms\Components\TextInput::make('valore')
                ->required()
                ->numeric()
                ->suffix('%'),
        ];
    }

    public static function getRelations(): array
    {
        return [
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCapitalPercentages::route('/'),
            // 'create' => Pages\CreateCapitalPercentage::route('/create'),
            // 'edit' => Pages\EditCapitalPercentage::route('/{record}/edit'),
        ];
    }

    public static function getModelLabel(): string
    {
        return __('Percentuale Fondo');
    }

    public static function getPluralModelLabel(): string
    {
        return __('Percentuali Fondo');
    }
}
