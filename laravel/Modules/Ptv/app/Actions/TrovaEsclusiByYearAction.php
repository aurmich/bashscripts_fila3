<?php

declare(strict_types=1);

namespace Modules\Ptv\Actions;

use Carbon\Carbon;
use Illuminate\Support\Str;
use Spatie\QueueableAction\QueueableAction;

class TrovaEsclusiByYearAction
{
    use QueueableAction;

    public function execute(string $modelClass, string $fieldName, ?string $year)
    {
        $rows = $modelClass::where($fieldName, $year)
            // ->where('matr','23990')
            ->where('ha_diritto', null)
            ->inRandomOrder()
            ->get();

        $module_name = Str::between($modelClass, 'Modules\\', '\Models\\');

        $criteri_esclusione_class = '\Modules\\'.$module_name.'\Models\CriteriEsclusione';
        $criteri_option_class = '\Modules\\'.$module_name.'\Models\CriteriOption';
        $criteri_esclusione = $criteri_esclusione_class::where($fieldName, $year)
            ->where('value', '!=', 0)
            ->get();
        $criteri_option = $criteri_option_class::where($fieldName, $year)
            ->get()
            ->map(function ($item) {
                $value = '';
                switch ($item->type) {
                    case 'list':
                        $value = explode(',', $item->value);
                        break;
                    case 'int':
                        $value = intval($value);
                        break;
                    case 'date':
                        $value = $item->value;
                        if ($value != null) {
                            $value = Carbon::parse($value);
                        }
                        break;
                    default:
                        dddx($item->type);
                        break;
                }
                $item->value_real = $value;

                return $item;
            })
            ->pluck('value_real', 'name');

        // dddx($criteri_option->get('data_presenza_al'));

        foreach ($rows as $row) {
            app(\Modules\Ptv\Actions\CriteriEsclusione\Check::class)->execute($row, $criteri_esclusione, $criteri_option);
        }
    }
}
