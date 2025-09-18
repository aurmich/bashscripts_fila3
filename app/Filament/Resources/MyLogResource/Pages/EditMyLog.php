<?php

<<<<<<< HEAD
namespace Modules\Progressioni\Filament\Resources\MyLogResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Modules\Progressioni\Filament\Resources\MyLogResource;
=======
namespace Modules\Performance\Filament\Resources\MyLogResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Modules\Performance\Filament\Resources\MyLogResource;
>>>>>>> 961ad402 (first)

class EditMyLog extends \Modules\Xot\Filament\Resources\Pages\XotBaseEditRecord
{
    protected static string $resource = MyLogResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
