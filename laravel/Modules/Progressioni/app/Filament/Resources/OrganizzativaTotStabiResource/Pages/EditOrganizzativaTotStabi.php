<?php

namespace Modules\Performance\Filament\Resources\OrganizzativaTotStabiResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Modules\Performance\Filament\Resources\OrganizzativaTotStabiResource;

class EditOrganizzativaTotStabi extends \Modules\Xot\Filament\Resources\Pages\XotBaseEditRecord
{
    protected static string $resource = OrganizzativaTotStabiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
