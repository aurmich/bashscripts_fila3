<?php

namespace Modules\Progressioni\Filament\Resources\MaxCatecoPosfunAnnoResource\Pages;

use Filament\Actions\Action;
use Filament\Notifications\Notification;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class CopyFromLastYearButton
{
    /**
     * Esegue la copia dei dati dall'anno precedente
     *
     * @param class-string<Model> $modelClass
     * @param string $yearField
     * @param int|null $currentYear
     * @return Action
     */
    public function execute(string $modelClass, string $yearField, ?int $currentYear = null): Action
    {
        return Action::make('copyFromLastYear')
            ->label('Copia dall\'anno precedente')
            ->icon('heroicon-o-clipboard-copy')
            ->requiresConfirmation()
            ->modalHeading('Conferma copia dati')
            ->modalDescription('Vuoi copiare i dati dall\'anno precedente?')
            ->modalSubmitActionLabel('Sì, copia')
            ->modalCancelActionLabel('No, annulla')
            ->action(function () use ($modelClass, $yearField, $currentYear) {
                if (!$currentYear) {
                    $this->showWarningNotification('Seleziona prima un anno nei filtri');
                    return;
                }

                $lastYear = $currentYear - 1;
                $records = $this->getRecordsFromLastYear($modelClass, $yearField, $lastYear);

                if ($records->isEmpty()) {
                    $this->showWarningNotification('Nessun dato trovato per l\'anno ' . $lastYear);
                    return;
                }

                $this->copyRecords($records, $yearField, $currentYear);
                $this->showSuccessNotification(count($records) . ' record copiati con successo');
            });
    }

    /**
     * Recupera i record dell'anno precedente
     *
     * @param class-string<Model> $modelClass
     * @param string $yearField
     * @param int $lastYear
     * @return Collection<Model>
     */
    protected function getRecordsFromLastYear(string $modelClass, string $yearField, int $lastYear): Collection
    {
        return $modelClass::where($yearField, $lastYear)->get();
    }

    /**
     * Copia i record per l'anno corrente
     *
     * @param Collection<Model> $records
     * @param string $yearField
     * @param int $currentYear
     * @return void
     */
    protected function copyRecords(Collection $records, string $yearField, int $currentYear): void
    {
        foreach ($records as $record) {
            $newRecord = $record->replicate();
            $newRecord->$yearField = $currentYear;
            $newRecord->save();
        }
    }

    /**
     * Mostra una notifica di successo
     *
     * @param string $message
     * @return void
     */
    protected function showSuccessNotification(string $message): void
    {
        Notification::make()
            ->success()
            ->title($message)
            ->send();
    }

    /**
     * Mostra una notifica di warning
     *
     * @param string $message
     * @return void
     */
    protected function showWarningNotification(string $message): void
    {
        Notification::make()
            ->warning()
            ->title($message)
            ->send();
    }
}
