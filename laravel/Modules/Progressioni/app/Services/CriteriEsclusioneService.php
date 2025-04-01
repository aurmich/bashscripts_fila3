<?php

declare(strict_types=1);

namespace Modules\Performance\Services;

use Illuminate\Support\Str;
use Modules\Performance\Models\CriteriEsclusione;

class CriteriEsclusioneService
{
    public static function getFieldsYear(int $year): array
    {
        $criteri = CriteriEsclusione::where('anno', $year)->get();
        // dddx(['anno' => $year, 'criteri' => $criteri]);
        $data = [];
        foreach ($criteri as $v) {
            $v = optional($v);
            $show = false;
            $name = '';
            if (Str::startsWith($v->name, 'min_')) {
                $name = Str::after($v->name, 'min_');
                if ((int) $v->value !== 0) {
                    $show = true;
                }

                // $name .= '['.$v->value.']'; //4 debug
            }

            if (Str::startsWith($v->name, 'max_')) {
                $name = Str::after($v->name, 'max_');
                if ((int) $v->value !== 0) {
                    $show = true;
                }

                // $name .= '['.$v->value.']'; //4 debug
            }

            if (Str::endsWith($v->name, '_list')) {
                $name = Str::before($v->name, '_list');
                if (Str::startsWith($name, 'no')) {
                    $name = Str::after($name, 'no');
                }

                if ($v->value !== null) {
                    $show = true;
                }

                // $name .= '['.$v->value.']'; //4 debug
            }

            $tmp = (object) [
                'type' => 'String',
                'name' => $name,
                'rules' => '',
                // 'value' => 'zibibbo',
                'col_size' => 4,
            ];
            if ($show) {
                $data[] = $tmp;
            }
        }

        return $data;
    }
}
