<?php

declare(strict_types=1);

namespace Modules\Performance\Actions;

use Modules\Performance\Models\Individuale as Scheda;
use Modules\Performance\Models\MyLog;
use Spatie\QueueableAction\QueueableAction;
use Carbon\Carbon;

class ShowMailSendedAt
{
    use QueueableAction;

    /**
     * Get the formatted mail sent dates for a given model.
     *
     * @param Scheda $model The model to get mail sent dates for
     * @return string HTML formatted string containing mail sent dates
     */
    public function execute(Scheda $model): string
    {
        $a = Scheda::firstWhere(['id' => $model->getKey()]);

        if (!$a) {
            return '';
        }

        $html = '';
        /** @var MyLog $row */
        foreach ($a->myLogs()->where('act', 'sendMail')->get() as $row) {
            $html .= '<br/>' . ($row->updated_at?->format('Y-m-d H:i:s') ?? '');
        }

        return $html;
    }
}
