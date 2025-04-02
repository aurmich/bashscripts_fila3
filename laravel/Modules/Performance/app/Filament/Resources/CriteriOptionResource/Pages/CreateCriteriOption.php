<?php

namespace Modules\Performance\Filament\Resources\CriteriOptionResource\Pages;

use Filament\Resources\Pages\CreateRecord;
use Modules\Performance\Filament\Resources\CriteriOptionResource;
use Modules\Ptv\Filament\Resources\CriteriOptionResource\Pages\CreateCriteriOption as PtvCreateCriteriOption;
class CreateCriteriOption extends PtvCreateCriteriOption
{
    protected static string $resource = CriteriOptionResource::class;
}
