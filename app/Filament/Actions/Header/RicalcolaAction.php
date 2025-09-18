<?php

/**
 * @see https://coderflex.com/blog/create-advanced-filters-with-filament
 */

declare(strict_types=1);

namespace Modules\Progressioni\Filament\Actions\Header;

use Filament\Actions\Action;
// Header actions must be an instance of Filament\Actions\Action, or Filament\Actions\ActionGroup.
// use Filament\Tables\Actions\Action;
use Filament\Notifications\Notification;
use Illuminate\Support\Arr;
use Modules\Progressioni\Actions\RefreshByYearAction;

class RicalcolaAction extends Action
{
    public static function getDefaultName(): ?string
    {
        return 'ricalcola';
    }

    protected function setUp(): void
    {
        parent::setUp();
        $this->label('')
            ->tooltip('Ricalcola')
            ->icon('fas-retweet')
            ->action(function ($livewire, $record, $action) {
                $modelClass = $livewire->getResource()::getModel();
                $year = Arr::get($livewire->tableFilters, 'anno.value');
                // 2023

                $fieldname = 'anno';
                app(RefreshByYearAction::class)->execute($modelClass, $fieldname, $year);
                Notification::make()
                    ->title('Successfully')
                    ->success()
                    ->send();
            });
    }
}
