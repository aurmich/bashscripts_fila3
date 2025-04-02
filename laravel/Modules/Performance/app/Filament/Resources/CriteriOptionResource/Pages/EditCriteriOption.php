<?php

namespace Modules\Performance\Filament\Resources\CriteriOptionResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Modules\Xot\Filament\Resources\Pages\XotBaseEditRecord;
use Modules\Performance\Filament\Resources\CriteriOptionResource;
use Modules\Ptv\Filament\Resources\CriteriOptionResource\Pages\EditCriteriOption as PtvEditCriteriOption;
class EditCriteriOption extends PtvEditCriteriOption
{
    protected static string $resource = CriteriOptionResource::class;

   
}
