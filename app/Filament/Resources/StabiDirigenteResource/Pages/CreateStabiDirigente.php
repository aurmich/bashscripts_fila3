<?php

<<<<<<< HEAD
<<<<<<< HEAD
declare(strict_types=1);
<<<<<<< HEAD
<<<<<<< HEAD
=======
declare(strict_types=1);
>>>>>>> dc18abbe (first)
/**
 * ---.
 */

<<<<<<< HEAD
namespace Modules\IndennitaCondizioniLavoro\Filament\Resources\StabiDirigenteResource\Pages;

use Modules\IndennitaCondizioniLavoro\Filament\Resources\StabiDirigenteResource;
=======

namespace Modules\IndennitaResponsabilita\Filament\Resources\StabiDirigenteResource\Pages;

use Modules\IndennitaResponsabilita\Filament\Resources\StabiDirigenteResource;
>>>>>>> e0005d7d (first)
=======

namespace Modules\Progressioni\Filament\Resources\StabiDirigenteResource\Pages;

use Modules\Progressioni\Filament\Resources\StabiDirigenteResource;
>>>>>>> bcab6efe (first)
use Modules\Ptv\Filament\Resources\StabiDirigenteResource\Pages\CreateStabiDirigente as PtvCreateStabiDirigente;

class CreateStabiDirigente extends PtvCreateStabiDirigente
=======
namespace Modules\Performance\Filament\Resources\StabiDirigenteResource\Pages;

use Filament\Resources\Pages\CreateRecord;
use Modules\Performance\Filament\Resources\StabiDirigenteResource;

class CreateStabiDirigente extends CreateRecord
>>>>>>> 961ad402 (first)
=======
namespace Modules\Ptv\Filament\Resources\StabiDirigenteResource\Pages;

use Filament\Resources\Pages\CreateRecord;
use Modules\Ptv\Filament\Resources\StabiDirigenteResource;

class CreateStabiDirigente extends CreateRecord
>>>>>>> dc18abbe (first)
{
    protected static string $resource = StabiDirigenteResource::class;
}
