<?php

declare(strict_types=1);

namespace Modules\IndennitaCondizioniLavoro\Actions;

use Filament\Notifications\Notification;
use Modules\IndennitaCondizioniLavoro\Models\CondizioniLavoro;
use Spatie\QueueableAction\QueueableAction;

class ReplicateIndennita
{
    use QueueableAction;

    /**
     * Undocumented function.
     */
    public function execute(array $data): void
    {
        $values = $data['anno/valutatore'];

        $where = $values;
        if ($values['quadrimestre'] <= 1) {
            dddx('devi partire dal 2');
        }
        $where['quadrimestre'] = $where['quadrimestre'] - 1;
        $rows = CondizioniLavoro::where($where)
            ->whereHas('indennitaTipoDettaglio')
            ->get();

        foreach ($rows as $row) {
            $ids = $row->indennitaTipoDettaglio->modelKeys();
            $next = $row->getNextQuadrimestre();
            if ($next == null) {
                continue;
            }
            if ($next->indennitaTipoDettaglio->count() == 0) {
                $next->indennitaTipoDettaglio()->sync($ids);
            }
        }

        Notification::make()
            ->title('Replicated ['.$rows->count().'] row')
            ->success()
            ->send();
    }
}
