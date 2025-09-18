<?php

declare(strict_types=1);

namespace Modules\Progressioni\Actions;

use Carbon\Carbon;
use Filament\Notifications\Notification;
use Spatie\QueueableAction\QueueableAction;

class RefreshByYearAction
{
    use QueueableAction;

    /**
     * Undocumented function.
     */
    public function execute(string $modelClass, string $fieldname, int|string $year): void
    {
        $rows = $modelClass::where($fieldname, $year)
            ->where(function ($query) {
                $query->whereDate('refreshed_at', '<', Carbon::now()->subDays(1))
                    ->orWhereNull('refreshed_at');
            })
            ->inRandomOrder()
            ->get();

        $rows_limited = $rows; // ->take(5);
        foreach ($rows_limited as $row) {
            app(RefreshHaDirittoAction::class)
                ->onQueue()
                ->execute($row);
            $row->update([
                'refreshed_at' => now(),
            ]);
        }

        Notification::make()
            ->title('refreshed ['.implode(', ', $rows_limited->modelKeys()).']!')
            ->success()
            ->send();
    }
}
