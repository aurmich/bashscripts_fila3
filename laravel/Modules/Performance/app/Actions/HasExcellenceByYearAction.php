<?php

declare(strict_types=1);

namespace Modules\Performance\Actions;

use Exception;
use Illuminate\Database\Eloquent\Model;
use Modules\Performance\Models\Individuale;
use Modules\Performance\Models\Performance;
use Spatie\QueueableAction\QueueableAction;

class HasExcellenceByYearAction
{
    use QueueableAction;

    /**
     * @param Performance|Model $model
     */
    public function execute(Model $model, int $year): bool
    {
        if (!property_exists($model, 'ente') || !property_exists($model, 'matr')) {
            throw new Exception('Required properties ente and matr are not defined on model');
        }
        /*
        $model->performanceIndividuale()
            ->whereBetween('anno', [$this->anno - 4, $this->anno - 1])

            ->where('excellence', 1)
            ->get()
        */
        $where = [
            'ente' => $model->ente,
            'matr' => $model->matr,
            'anno' => $year,
            'excellence' => 1,
        ];

        $rows = Individuale::where($where)->get();

        return $rows->count() > 0;
    }
}
