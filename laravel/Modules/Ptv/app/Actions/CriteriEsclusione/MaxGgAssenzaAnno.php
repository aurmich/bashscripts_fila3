<?php

declare(strict_types=1);

namespace Modules\Ptv\Actions\CriteriEsclusione;

use Illuminate\Database\Eloquent\Model;
use Spatie\QueueableAction\QueueableAction;

class MaxGgAssenzaAnno
{
    use QueueableAction;

    public function execute(Model $scheda, string $value): string
    {
        

        return '';
    }
}
