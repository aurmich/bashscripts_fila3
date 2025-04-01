<?php

namespace Modules\IndennitaResponsabilita\Filament\Resources\IndennitaResponsabilitaResource\Pages;

use Filament\Pages\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;
use Modules\IndennitaResponsabilita\Filament\Resources\IndennitaResponsabilitaResource;

class ViewIndennitaResponsabilita extends ViewRecord
{
    protected static string $resource = IndennitaResponsabilitaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
