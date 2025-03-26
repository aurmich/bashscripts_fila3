<?php

declare(strict_types=1);

namespace Modules\Ptv\Actions;

use Filament\Notifications\Notification;
use Modules\Ptv\Datas\RepQuaYearData;
use Spatie\QueueableAction\QueueableAction;

/**
 * ---.
 */
class PopulateByYearAction
{
    use QueueableAction;

    /**
     *  ---.
     */
    public function execute(string $modelClass, string $fieldName, string $year)
    {
        $workers = app(GetWorkersByYear::class)->execute($year);

        $fields = array_keys($workers->first()->toArray());

        $schede = $modelClass::where($fieldName, $year)
            ->select($fields)
            ->get();

        $schede_data = RepQuaYearData::collection($schede->toArray());

        $adds = app(\Modules\Xot\Actions\Array\DiffAssocRecursiveAction::class)->execute($workers->toArray(), $schede_data->toArray());
        $subs = app(\Modules\Xot\Actions\Array\DiffAssocRecursiveAction::class)->execute($schede_data->toArray(), $workers->toArray());

        Notification::make()
            ->title('Added ['.count($adds).'] Subbed ['.count($subs).']')
            ->success()
            ->send();

        foreach ($adds as $add) {
            $add[$fieldName] = $year;
            $modelClass::firstOrCreate($add);
        }

        foreach ($subs as $sub) {
            $sub[$fieldName] = $year;
            $modelClass::where($sub)->delete();
        }

        /*
        dddx([
            'adds' => $adds,
            'subs' => $subs,
        ]);
        */
    }
}
