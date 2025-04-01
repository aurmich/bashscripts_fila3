<?php

declare(strict_types=1);

namespace Modules\Performance\Actions;

use Modules\Performance\Models\CriteriEsclusione;
use Modules\Performance\Models\CriteriOption;
use Spatie\QueueableAction\QueueableAction;

class UpdateHaDirittoAction
{
    use QueueableAction;

    public function execute(string $model_class, int|string $year, string $type = 'dip'): void
    {
        $criteri_esclusione = CriteriEsclusione::where('anno', $year)
            ->get()
            ->pluck('value', 'name')
            ->all();

        $criteri_option = CriteriOption::where('anno', $year)
            ->get()
            ->pluck('value', 'name')
            ->all();

        $schede = $model_class::where('type', $type)
            ->where('anno', $year)
            ->get();
        foreach ($schede as $scheda) {
            [$ha_diritto, $motivo] = app(GetHaDirittoMotivoAction::class)->execute($scheda, $criteri_esclusione, $criteri_option);
            $scheda->motivo = $motivo;
            $scheda->ha_diritto = $ha_diritto;
            $scheda->save();
            // if (23925 == $scheda->matr) { //4 debug
            //    dddx(['ha_diritto' => $ha_diritto, 'motivo' => $motivo]);
            // }
        }
    }
}
