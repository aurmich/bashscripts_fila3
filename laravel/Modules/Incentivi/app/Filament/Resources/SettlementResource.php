<?php

declare(strict_types=1);

namespace Modules\Incentivi\Filament\Resources;

use Filament\Forms;
use Filament\Forms\Form;
use Modules\Incentivi\Filament\Resources\SettlementResource\Pages;
use Modules\Xot\Filament\Resources\XotBaseResource;

class SettlementResource extends XotBaseResource
{
    protected static ?string $navigationIcon = 'heroicon-o-currency-euro';

    protected static ?string $navigationGroup = 'Incentivi';

    protected static ?int $navigationSort = 4;

    public static function getFormSchema(): array
    {
        return [
            Forms\Components\Section::make('Informazioni')
                ->schema([
                    Forms\Components\TextInput::make('denominazione')
                        ->label('Denominazione')
                        ->required()
                        ->maxLength(255),
                    // Forms\Components\Select::make('tipologia')
                    //     ->label('Tipo di liquidazione')
                    //     ->options([
                    //         '1-fase' => '1° fase',
                    //         '2-fase' => '2° fase',
                    //         'unica' => 'Unica',
                    //     ])
                    //     ->required()
                    //     ->default('unica'),
                    Forms\Components\TextInput::make('importo')
                        ->money(),
                ])->columnSpan(1),
        ];
        // )->columns(3);
    }

    public static function getRelations(): array
    {
        return [
            // EmployeesRelationManager::class
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSettlements::route('/'),
            'create' => Pages\CreateSettlement::route('/create'),
            'edit' => Pages\EditSettlement::route('/{record}/edit'),
        ];
    }

    public static function getModelLabel(): string
    {
        return __('Liquidazione');
    }

    public static function getPluralModelLabel(): string
    {
        return __('Liquidazioni');
    }
}
