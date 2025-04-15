<?php

declare(strict_types=1);

namespace Modules\Ptv\Actions;

use Carbon\Carbon;
use Spatie\QueueableAction\QueueableAction;

class MergeDoubleRowCatecoByModelClassYearAction
{
    use QueueableAction;

    public function execute(string $modelClass, string $fieldName, string $year)
    {
        $rows = $modelClass::where([$fieldName => $year])->get();

        $grouped = $rows->groupBy(function ($item) {
            $key = [
                $item->ente,
                $item->matr,
                $item->categoria_eco,
                $item->stabi,
                $item->repar,
            ];

            return implode('-', $key);
        });

        foreach ($grouped as $group) {
            if ($group->count() > 1) {
                $a = $group->first();
                $b = $group->skip(1)->first();
                $a_al = Carbon::createFromFormat('Ymd', $a->al);
                $b_dal = Carbon::createFromFormat('Ymd', $b->dal);
                if ($a_al->addDay() == $b_dal) {
                    $b->dal = $a->dal;
                    $b->save();
                    $a->delete();
                }
            }
        }
    }
}
