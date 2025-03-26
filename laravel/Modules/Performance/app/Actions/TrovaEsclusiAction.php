<?php

declare(strict_types=1);

namespace Modules\Performance\Actions;

use Illuminate\Database\Eloquent\Model;
use Spatie\QueueableAction\QueueableAction;

class TrovaEsclusiAction
{
    use QueueableAction;

    public int $year;

    public function check(string $name, string $value, object $model): string
    {
        if (! $model instanceof Model) {
            throw new \InvalidArgumentException('Model must be an instance of Illuminate\Database\Eloquent\Model');
        }

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
