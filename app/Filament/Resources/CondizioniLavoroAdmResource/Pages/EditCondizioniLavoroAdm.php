<?php

namespace Modules\IndennitaCondizioniLavoro\Filament\Resources\CondizioniLavoroAdmResource\Pages;

use Modules\IndennitaCondizioniLavoro\Filament\Resources\CondizioniLavoroAdmResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCondizioniLavoroAdm extends \Modules\Xot\Filament\Resources\Pages\XotBaseEditRecord
{
    protected static string $resource = CondizioniLavoroAdmResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
