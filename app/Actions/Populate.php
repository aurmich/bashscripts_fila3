<?php

declare(strict_types=1);

namespace Modules\Progressioni\Actions;

use Modules\Progressioni\Models\Schede;
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

        $rows = Schede::where('anno', $anno)
            ->get();

        $matrs = $rows->pluck('matr')->toArray();

        $rows = Rep00f::ofYear($anno)
            ->where('ente', 90)->get();

        $rows = $rows->filter(static fn ($item): bool => ! in_array($item->matr, $matrs));

        foreach ($rows as $row) {
            Schede::firstOrCreate(
                [
                    'ente' => $row->ente,
                    'matr' => $row->matr,
                    'stabi' => $row->repst1,
                    'repar' => $row->repre1,
                    'anno' => $anno,
                ],
                [
                    //    'dal' => $dal,
                    //    'al' => $al,
                ]
            );
        }
    }
}
