<?php

/**
 * @see https://coderflex.com/blog/create-advanced-filters-with-filament
 */

declare(strict_types=1);

namespace Modules\Ptv\Filament\Actions\Header;

use Filament\Actions\Action;
// Header actions must be an instance of Filament\Actions\Action, or Filament\Actions\ActionGroup.
// use Filament\Tables\Actions\Action;
use Filament\Notifications\Notification;
use Illuminate\Support\Arr;
use Modules\Ptv\Actions\PopulateByYearAction;

class PopulateYearAction extends Action
{
    public static function getDefaultName(): ?string
    {
        return 'populate_year';
    }

    protected function setUp(): void
    {
        parent::setUp();
        $this->label('')
            ->tooltip(__('ptv::actions.'.$this->getDefaultName()))
            ->icon('fas-fill')
            ->action(function ($livewire, $record, $action) {
                $modelClass = $livewire->getResource()::getModel();
                $year = Arr::get($livewire->tableFilters, 'anno.value');
                // 2023
                $fieldname = 'anno';
                if ($year == null) {
                    $year = Arr::get($livewire->tableFilters, 'year.value');
                    // 2023
                    $fieldname = 'year';
                }

                app(PopulateByYearAction::class)->execute($modelClass, $fieldname, $year);
                Notification::make()
                    ->title('Successfully')
                    ->success()
                    ->send();
            });
    }
}
