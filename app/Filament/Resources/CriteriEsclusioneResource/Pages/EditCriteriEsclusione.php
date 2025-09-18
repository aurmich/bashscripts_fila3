<?php

<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> f3d4311a (Squashed 'laravel/Modules/Progressioni/' content from commit 72d99eef1)
namespace Modules\Progressioni\Filament\Resources\CriteriEsclusioneResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Modules\Progressioni\Filament\Resources\CriteriEsclusioneResource;
<<<<<<< HEAD
=======
namespace Modules\Performance\Filament\Resources\CriteriEsclusioneResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Modules\Performance\Filament\Resources\CriteriEsclusioneResource;
>>>>>>> 961ad402 (first)
=======
>>>>>>> f3d4311a (Squashed 'laravel/Modules/Progressioni/' content from commit 72d99eef1)

class EditCriteriEsclusione extends \Modules\Xot\Filament\Resources\Pages\XotBaseEditRecord
{
    protected static string $resource = CriteriEsclusioneResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
