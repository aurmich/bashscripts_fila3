<?php

namespace Modules\Performance\Filament\Resources\CriteriEsclusioneResource\Pages;

use Filament\Resources\Pages\CreateRecord;
use Modules\Performance\Filament\Resources\CriteriEsclusioneResource;
use Modules\Ptv\Filament\Resources\CriteriEsclusioneResource\Pages\CreateCriteriEsclusione as PtvCreateCriteriEsclusione;
class CreateCriteriEsclusione extends PtvCreateCriteriEsclusione
{
    protected static string $resource = CriteriEsclusioneResource::class;
}
