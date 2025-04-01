<?php

declare(strict_types=1);

namespace Modules\Ptv\Filament\Resources\StabiDirigenteResource\Pages;

use Filament\Pages\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;
use Modules\Ptv\Filament\Resources\StabiDirigenteResource;

class EditStabiDirigente extends \Modules\Xot\Filament\Resources\Pages\XotBaseEditRecord
{
    protected static string $resource = StabiDirigenteResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
