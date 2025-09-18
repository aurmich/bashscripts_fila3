<?php

<<<<<<< HEAD
<<<<<<< HEAD
namespace Modules\IndennitaResponsabilita\Filament\Resources\MessageResource\Pages;

use Modules\IndennitaResponsabilita\Filament\Resources\MessageResource;
use Modules\Ptv\Filament\Resources\MessageResource\Pages\CreateMessage as PtvCreateMessage;

class CreateMessage extends PtvCreateMessage
=======
namespace Modules\Progressioni\Filament\Resources\MessageResource\Pages;

use Filament\Resources\Pages\CreateRecord;
use Modules\Progressioni\Filament\Resources\MessageResource;

class CreateMessage extends CreateRecord
>>>>>>> bcab6efe (first)
=======
namespace Modules\Ptv\Filament\Resources\MessageResource\Pages;

use Filament\Resources\Pages\CreateRecord;
use Modules\Ptv\Filament\Resources\MessageResource;

class CreateMessage extends CreateRecord
>>>>>>> dc18abbe (first)
{
    protected static string $resource = MessageResource::class;
}
