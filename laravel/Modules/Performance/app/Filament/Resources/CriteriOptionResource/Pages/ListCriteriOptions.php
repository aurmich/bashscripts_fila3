<?php

namespace Modules\Performance\Filament\Resources\CriteriOptionResource\Pages;

use Filament\Actions;
use Filament\Tables\Columns;
use Filament\Tables\Filters;
use Modules\Performance\Filament\Resources\CriteriOptionResource;
use Modules\Xot\Filament\Resources\Pages\XotBaseListRecords;
use function Safe\date;
use Modules\Ptv\Filament\Resources\CriteriOptionResource\Pages\ListCriteriOptions as PtvListCriteriOptions;

class ListCriteriOptions extends PtvListCriteriOptions
{
    protected static string $resource = CriteriOptionResource::class;

  
}
