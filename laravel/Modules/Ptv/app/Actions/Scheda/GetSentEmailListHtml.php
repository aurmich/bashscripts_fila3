<?php

declare(strict_types=1);

namespace Modules\Ptv\Actions\Scheda;

use Modules\Ptv\Models\Contracts\SchedaContract;
use Spatie\QueueableAction\QueueableAction;

class GetSentEmailListHtml
{
    use QueueableAction;

    /**
     * Undocumented function.
     */
    public function execute(SchedaContract $record): string
    {
        $html = '';
        foreach ($record->myLogs()->where('act', 'sendMail')->get() as $row) {
            $html .= '<br/>'.$row->updated_at;
        }

        return $html;
    }
}
