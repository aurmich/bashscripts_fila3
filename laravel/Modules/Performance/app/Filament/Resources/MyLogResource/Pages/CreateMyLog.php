<?php

namespace Modules\Performance\Filament\Resources\MyLogResource\Pages;

use Filament\Resources\Pages\CreateRecord;
use Modules\Performance\Filament\Resources\MyLogResource;

class CreateMyLog extends CreateRecord
{
    protected static string $resource = MyLogResource::class;
}
