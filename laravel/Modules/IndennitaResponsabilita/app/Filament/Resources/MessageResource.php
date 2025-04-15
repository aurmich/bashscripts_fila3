<?php

declare(strict_types=1);

namespace Modules\IndennitaResponsabilita\Filament\Resources;

use Modules\IndennitaCondizioniLavoro\Models\Message;
use Modules\IndennitaResponsabilita\Filament\Resources\MessageResource\Pages;
use Modules\Ptv\Filament\Resources\MessageResource as PtvMessageResource;

class MessageResource extends PtvMessageResource
{
    protected static ?string $model = Message::class;

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListMessages::route('/'),
            'create' => Pages\CreateMessage::route('/create'),
            'edit' => Pages\EditMessage::route('/{record}/edit'),
        ];
    }
}
