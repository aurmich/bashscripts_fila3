<?php

declare(strict_types=1);

namespace Modules\Ptv\Actions\CriteriEsclusione;

use Illuminate\Database\Eloquent\Model;
use Spatie\QueueableAction\QueueableAction;

class MinGgEffettuati
{
    use QueueableAction;

    public function execute(Model $scheda, string $value): string
    {
        /*
        $value = intval($value);
        $eff = $scheda->gg_presenza_anno - $scheda->gg_assenza_anno;

        if ($eff < $value) {
            return 'no min gg_anno [my:'.$eff.'][min:'.$value.']';
        }
            */

        return '';
    }
}
