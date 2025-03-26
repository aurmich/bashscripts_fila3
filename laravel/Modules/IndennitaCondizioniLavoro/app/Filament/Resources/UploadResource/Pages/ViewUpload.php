<?php

declare(strict_types=1);

namespace Modules\IndennitaCondizioniLavoro\Filament\Resources\UploadResource\Pages;

use Filament\Pages\Actions;
use Filament\Resources\Pages\ViewRecord;
use Modules\IndennitaCondizioniLavoro\Filament\Resources\UploadResource;

class ViewUpload extends ViewRecord
{
    protected static string $resource = UploadResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
