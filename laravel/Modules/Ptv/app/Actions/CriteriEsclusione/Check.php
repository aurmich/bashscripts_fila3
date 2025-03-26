<?php

declare(strict_types=1);

namespace Modules\Ptv\Actions\CriteriEsclusione;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use Spatie\QueueableAction\QueueableAction;

class Check
{
    use QueueableAction;

    public function execute(Model $scheda, Collection $criteriEsclusione, Collection $criteriOption)
    {
        $motivi = [];
        foreach ($criteriEsclusione as $criterio) {
            $action = '\Modules\Ptv\Actions\CriteriEsclusione\\'.Str::studly($criterio->name);
            $motivo = app($action)->execute($scheda, $criterio->value, $criteriOption);
            if ($motivo != '') {
                $motivi[] = $motivo;
            }
        }
        $ha_diritto = true;
        $motivo = '';
        if (count($motivi) > 0) {
            $ha_diritto = false;
            $motivo = implode(',', $motivi);
        }
        $scheda->update([
            'ha_diritto' => $ha_diritto,
            'motivo' => $motivo,
        ]);
    }
}
