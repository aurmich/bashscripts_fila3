<?php

declare(strict_types=1);

namespace Modules\Performance\Actions\Organizzativa;

use Modules\Performance\Models\Organizzativa as Schede;
use Spatie\QueueableAction\QueueableAction;

/**
 * ---.
 */
class UpdateRestiAction
{
    use QueueableAction;

    /**
     * ---.
     */
    public function execute(string $year, string $type): void
    {
        $model = app(Schede::class);
        $tbl = $model->getTable();
        $conn = $model->getConnection();
        $where = 'ha_diritto>0 and anno="'.$year.'" and type = "'.$type.'"';

        $sql = 'update '.$tbl.' as A set resti=budget_assegnato-quota_effettiva
        where '.$where;

        echo '['.__LINE__.']<pre>'.$sql.'</pre>';
        $conn->statement($sql);
    }
}
