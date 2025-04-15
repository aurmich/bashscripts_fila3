<?php

declare(strict_types=1);

namespace Modules\Incentivi\Filament\Resources;

use Filament\Forms;
use Filament\Forms\Get;
use Modules\Incentivi\Filament\Resources\DefaultActivityResource\Pages;
use Modules\Incentivi\Models\DefaultActivity;
use Modules\Xot\Filament\Resources\XotBaseResource;

class DefaultActivityResource extends XotBaseResource
{
    protected static ?string $model = DefaultActivity::class;

    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document-list';

    protected static ?string $navigationGroup = 'Impostazioni';

    protected static ?int $navigationSort = 5;

    /**
     * @return array<string, \Filament\Forms\Components\Component>
     */
    public static function getFormSchema(): array
    {
        return [
            'nome' => Forms\Components\TextInput::make('nome')
                ->string()
                ->required()
                ->maxLength(255),
            'tipo' => Forms\Components\Select::make('tipo')
                ->required()
                ->options([
                    'Lavori' => 'Lavori',
                    'Servizi' => 'Servizi',
                    'Misti' => 'Misti',
                ]),
            'appartiene_a_liquidazione_a_fasi' => Forms\Components\Radio::make('appartiene_a_liquidazione_a_fasi')
                ->boolean()
                ->required()
                ->inline()
                ->inlineLabel(false)
                ->live(),
            Forms\Components\Select::make('liquidazione_fasi')
                ->options([
                    'Prima' => 'Prima fase',
                    'Seconda' => 'Seconda fase',
                    'Entrambe' => 'Entrambe',
                ])
                ->hidden(fn (Get $get): bool => ! $get('appartiene_a_liquidazione_a_fasi')),
            Forms\Components\TextInput::make('quota_percentuale')
                ->required()
                ->suffix('%'),
            Forms\Components\TextInput::make('importo')
                ->required()
                ->suffix('€')
                ->disabled()
                ->placeholder('DA ASSEGNARE'),
            Forms\Components\TextInput::make('anno_competenza')
                ->required()
                ->maxLength(4),
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
            'index' => Pages\ListDefaultActivities::route('/'),
            // 'create' => Pages\CreateDefaultActivity::route('/create'),
            // 'edit' => Pages\EditDefaultActivity::route('/{record}/edit'),
        ];
    }

    public static function getModelLabel(): string
    {
        return __('Attività Default');
    }

    public static function getPluralModelLabel(): string
    {
        return __('Attività Default');
    }
}
