<?php

declare(strict_types=1);

namespace Modules\Sigma\Actions;

use Spatie\QueueableAction\QueueableAction;

class MassUpdateCognomeNomeAction
{
    use QueueableAction;

    /**
     * Execute the action.
     */
    public function execute($conn, string $table, string $where)
    {
        $tbl = app(Ana10f::class);
        // $tbl->indexIfNotExists(['ente', 'matr']);

        $sql = 'update '.$table.' set cognome = (select conome from generale.ana10f
		where ana10f.ente='.$table.'.ente and
			  ana10f.matr='.$table.'.matr limit 1)
		where '.$where;
        $conn->statement($sql);
        $sql = 'update '.$table.' set nome = (select nome from generale.ana10f
		where ana10f.ente='.$table.'.ente and
			  ana10f.matr='.$table.'.matr
			  limit 1)
		where '.$where;

        return $conn->statement($sql);
    }
}
