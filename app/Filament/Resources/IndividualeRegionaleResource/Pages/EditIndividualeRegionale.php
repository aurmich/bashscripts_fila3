<?php

namespace Modules\Performance\Filament\Resources\IndividualeRegionaleResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Modules\Performance\Filament\Resources\IndividualeRegionaleResource;

class EditIndividualeRegionale extends \Modules\Xot\Filament\Resources\Pages\XotBaseEditRecord
{
    protected static string $resource = IndividualeRegionaleResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
