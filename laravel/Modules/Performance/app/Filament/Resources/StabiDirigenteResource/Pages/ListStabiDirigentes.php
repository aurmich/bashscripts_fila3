<?php

namespace Modules\Performance\Filament\Resources\StabiDirigenteResource\Pages;

use Filament\Actions;
use Filament\Tables\Columns\TextColumn;
use Modules\Performance\Filament\Resources\StabiDirigenteResource;
use Modules\Xot\Filament\Resources\Pages\XotBaseListRecords;
use Modules\Ptv\Filament\Resources\StabiDirigenteResource\Pages\ListStabiDirigentes as PtvListStabiDirigentes;

class ListStabiDirigentes extends PtvListStabiDirigentes
{
    protected static string $resource = StabiDirigenteResource::class;

   
}
