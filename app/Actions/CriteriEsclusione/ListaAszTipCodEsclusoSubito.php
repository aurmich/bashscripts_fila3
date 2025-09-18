<?php

declare(strict_types=1);

namespace Modules\Ptv\Actions\CriteriEsclusione;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Spatie\QueueableAction\QueueableAction;

class ListaAszTipCodEsclusoSubito
{
    use QueueableAction;

    public function execute(Model $scheda, string $value, Collection $option): string
    {
        // $asz_al = Carbon::parse($data_presenza_al)->format('Ymd');
        $asz_al = $option->get('data_presenza_al')->format('Ymd');

        // $asz_dal = Carbon::parse($data_presenza_al)
        $asz_dal = $option->get('data_presenza_al')
            ->subDays($option->get('min_gg_asz_tip_cod_escluso_subito'))
            ->format('Ymd');

        $tmp = $scheda->asz()
            ->ofRangeDate($asz_dal, $asz_al)
            ->select('asztip', 'aszcod')
            ->distinct()
            ->get()
            ->toArray();
        $tmp1 = collect($tmp)->map(static fn ($item): string => $item['asztip'].'-'.$item['aszcod'])->intersect(explode(',', $value))->count();

        if ($scheda->matr === 23698) {
            // dddx(explode(',',$lista_asz_tip_cod_escluso_subito));
            // dddx($tmp1);
        }

        if ($tmp1 > 0) {
            return 'asz_tip_cod_escluso_subito';
        }

        return '';
    }
}
