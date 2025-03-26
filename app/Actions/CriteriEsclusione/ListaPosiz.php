<?php

declare(strict_types=1);

namespace Modules\Ptv\Actions\CriteriEsclusione;

use Illuminate\Database\Eloquent\Model;
use Spatie\QueueableAction\QueueableAction;

class ListaPosiz
{
    use QueueableAction;

    public function execute(Model $scheda, string $value): string
    {
        $posiz = $scheda->posiz;
        if (\in_array($posiz, explode(',', $value), true)) {
            return 'no posiz';
        }

        return '';
    }
}
