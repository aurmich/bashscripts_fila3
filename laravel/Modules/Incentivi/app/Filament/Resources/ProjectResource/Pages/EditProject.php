<?php

namespace Modules\Incentivi\Filament\Resources\ProjectResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Modules\Incentivi\Filament\Resources\ProjectResource;
use Modules\Incentivi\Filament\Resources\ProjectResource\Actions\GeneratePDFProjectReportAction;
use Modules\Incentivi\Filament\Resources\ProjectResource\Actions\GeneratePDFProjectReportActionSpatie;
use Modules\Incentivi\Filament\Resources\ProjectResource\Actions\TestLiquidazioneAction;

class EditProject extends \Modules\Xot\Filament\Resources\Pages\XotBaseEditRecord
{
    protected static string $resource = ProjectResource::class;

    protected static ?string $navigationLabel = 'Modifica Progetto';

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
            // GeneratePDFProjectReportActionSpatie::make(),
            // GeneratePDFProjectReportAction::make(),
            // TestLiquidazioneAction::make(),
        ];
    }
}
