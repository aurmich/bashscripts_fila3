<?php

declare(strict_types=1);

namespace Modules\Performance\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Modules\Performance\Filament\Resources\StabiDirigenteResource\Pages;
use Modules\Performance\Models\StabiDirigente;
use Modules\Xot\Filament\Resources\XotBaseResource;

use function Safe\date;
use Modules\Ptv\Filament\Resources\StabiDirigenteResource as PtvStabiDirigenteResource;

class StabiDirigenteResource extends PtvStabiDirigenteResource
{
    protected static ?string $model = StabiDirigente::class;

    
}
