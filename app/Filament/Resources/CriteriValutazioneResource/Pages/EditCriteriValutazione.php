<?php

<<<<<<< HEAD
namespace Modules\Progressioni\Filament\Resources\CriteriValutazioneResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Modules\Progressioni\Filament\Resources\CriteriValutazioneResource;
=======
namespace Modules\Performance\Filament\Resources\CriteriValutazioneResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Modules\Performance\Filament\Resources\CriteriValutazioneResource;
>>>>>>> 961ad402 (first)

class EditCriteriValutazione extends \Modules\Xot\Filament\Resources\Pages\XotBaseEditRecord
{
    protected static string $resource = CriteriValutazioneResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
