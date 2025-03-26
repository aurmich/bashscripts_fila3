<?php

namespace Modules\Performance\Filament\Resources\IndividualeDecurtazioneAssenzeResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Modules\Performance\Filament\Resources\IndividualeDecurtazioneAssenzeResource;

class EditIndividualeDecurtazioneAssenze extends \Modules\Xot\Filament\Resources\Pages\XotBaseEditRecord
{
    protected static string $resource = IndividualeDecurtazioneAssenzeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
