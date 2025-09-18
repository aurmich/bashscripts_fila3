<?php

namespace Modules\Performance\Filament\Resources\StabiDirigenteResource\Pages;

use Filament\Resources\Pages\CreateRecord;
use Modules\Performance\Filament\Resources\StabiDirigenteResource;

use Modules\Ptv\Filament\Resources\StabiDirigenteResource\Pages\CreateStabiDirigente as PtvcCreateStabiDirigente;

class CreateStabiDirigente extends PtvcCreateStabiDirigente
{
    protected static string $resource = StabiDirigenteResource::class;
}
