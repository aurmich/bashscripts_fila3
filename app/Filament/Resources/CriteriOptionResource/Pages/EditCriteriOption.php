<?php

<<<<<<< HEAD
namespace Modules\Progressioni\Filament\Resources\CriteriOptionResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Modules\Progressioni\Filament\Resources\CriteriOptionResource;
=======
namespace Modules\Performance\Filament\Resources\CriteriOptionResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Modules\Performance\Filament\Resources\CriteriOptionResource;
>>>>>>> 961ad402 (first)

class EditCriteriOption extends \Modules\Xot\Filament\Resources\Pages\XotBaseEditRecord
{
    protected static string $resource = CriteriOptionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
