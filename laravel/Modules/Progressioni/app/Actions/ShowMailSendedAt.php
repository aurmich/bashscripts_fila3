<?php

declare(strict_types=1);

namespace Modules\Progressioni\Actions;

use Modules\Progressioni\Models\Progressioni;
use Modules\Progressioni\Models\Schede;
use Spatie\QueueableAction\QueueableAction;

class ShowMailSendedAt
{
    use QueueableAction;

    /**
     * Undocumented function.
     */
    public function execute(Schede|Progressioni $model): string
    {
        $a = Schede::firstWhere(['id' => $model->getKey()]);
        $b = Progressioni::firstWhere(['id' => $model->getKey()]);

        $html = '';
        foreach ($a->myLogs()->where('act', 'sendMail')->get() as $row) {
            $html .= '<br/>'.$row->updated_at;
        }
        foreach ($b->myLogs()->where('act', 'sendMail')->get() as $row) {
            $html .= '<br/>'.$row->updated_at;
        }

        return $html;
    }
}
