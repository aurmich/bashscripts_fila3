<?php

declare(strict_types=1);

<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> f3d4311a (Squashed 'laravel/Modules/Progressioni/' content from commit 72d99eef1)
namespace Modules\Progressioni\Actions;

use Modules\Progressioni\Models\Progressioni;
use Modules\Progressioni\Models\Schede;
<<<<<<< HEAD
=======
namespace Modules\Performance\Actions;

use Modules\Performance\Models\Individuale as Scheda;
>>>>>>> 961ad402 (first)
=======
>>>>>>> f3d4311a (Squashed 'laravel/Modules/Progressioni/' content from commit 72d99eef1)
use Spatie\QueueableAction\QueueableAction;

class ShowMailSendedAt
{
    use QueueableAction;

    /**
     * Undocumented function.
     */
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> f3d4311a (Squashed 'laravel/Modules/Progressioni/' content from commit 72d99eef1)
    public function execute(Schede|Progressioni $model): string
    {
        $a = Schede::firstWhere(['id' => $model->getKey()]);
        $b = Progressioni::firstWhere(['id' => $model->getKey()]);
<<<<<<< HEAD
=======
    public function execute(Scheda $model): string
    {
        $a = Scheda::firstWhere(['id' => $model->getKey()]);
>>>>>>> 961ad402 (first)
=======
>>>>>>> f3d4311a (Squashed 'laravel/Modules/Progressioni/' content from commit 72d99eef1)

        $html = '';
        foreach ($a->myLogs()->where('act', 'sendMail')->get() as $row) {
            $html .= '<br/>'.$row->updated_at;
        }
<<<<<<< HEAD
<<<<<<< HEAD
        foreach ($b->myLogs()->where('act', 'sendMail')->get() as $row) {
            $html .= '<br/>'.$row->updated_at;
        }
=======
>>>>>>> 961ad402 (first)
=======
        foreach ($b->myLogs()->where('act', 'sendMail')->get() as $row) {
            $html .= '<br/>'.$row->updated_at;
        }
>>>>>>> f3d4311a (Squashed 'laravel/Modules/Progressioni/' content from commit 72d99eef1)

        return $html;
    }
}
