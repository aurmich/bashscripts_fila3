<?php

declare(strict_types=1);

namespace Modules\Ptv\Actions;

use Illuminate\Support\Facades\Auth;
use Spatie\QueueableAction\QueueableAction;

class GetAllValutatoriOptions
{
    use QueueableAction;

    public function execute(string $name, string|int|null $anno): array
    {
        // $user = Auth::user();
        // $stabis = $user->teams->modelKeys();

        // return $stabis;

        $stabiDiriClass = "\Modules\\".$name."\Models\StabiDirigente";

        $valutatori = $stabiDiriClass::where('anno', $anno)
                        // ->where('nome_diri', '!=', null)
            ->whereRaw('valutatore_id = id')
                        // ->whereIn('id', $all)
            ->get();

        return $valutatori->keyBy('valutatore_id')->map(static function ($v, $k): string {
            /* use ($anno) */
            // $n = Schede::where('anno', $anno)->where('valutatore_id', $v->id)->count();
            // $n = $v->schede->count();
            // return $v->valutatore_id.'] '.$v->nome_diri.'  '.$v->nome_diri_plus.' ('.$n.')';
            return $v->valutatore_id.'] '.$v->nome_diri.'  '.$v->nome_diri_plus.' ';
            // $panel = Panel::make()->get($v);
            // dddx($panel);
            // return $panel->optionLabel($v);
        })->toArray();
    }
}
