<?php

declare(strict_types=1);

namespace Modules\IndennitaCondizioniLavoro\Filament\Resources\CondizioniLavoroResource\Pages;

use Filament\Pages\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;
use Modules\Xot\Filament\Resources\Pages\XotBaseEditRecord;
use Modules\IndennitaCondizioniLavoro\Filament\Resources\CondizioniLavoroResource;

class EditCondizioniLavoro extends XotBaseEditRecord
{
    protected static string $resource = CondizioniLavoroResource::class;

    
}
