<?php

declare(strict_types=1);

namespace Modules\Performance\Actions\Organizzativa;

use Modules\Performance\Models\Organizzativa as Schede;
use Spatie\QueueableAction\QueueableAction;

/**
 * ---.
 */
class UpdateAssenzeAction
{
    use QueueableAction;

    /**
     * ---.
     */
    public function execute(string $year, string $type): void
    {
        $rows = Schede::where('anno', $year)
            ->where('type', $type)
            ->where('gg_assenza_dalal', null)
            ->inRandomOrder()
            ->get();
        foreach ($rows as $row) {
            echo $row->gg_assenza_dalal;
        }

        $rows = Schede::where('anno', $year)
            ->where('type', $type)
            ->where('hh_assenza_dalal', null)
            ->inRandomOrder()
            ->get();

        foreach ($rows as $row) {
            echo $row->hh_assenza_dalal;
        }
    }
}
