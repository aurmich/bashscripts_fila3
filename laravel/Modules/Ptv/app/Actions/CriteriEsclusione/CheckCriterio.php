<?php

declare(strict_types=1);

namespace Modules\Ptv\Actions\CriteriEsclusione;

use Filament\Notifications\Notification;
use Illuminate\Support\Str;
use Modules\Ptv\Models\Contracts\CriteriEsclusioneContract;
use Spatie\QueueableAction\QueueableAction;

class CheckCriterio
{
    use QueueableAction;

    public function execute(CriteriEsclusioneContract $criterio)
    {
        $schede = $criterio->schede;
        $action = '\Modules\Ptv\Actions\CriteriEsclusione\\'.Str::studly($criterio->name);
        $criteriOption = $criterio->criteriOptionsCollection();
        $count = 0;
        foreach ($schede as $scheda) {
            $motivo = app($action)->execute($scheda, $criterio->value, $criteriOption);
            if ($motivo != '') {
                $motivo_arr = explode(',', $motivo);
                $motivo_arr[] = $motivo;

                $motivo_arr = array_unique($motivo_arr);
                $motivo_arr = array_filter($motivo_arr);

                $scheda->ha_diritto = 0;
                $scheda->motivo = implode(',', $motivo_arr);
                $scheda->save();
                $count++;
            }
        }

        Notification::make()
            ->title('Esclusi ['.$count.']')
            ->success()
            ->send();
    }
}
