<?php

declare(strict_types=1);

namespace Modules\Ptv\Actions\CriteriEsclusione;

use Illuminate\Database\Eloquent\Model;
use Spatie\QueueableAction\QueueableAction;

class MinGgCatecoPosfunInSedeNoAsz
{
    use QueueableAction;

    public function execute(Model $scheda, string $value): string
    {
        $value = intval($value);
        if ($scheda->gg_cateco_posfun_in_sede_no_asz < $value) {
            return ' no min_gg_cateco_posfun_in_sede_no_asz [my:'.$scheda->gg_cateco_posfun_in_sede_no_asz.'][min:'.$value.']';
        }

        return '';
    }
}
