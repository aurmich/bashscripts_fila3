<?php

<<<<<<< HEAD
declare(strict_types=1);

<<<<<<< HEAD
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
use Modules\Ptv\Filament\Resources\StabiDirigenteResource\Pages\EditStabiDirigente as PtvEditStabiDirigente;

class EditStabiDirigente extends PtvEditStabiDirigente
{
    protected static string $resource = StabiDirigenteResource::class;
=======
namespace Modules\Performance\Filament\Resources\StabiDirigenteResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Modules\Performance\Filament\Resources\StabiDirigenteResource;

class EditStabiDirigente extends \Modules\Xot\Filament\Resources\Pages\XotBaseEditRecord
{
    protected static string $resource = StabiDirigenteResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
>>>>>>> 961ad402 (first)
}
