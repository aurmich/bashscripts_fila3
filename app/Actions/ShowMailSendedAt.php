<?php

declare(strict_types=1);

<<<<<<< HEAD
namespace Modules\Progressioni\Actions;

use Modules\Progressioni\Models\Progressioni;
use Modules\Progressioni\Models\Schede;
=======
namespace Modules\Performance\Actions;

use Modules\Performance\Models\Individuale as Scheda;
>>>>>>> 961ad402 (first)
use Spatie\QueueableAction\QueueableAction;

class ShowMailSendedAt
{
    use QueueableAction;

    /**
     * Undocumented function.
     */
<<<<<<< HEAD
    public function execute(Schede|Progressioni $model): string
    {
        $a = Schede::firstWhere(['id' => $model->getKey()]);
        $b = Progressioni::firstWhere(['id' => $model->getKey()]);
=======
    public function execute(Scheda $model): string
    {
        $a = Scheda::firstWhere(['id' => $model->getKey()]);
>>>>>>> 961ad402 (first)

        $html = '';
        foreach ($a->myLogs()->where('act', 'sendMail')->get() as $row) {
            $html .= '<br/>'.$row->updated_at;
        }
<<<<<<< HEAD
        foreach ($b->myLogs()->where('act', 'sendMail')->get() as $row) {
            $html .= '<br/>'.$row->updated_at;
        }
=======
>>>>>>> 961ad402 (first)

        return $html;
    }
}
