<?php

declare(strict_types=1);

namespace Modules\Performance\Actions;

use Modules\Performance\Models\Individuale as Scheda;
use Spatie\QueueableAction\QueueableAction;

class ShowMailSendedAt
{
    use QueueableAction;

    /**
     * Undocumented function.
     */
    public function execute(Scheda $model): string
    {
        $a = Scheda::firstWhere(['id' => $model->getKey()]);

        $html = '';
        foreach ($a->myLogs()->where('act', 'sendMail')->get() as $row) {
            $html .= '<br/>'.$row->updated_at;
        }

        return $html;
    }
}
