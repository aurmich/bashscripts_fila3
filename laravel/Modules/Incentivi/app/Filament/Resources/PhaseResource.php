<?php

namespace Modules\Incentivi\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Phase;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Modules\Xot\Filament\Resources\XotBaseResource;
use Modules\Incentivi\Filament\Resources\PhaseResource\Pages;
use Modules\Incentivi\Filament\Resources\PhaseResource\Pages\ManagePhaseSettlements;
use Modules\Incentivi\Filament\Resources\PhaseResource\RelationManagers;

class PhaseResource extends XotBaseResource
{
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationLabel = 'Fasi';
    public static function getFormSchema(): array
    {
        return [
            Forms\Components\Section::make('Informazioni')
                ->schema([
                    Forms\Components\TextInput::make('name')
                        ->label('Nome')
                        ->required()
                        ->maxLength(255)
                        ->columnSpan(2),
                    Forms\Components\TextInput::make('description')
                        ->label('Descrizione')
                        ->required()
                        ->columnSpan(2),
                    Forms\Components\DatePicker::make('start_date')
                        ->label('Data di inizio')
                        ->required(),
                    Forms\Components\DatePicker::make('end_date')
                        ->label('Data di fine')
                        ->required(),

                ])->columns(4),
            Forms\Components\Section::make('Liquidazione')
                ->relationship('settlement')
                ->schema([
                    Forms\Components\TextInput::make('denominazione'),
                    Forms\Components\TextInput::make('importo')
                        ->required()
                        ->numeric()
                        ->suffix('€'),
                    ])->columns(2),
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPhases::route('/'),
            'create' => Pages\CreatePhase::route('/create'),
            'edit' => Pages\EditPhase::route('/{record}/edit'),
            // 'settlement' => Pages\ManagePhaseSettlements::route('/{record}/settlement'),
        ];
    }


}
