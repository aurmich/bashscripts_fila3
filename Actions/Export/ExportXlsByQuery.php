<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\Export;

use Illuminate\Database\Query\Builder;
use Illuminate\Http\Response;
use Modules\Xot\Exports\QueryExport;
use Spatie\QueueableAction\QueueableAction;
use Staudenmeir\LaravelCte\Query\Builder as CteBuilder;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class ExportXlsByQuery
{
    use QueueableAction;

    public function execute(
        Builder|CteBuilder $query,
        string $filename = 'test.xlsx',
        ?string $transKey = null,
        ?array $fields = null
    ): Response|BinaryFileResponse {
        $queryExport = new QueryExport($query, $transKey, $fields);
        // $queryExport->queue($filename); // Serialization of 'PDO' is not allowed

        return $queryExport->download($filename);
    }
}
