<?php

/**
 * @see https://coderflex.com/blog/create-advanced-filters-with-filament
 */

declare(strict_types=1);

namespace Modules\Ptv\Filament\Actions\Header;

use Illuminate\Support\Arr;
// Header actions must be an instance of Filament\Actions\Action, or Filament\Actions\ActionGroup.
// use Filament\Tables\Actions\Action;
use Filament\Actions\Action;
use Filament\Notifications\Notification;
use Modules\Ptv\Actions\Scheda\TrovaEsclusiByModelClassYearAction;
use Modules\Xot\Actions\ModelClass\CopyFromLastYearAction as CopyFromLastYearByFieldnameAction;

class TrovaEsclusiAction extends Action
{
    public static function getDefaultName(): ?string
    {
        return 'trova_esclusi';
    }

    protected function setUp(): void
    {
        parent::setUp();
        $this->label('')
            ->tooltip(__('ptv::actions.trova_esclusi.label'))
            ->icon('fas-skull')
            ->action(function ($livewire, $record, $action) {
                $modelClass = $livewire->getResource()::getModel();
                $year = Arr::get($livewire->tableFilters, 'anno.value');
                
                
                // 2023
                $fieldname = 'anno';
                if (null == $year) {
                    $year = Arr::get($livewire->tableFilters, 'year.value');
                    // 2023
                    $fieldname = 'year';
                }
                
                app(TrovaEsclusiByModelClassYearAction::class)->execute($modelClass, $fieldname, intval($year));

                Notification::make()
                    ->title('Successfully')
                    ->success()
                    ->send();
                
            });
    }
}
