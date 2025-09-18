<?php

<<<<<<< HEAD
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
=======
declare(strict_types=1);
>>>>>>> f3d4311a (Squashed 'laravel/Modules/Progressioni/' content from commit 72d99eef1)

namespace Modules\Progressioni\Filament\Resources\StabiDirigenteResource\Pages;

use Modules\Progressioni\Filament\Resources\StabiDirigenteResource;
<<<<<<< HEAD
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
=======
use Modules\Ptv\Filament\Resources\StabiDirigenteResource\Pages\CreateStabiDirigente as PtvCreateStabiDirigente;

class CreateStabiDirigente extends PtvCreateStabiDirigente
>>>>>>> f3d4311a (Squashed 'laravel/Modules/Progressioni/' content from commit 72d99eef1)
{
    protected static string $resource = StabiDirigenteResource::class;
}
