<?php

namespace Modules\IndennitaResponsabilita\Filament\Resources\MessageResource\Pages;

use Modules\IndennitaResponsabilita\Filament\Resources\MessageResource;
use Modules\Ptv\Filament\Resources\MessageResource\Pages\CreateMessage as PtvCreateMessage;

class CreateMessage extends PtvCreateMessage
{
    protected static string $resource = MessageResource::class;
}
