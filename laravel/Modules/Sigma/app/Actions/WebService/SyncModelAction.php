<?php

declare(strict_types=1);

namespace Modules\Sigma\Actions\WebService;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use Spatie\QueueableAction\QueueableAction;

class SyncModelAction
{
    use QueueableAction;

    /**
     * Execute the action.
     */
    public function execute(string $tbl, Model $model, array $only = []): int
    {
        \Safe\ini_set('memory_limit', '-1');

        // API
        $employees = Http::withBasicAuth(
            config('sigma_api.user'),
            config('sigma_api.pwd')
        )
            ->get('https://ws.sigmapaghe.com/hrdownloader/api/enti/90/queries/'.$tbl)
            ->json();

        $employees = Arr::map($employees, function ($employee) use ($model, $only) {
            $data = [
                'matricola' => $employee['MATR'],
                'cognome' => $employee['CONOME'],
                'nome' => $employee['NOME'],
                'sesso' => Str::lower($employee['SESSO']),
                'codice_fiscale' => 'STRNCL96E14L407V',
                'posizione_inail' => $employee['INAIL'],
            ];

            $where = Arr::only($employee, $only);

            $model::updateOrCreate($where, $data);
        });

        return count($employees);
    }
}
