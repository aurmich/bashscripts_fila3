<?php

namespace Modules\IndennitaCondizioniLavoro\Filament\Resources\IndennitaTipoResource\Pages;

use Filament\Pages\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;
use Modules\IndennitaCondizioniLavoro\Filament\Resources\IndennitaTipoResource;

class EditIndennitaTipo extends \Modules\Xot\Filament\Resources\Pages\XotBaseEditRecord
{
    protected static string $resource = IndennitaTipoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
