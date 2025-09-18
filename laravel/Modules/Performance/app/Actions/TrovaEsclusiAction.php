<?php

declare(strict_types=1);

namespace Modules\Performance\Actions;

use Spatie\QueueableAction\QueueableAction;

class TrovaEsclusiAction
{
    use QueueableAction;

    public int $year;

    public function check(string $name, string $value, object $model): string
    {
        $action = new GetHaDirittoMotivoAction();
        $action->year = $this->year;

        $criteri_esclusione = [$name => $value];
        $criteri_option = [];

        [$ha_diritto, $motivo] = $action->execute($model, $criteri_esclusione, $criteri_option);

        return $motivo;
    }

    public function execute(): void
    {
        dddx('wip');
    }
}
