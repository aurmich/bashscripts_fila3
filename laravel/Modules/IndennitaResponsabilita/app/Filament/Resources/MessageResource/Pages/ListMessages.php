<?php

namespace Modules\IndennitaResponsabilita\Filament\Resources\MessageResource\Pages;

use Filament\Pages\Actions;
use Modules\IndennitaResponsabilita\Filament\Resources\MessageResource;
use Modules\Ptv\Filament\Resources\MessageResource\Pages\ListMessages as PtvListMessages;

class ListMessages extends PtvListMessages
{
    protected static string $resource = MessageResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
