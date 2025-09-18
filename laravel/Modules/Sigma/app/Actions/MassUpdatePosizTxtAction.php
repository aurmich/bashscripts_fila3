<?php

declare(strict_types=1);

namespace Modules\Sigma\Actions;

use Illuminate\Support\Facades\Schema;
use Modules\Sigma\Models\Codici;
use Spatie\QueueableAction\QueueableAction;

class MassUpdatePosizTxtAction
{
    use QueueableAction;

    /**
     * Execute the action.
     */
    public function execute($conn, string $table, string $where)
    {
        $tbl = app(Codici::class);
        // $tbl->indexIfNotExists(['tipo', 'codice']);

        $fieldname = 'posiz_txt';
        if (! Schema::connection($conn->getName())->hasColumn($table, $fieldname)) {
            Schema::connection($conn->getName())->table($table, static function ($table) use ($fieldname): void {
                $table->integer($fieldname);
            });
        }

        $sql = 'update '.$table.' set posiz_txt = (
		select desc1 from generale.codici as B
		where B.tipo = 19
			and B.codice = '.$table.'.posiz
			limit 1
		) where '.$where;

        return $conn->statement($sql);
    }
}
