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
use Modules\Ptv\Actions\MergeDoubleRowCatecoByModelClassYearAction;

class MergeDoubleRowCatecoYearAction extends Action
{
    public static function getDefaultName(): ?string
    {
        return 'merge_double_row_cateco_year';
    }

    protected function setUp(): void
    {
        parent::setUp();
        $this->label('')
            ->tooltip(__('ptv::actions.merge_double_row_cateco_yea'))
            ->icon('fas-code-merge')
            ->action(function ($livewire, $record, $action) {
                $modelClass = $livewire->getResource()::getModel();
                $year = Arr::get($livewire->tableFilters, 'anno.value');
                // 2023

                $fieldname = 'anno';
                app(MergeDoubleRowCatecoByModelClassYearAction::class)->execute($modelClass, $fieldname, $year);
                Notification::make()
                    ->title('Successfully')
                    ->success()
                    ->send();
            });
    }
}
