<?php

namespace Modules\IndennitaResponsabilita\Filament\Resources\MessageResource\Pages;

use Filament\Pages\Actions;
use Modules\IndennitaResponsabilita\Filament\Resources\MessageResource;
use Modules\Ptv\Filament\Resources\MessageResource\Pages\EditMessage as PtvEditMessage;

class EditMessage extends PtvEditMessage
{
    protected static string $resource = MessageResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
