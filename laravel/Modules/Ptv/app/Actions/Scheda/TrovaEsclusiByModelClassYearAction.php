<?php

declare(strict_types=1);

namespace Modules\Ptv\Actions\Scheda;

use Illuminate\Database\Eloquent\Collection;
use Spatie\QueueableAction\QueueableAction;
use Carbon\Carbon;
use Illuminate\Support\Str;


class TrovaEsclusiByModelClassYearAction
{
    use QueueableAction;

    /**
     * Undocumented function.
     */
   public function execute(string $modelClass, string $fieldName, int $year)
    {
        $rows = $modelClass::where($fieldName, $year)
            // ->where('matr','23990')
            //->where('ha_diritto', null)
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
                        dddx($item);
                        break;
                }
                $item->value_real = $value;

                return $item;
            })
            ->pluck('value_real', 'name');

        /*
        dddx([
            'rows'=>$rows,
            'criteri_esclusione'=>$criteri_esclusione,
            'criteri_option'=>$criteri_option,
        ]);
        */
        foreach ($rows as $row) {
            app(\Modules\Ptv\Actions\CriteriEsclusione\Check::class)->execute($row, $criteri_esclusione, $criteri_option);
        }
    }
}
