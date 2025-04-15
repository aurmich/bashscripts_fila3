<?php

namespace Modules\Incentivi\Filament\Resources\SettlementResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Modules\Incentivi\Filament\Resources\SettlementResource;

class EditSettlement extends \Modules\Xot\Filament\Resources\Pages\XotBaseEditRecord
{
    protected static string $resource = SettlementResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
