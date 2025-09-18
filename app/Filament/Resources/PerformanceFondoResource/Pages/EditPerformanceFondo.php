<?php

namespace Modules\Performance\Filament\Resources\PerformanceFondoResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Modules\Performance\Filament\Resources\PerformanceFondoResource;

use function Safe\ini_set;

ini_set('max_execution_time', '300');
ini_set('memory_limit', '512M');

class EditPerformanceFondo extends \Modules\Xot\Filament\Resources\Pages\XotBaseEditRecord
{
    protected static string $resource = PerformanceFondoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function beforeFill(): void
    {
        dd('a');
        // Runs before the form fields are populated from the database.
    }

    protected function afterFill(): void
    {
        dd('a');
        // Runs after the form fields are populated from the database.
    }

    protected function beforeValidate(): void
    {
        dd('a');
        // Runs before the form fields are validated when the form is saved.
    }

    protected function afterValidate(): void
    {
        dd('a');
        // Runs after the form fields are validated when the form is saved.
    }

    protected function beforeSave(): void
    {
        dd('a');
        // Runs before the form fields are saved to the database.
    }

    protected function afterSave(): void
    {
        dd('a');
        // Runs after the form fields are saved to the database.
    }
}
