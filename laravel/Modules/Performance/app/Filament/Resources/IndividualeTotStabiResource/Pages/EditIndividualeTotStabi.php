<?php

namespace Modules\Performance\Filament\Resources\IndividualeTotStabiResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Modules\Performance\Filament\Resources\IndividualeTotStabiResource;

class EditIndividualeTotStabi extends \Modules\Xot\Filament\Resources\Pages\XotBaseEditRecord
{
    protected static string $resource = IndividualeTotStabiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
