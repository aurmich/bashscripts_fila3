<?php

namespace Modules\Incentivi\Filament\Resources\WorkgroupResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Modules\Incentivi\Filament\Resources\WorkgroupResource;

class EditWorkgroup extends \Modules\Xot\Filament\Resources\Pages\XotBaseEditRecord
{
    protected static string $resource = WorkgroupResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
