<?php

declare(strict_types=1);

namespace Modules\Performance\Filament\Resources;

use Filament\Forms;
use Modules\Performance\Filament\Resources\CriteriValutazioneResource\Pages;
use Modules\Performance\Models\CriteriValutazione;
use Modules\Xot\Filament\Resources\XotBaseResource;

use function Safe\date;

class CriteriValutazioneResource extends XotBaseResource
{
    protected static ?string $model = CriteriValutazione::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function getFormSchema(): array
    {
        return [
            'id_padre' => Forms\Components\TextInput::make('id_padre')
                ->required()
                ->numeric()
                ->default(0),
            'nome' => Forms\Components\TextInput::make('nome')
                ->required()
                ->maxLength(50),
            'label' => Forms\Components\TextInput::make('label')
                ->required()
                ->maxLength(255),
            'descr' => Forms\Components\TextInput::make('descr')
                ->maxLength(50),
            'post_type' => Forms\Components\TextInput::make('post_type')
                ->required()
                ->maxLength(50),
            'posizione' => Forms\Components\TextInput::make('posizione')
                ->required()
                ->numeric()
                ->default(0),
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

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCriteriValutaziones::route('/'),
            'create' => Pages\CreateCriteriValutazione::route('/create'),
            'edit' => Pages\EditCriteriValutazione::route('/{record}/edit'),
        ];
    }
}
