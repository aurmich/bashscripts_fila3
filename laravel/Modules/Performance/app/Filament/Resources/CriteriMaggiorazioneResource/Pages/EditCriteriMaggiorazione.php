<?php

namespace Modules\Performance\Filament\Resources\CriteriMaggiorazioneResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Modules\Performance\Filament\Resources\CriteriMaggiorazioneResource;

class EditCriteriMaggiorazione extends \Modules\Xot\Filament\Resources\Pages\XotBaseEditRecord
{
    protected static string $resource = CriteriMaggiorazioneResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
