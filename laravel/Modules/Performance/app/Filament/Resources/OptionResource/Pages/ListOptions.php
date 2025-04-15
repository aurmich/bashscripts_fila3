<?php

namespace Modules\Performance\Filament\Resources\OptionResource\Pages;

use Filament\Actions;
use Filament\Tables;
use Modules\Performance\Filament\Resources\OptionResource;
use Modules\Xot\Filament\Resources\Pages\XotBaseListRecords;

use Modules\Ptv\Filament\Resources\OptionResource\Pages\ListOptions as PtvListOptions;

class ListOptions extends PtvListOptions
{
    protected static string $resource = OptionResource::class;

   
}
