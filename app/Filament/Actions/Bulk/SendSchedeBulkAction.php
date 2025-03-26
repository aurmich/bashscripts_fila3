<?php

declare(strict_types=1);

namespace Modules\Ptv\Filament\Actions\Bulk;

use Filament\Notifications\Notification as FilamentNotification;
use Filament\Tables\Actions\BulkAction;
use Modules\Ptv\Actions\Scheda\SendMailByRecord;

class SendSchedeBulkAction extends BulkAction
{
    public static function getDefaultName(): ?string
    {
        return 'send_schede';
    }

    protected function setUp(): void
    {
        parent::setUp();

        $this->label('Invia Schede via Mail')
            ->tooltip('Invia il PDF generato tramite email')
            ->icon('heroicon-o-paper-airplane')
            ->action(function ($livewire, $action, $records) {
                $count = 0;
                foreach ($records as $record) {
                    if (app(SendMailByRecord::class)->execute($record)) {
                        $count++;
                    }
                }
                // Mostra notifica di Filament con il numero di email inviate
                FilamentNotification::make()
                    ->title('Operazione completata')
                    ->body("Sono state inviate $count email.")
                    ->success()
                    ->send();
            });
    }
}
