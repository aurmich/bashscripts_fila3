<?php

declare(strict_types=1);

<<<<<<< HEAD
namespace Modules\IndennitaCondizioniLavoro\Actions;

use Carbon\Carbon;
use Modules\IndennitaCondizioniLavoro\Models\CondizioniLavoro;
use Modules\IndennitaCondizioniLavoro\Models\StabiDirigente;
=======
namespace Modules\IndennitaResponsabilita\Actions;

use Modules\IndennitaResponsabilita\Models\IndennitaResponsabilita;
use Modules\IndennitaResponsabilita\Models\StabiDirigente;
>>>>>>> e0005d7d (first)
use Modules\Sigma\Models\Rep00f;
use Spatie\QueueableAction\QueueableAction;

class Populate
{
    use QueueableAction;

    /**
     * Undocumented function.
     */
    public function execute(array $data): void
    {
        $anno = $data['anno'];
<<<<<<< HEAD
        $quadrimestre = $data['quadrimestre'];
        $first_day = Carbon::createFromDate($anno, 1, 1);
        $dal = $first_day->copy()->addMonths(($quadrimestre - 1) * 4);
        $al = $first_day->copy()->addMonths(($quadrimestre - 0) * 4)->subDay();

        $rows = CondizioniLavoro::where('quadrimestre', $quadrimestre)
            ->where('anno', $anno)
            // ->where('valutatore_id',null)
            ->get();
=======

        $rows = IndennitaResponsabilita::where('anno', $anno)
            // ->where('valutatore_id',null)
            ->get();

>>>>>>> e0005d7d (first)
        /*
        $rows_no_valutatore = $rows->where('valutatore_id', null);

        foreach ($rows_no_valutatore as $row) {
            echo '['.$row->valutatore_id.']';
        }

        $valutatore_ids = StabiDirigente::where('anno', $data['anno'])->whereRaw('id=valutatore_id')->get()->modelKeys();
        $rows_invalid = $rows->whereNotIn('valutatore_id', $valutatore_ids);

        foreach ($rows_invalid as $row) {
            $valid = StabiDirigente::firstOrCreate(
                [
                    'anno'=>$data['anno'],
                    'stabi'=>$row->stabi,
                    'repar'=>$row->repar,
                ]);
            $valutatore_id=$valid->valutatore_id;
            if (null == $valutatore_id) {
                $valid_0 = StabiDirigente::firstOrCreate(
                    [
                        'anno'=>$data['anno'],
                        'stabi'=>$row->stabi,
                        'repar'=>0
                    ]);

                if($valid_0->valutatore_id==null){
                    dddx('check');
                }
                $valutatore_id=$valid_0->valutatore_id;

            }
            //dddx(['valid' => $valid->valutatore_id, 'invalid' => $row->valutatore_id]);
            $row->update(['valutatore_id'=>$valutatore_id]);
        }
        */
        $matrs = $rows->pluck('matr')->toArray();

<<<<<<< HEAD
        $rows = Rep00f::ofRangeDate((int) $dal->format('Ymd'), (int) $al->format('Ymd'))
=======
        $rows = Rep00f::ofYear($anno)
>>>>>>> e0005d7d (first)
            ->where('ente', 90)->get();

        $rows = $rows->filter(static fn ($item): bool => ! in_array($item->matr, $matrs));

        foreach ($rows as $row) {
<<<<<<< HEAD
            CondizioniLavoro::firstOrCreate(
=======
            IndennitaResponsabilita::firstOrCreate(
>>>>>>> e0005d7d (first)
                [
                    'ente' => $row->ente,
                    'matr' => $row->matr,
                    'stabi' => $row->repst1,
                    'repar' => $row->repre1,
<<<<<<< HEAD
                    'quadrimestre' => $quadrimestre,
                    'anno' => $anno,
                ],
                [
                    'dal' => $dal,
                    'al' => $al,
=======
                    'anno' => $anno,
                ],
                [
                    //    'dal' => $dal,
                    //    'al' => $al,
>>>>>>> e0005d7d (first)
                ]
            );
        }
    }
}
