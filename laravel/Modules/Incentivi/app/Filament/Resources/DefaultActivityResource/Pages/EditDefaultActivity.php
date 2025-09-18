<?php

namespace Modules\Incentivi\Filament\Resources\DefaultActivityResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Modules\Incentivi\Filament\Resources\DefaultActivityResource;

class EditDefaultActivity extends \Modules\Xot\Filament\Resources\Pages\XotBaseEditRecord
{
    protected static string $resource = DefaultActivityResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
