<?php

namespace Modules\Performance\Filament\Resources\OptionResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Modules\Performance\Filament\Resources\OptionResource;

use Modules\Ptv\Filament\Resources\OptionResource\Pages\EditOption as PtvEditOption;

class EditOption extends PtvEditOption
{
    protected static string $resource = OptionResource::class;

    
}
