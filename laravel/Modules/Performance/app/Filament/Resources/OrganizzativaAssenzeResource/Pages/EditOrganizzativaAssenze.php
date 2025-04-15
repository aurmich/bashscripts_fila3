<?php

namespace Modules\Performance\Filament\Resources\OrganizzativaAssenzeResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Modules\Performance\Filament\Resources\OrganizzativaAssenzeResource;

class EditOrganizzativaAssenze extends \Modules\Xot\Filament\Resources\Pages\XotBaseEditRecord
{
    protected static string $resource = OrganizzativaAssenzeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
