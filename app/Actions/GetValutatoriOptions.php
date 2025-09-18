<?php

declare(strict_types=1);

namespace Modules\Ptv\Actions;

use Illuminate\Support\Facades\Auth;
use Spatie\QueueableAction\QueueableAction;

class GetValutatoriOptions
{
    use QueueableAction;

    public function execute(string $name, string|int|null $anno): array
    {
        $user = Auth::user();
        $stabis = $user->teams->modelKeys();

        $stabiDiriClass = "\Modules\\".$name."\Models\StabiDirigente";

        $valutatori = $stabiDiriClass::whereIn('stabi', $stabis)
                        // ->where('repar', 0)
            ->where('anno', $anno)
                        // ->where('nome_diri', '!=', null)
            ->whereRaw('valutatore_id = id')
                        // ->whereIn('id', $all)
            ->get();

        return $valutatori
            ->keyBy('valutatore_id')
            ->map(static function ($v, $k): string {
                return $v->valutatore_id.'] '.$v->nome_diri.'  '.$v->nome_diri_plus.' ['.$v->anno.']';
            })->toArray();
    }
}
