<?php

declare(strict_types=1);

namespace Modules\Ptv\Actions;

use Spatie\QueueableAction\QueueableAction;

class FixValutatoreIdByAnno
{
    use QueueableAction;

    public function execute(string $moduleName, string $modelName, string|int|null $anno): bool
    {
        $schedeClass = "\Modules\\".$moduleName."\Models\\".$modelName;
        $stabiDiriClass = "\Modules\\".$moduleName."\Models\StabiDirigente";
        $rows = $schedeClass::where('anno', $anno)
            ->get();
        $rows->where('valutatore_id', null);
        /*
        foreach ($rows_no_valutatore as $row) {
            echo '['.$row->valutatore_id.']';
        }
        */
        $valutatore_ids = $stabiDiriClass::where('anno', $anno)->whereRaw('id=valutatore_id')->get()->modelKeys();
        $rows_invalid = $rows->whereNotIn('valutatore_id', $valutatore_ids);

        foreach ($rows_invalid as $row) {
            $valid = $stabiDiriClass::firstOrCreate(
                [
                    'anno' => $anno,
                    'stabi' => $row->stabi,
                    'repar' => $row->repar,
                ]
            );

            $valutatore_id = $valid->valutatore_id;
            if ($valutatore_id == null) {
                $valid_0 = $stabiDiriClass::firstOrCreate(
                    [
                        'anno' => $anno,
                        'stabi' => $row->stabi,
                        'repar' => 0,
                    ]
                );

                if ($valid_0->valutatore_id == null) {
                    $valid_0->update(['valutatore_id' => $valid_0->id]);
                }

                $valutatore_id = $valid_0->valutatore_id;
            }

            $row->update(['valutatore_id' => $valutatore_id]);
        }

        return true;
    }
}
