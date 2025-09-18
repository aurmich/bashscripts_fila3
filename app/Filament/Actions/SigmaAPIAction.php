<?php

declare(strict_types=1);

namespace Modules\Sigma\Filament\Actions;

use Filament\Actions\Action;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\CheckboxList;
use Filament\Notifications\Notification;
use Illuminate\Support\Arr;
use Modules\Sigma\Actions\WebService\SyncModelAction;
use Modules\Xot\Contracts\UserContract;

/**
 * Action utilizzata per effetture il primo import dei dipendenti provinciali tramite API di Sigma.
 */
class SigmaAPIAction extends Action
{
    protected function setUp(): void
    {
        parent::setUp();

        $this->translateLabel()
            ->label('Popola da SIGMA')
            ->icon('heroicon-o-arrow-up-tray')
            ->form(function (UserContract $user, array $data, $livewire): array {
                $model = $livewire->getResource()::getModel();
                $fields = app($model)->getFillable();

                // return Arr::map($fields, function ($field) {
                //     return Checkbox::make($field);
                // });
                return [
                    CheckboxList::make('only')
                        ->options(array_combine($fields, $fields)),
                ];
            })
            // ->requiresConfirmation()
            ->visible(fn ($livewire): bool => $livewire->getResource()::getModel()::query()->count() === 0)
            ->action(
                static function (UserContract $user, array $data, $livewire): void {
                    $model = $livewire->getResource()::getModel();
                    app(SyncModelAction::class)->execute('ANA10F', $model, $data['only']);

                    // dddx($employees);

                    Notification::make()->success()->title('Caricamento effettuato correttamente.');
                }
            );
    }

    public static function getDefaultName(): ?string
    {
        return 'SigmaAPIAction';
    }
}
