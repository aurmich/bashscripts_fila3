<?php

namespace Modules\Performance\Filament\Resources\OrganizzativaResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Modules\Performance\Filament\Resources\OrganizzativaResource;

use function Safe\ini_set;

ini_set('max_execution_time', '3600');

class EditOrganizzativa extends \Modules\Xot\Filament\Resources\Pages\XotBaseEditRecord
{
    protected static string $resource = OrganizzativaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
