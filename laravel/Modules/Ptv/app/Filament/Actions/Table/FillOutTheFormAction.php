<?php

/**
 * @see https://coderflex.com/blog/create-advanced-filters-with-filament
 */

declare(strict_types=1);

namespace Modules\Ptv\Filament\Actions\Table;

use Filament\Notifications\Notification;
use Filament\Resources\Pages\ListRecords;
use Filament\Tables\Actions\Action;
use Illuminate\Support\Arr;
use Modules\Xot\Actions\ModelClass\CopyFromLastYearAction as CopyFromLastYearByFieldnameAction;

class FillOutTheFormAction extends Action
{
    public static function getDefaultName(): ?string
    {
        return 'fill_out_the_form';
    }

    protected function setUp(): void
    {
        parent::setUp();
        $this->label('')
            ->tooltip(__('ptv::actions.fill_out_the_form'))
            ->icon('heroicon-m-pencil-square')
            ->url(function (ListRecords $livewire, $record): string {
                $resource = $livewire->getResource();

                return $resource::getUrl('fill_out_the_form', ['record' => $record]);
            });
        // ->url(fn ($record): string => SchedeResource::getUrl('compila', ['record' => $record]))
        // ->visible(fn ($record) => $record->ha_diritto),

        /*
            ->tooltip(__('ptv::actions.fill_out_the_form'))
            ->icon('heroicon-o-document-duplicate')
            ->action(function ($livewire,$record,$action) {
        $modelClass=$livewire->getResource()::getModel();
        $year=Arr::get($livewire->tableFilters,'anno.value'); //2023
        $fieldname='anno';
        app(CopyFromLastYearByFieldnameAction::class)->execute($modelClass, $fieldname, $year);
        Notification::make()
            ->title('Successfully')
            ->success()
            ->send();
            });
            */
    }
}
