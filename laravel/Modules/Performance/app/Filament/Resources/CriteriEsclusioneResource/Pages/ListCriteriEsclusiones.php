<?php

declare(strict_types=1);

namespace Modules\Performance\Filament\Resources\CriteriEsclusioneResource\Pages;

use Filament\Actions\CreateAction;
use Filament\Tables\Columns;
use Filament\Tables\Filters;
use Filament\Tables\Actions;
use Modules\Performance\Filament\Resources\CriteriEsclusioneResource;
use Modules\Ptv\Filament\Actions\Header\CopyFromLastYearAction;
use Modules\Xot\Filament\Resources\Pages\XotBaseListRecords;
use function Safe\date;
use Modules\Ptv\Filament\Resources\CriteriEsclusioneResource\Pages\ListCriteriEsclusiones as PtvListCriteriEsclusiones;

class ListCriteriEsclusiones extends PtvListCriteriEsclusiones
{
    protected static string $resource = CriteriEsclusioneResource::class;


}
