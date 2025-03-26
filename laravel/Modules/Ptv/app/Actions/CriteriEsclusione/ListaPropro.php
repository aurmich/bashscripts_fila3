<?php

declare(strict_types=1);

namespace Modules\Ptv\Actions\CriteriEsclusione;

use Illuminate\Database\Eloquent\Model;
use Spatie\QueueableAction\QueueableAction;

class ListaPropro
{
    use QueueableAction;

    public function execute(Model $scheda, string $value): string
    {
        $propro = $scheda->propro;
        if (\in_array($propro, explode(',', $value), true)) {
            return 'no propro';
        }

        return '';
    }
}
