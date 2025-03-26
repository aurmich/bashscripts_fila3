<?php

declare(strict_types=1);

namespace Modules\IndennitaResponsabilita\Filament\Resources\IndennitaResponsabilitaResource\Pages;

use Filament\Pages\Actions\ViewAction;
use Filament\Pages\Actions\DeleteAction;
use Modules\Xot\Filament\Resources\Pages\XotBaseEditRecord;
use Modules\IndennitaResponsabilita\Filament\Resources\IndennitaResponsabilitaResource;

class EditIndennitaResponsabilita extends XotBaseEditRecord
{
    protected static string $resource = IndennitaResponsabilitaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
