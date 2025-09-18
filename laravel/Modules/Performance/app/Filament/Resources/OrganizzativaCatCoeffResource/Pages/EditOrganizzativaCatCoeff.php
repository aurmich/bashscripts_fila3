<?php

namespace Modules\Performance\Filament\Resources\OrganizzativaCatCoeffResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Modules\Performance\Filament\Resources\OrganizzativaCatCoeffResource;

class EditOrganizzativaCatCoeff extends \Modules\Xot\Filament\Resources\Pages\XotBaseEditRecord
{
    protected static string $resource = OrganizzativaCatCoeffResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
