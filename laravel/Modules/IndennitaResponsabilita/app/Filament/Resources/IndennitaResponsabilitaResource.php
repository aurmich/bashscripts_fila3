<?php

declare(strict_types=1);

namespace Modules\IndennitaResponsabilita\Filament\Resources;

use Filament\Forms;
use Modules\IndennitaResponsabilita\Filament\Resources\IndennitaResponsabilitaResource\Pages;
use Modules\IndennitaResponsabilita\Models\IndennitaResponsabilita;
use Modules\Xot\Filament\Resources\XotBaseResource;

class IndennitaResponsabilitaResource extends XotBaseResource
{
    protected static string $resourceFile = __FILE__;

    protected static ?string $model = IndennitaResponsabilita::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function getFormSchema(): array
    {
        return [
            Forms\Components\TextInput::make('matr')
                ->label('Matr.')
                ->required(),

            Forms\Components\TextInput::make('cognome')
                ->label('Cognome')
                ->required(),

            Forms\Components\TextInput::make('nome')
                ->label('Nome')
                ->required(),

            Forms\Components\TextInput::make('email')
                ->label('Email')
                ->email()
                ->required(),

            Forms\Components\TextInput::make('valutatore_id'),
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
            'index' => Pages\ListIndennitaResponsabilitas::route('/'),
            'create' => Pages\CreateIndennitaResponsabilita::route('/create'),
            'view' => Pages\ViewIndennitaResponsabilita::route('/{record}'),
            'edit' => Pages\EditIndennitaResponsabilita::route('/{record}/edit'),
            'compila' => Pages\CompilaIndennitaResponsabilita::route('/{record}/compila'),
            'send-mail' => Pages\SendMailIndennitaResponsabilita::route('/send/mail'),
        ];
    }
}
