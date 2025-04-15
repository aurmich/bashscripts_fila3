<?php

namespace Modules\Performance\Filament\Resources\OptionResource\Pages;

use Filament\Resources\Pages\CreateRecord;
use Modules\Performance\Filament\Resources\OptionResource;

use Modules\Ptv\Filament\Resources\OptionResource\Pages\CreateOption as PtvCreateOption;

class CreateOption extends PtvCreateOption
{
    protected static string $resource = OptionResource::class;
}
