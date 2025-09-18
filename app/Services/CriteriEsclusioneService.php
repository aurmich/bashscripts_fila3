<?php

declare(strict_types=1);

namespace Modules\Progressioni\Services;

use Illuminate\Support\Str;
use Modules\Progressioni\Models\CriteriEsclusione;
use Modules\Progressioni\Models\CriteriPrecedenza;

class CriteriEsclusioneService
{
    /**
     * Undocumented function.
     */
    /*
    public static function getFieldsYear(int $year, bool $is_po = false): array {
        $year = intval( \Request::input('year'));
        $po_str = $is_po ? 'PO' : '';
        $criteri = CriteriPrecedenza::where('anno', $year)
            //->where('descr', $po_str)
            ->orderBy('posizione')
            ->get();

        $data = [];
        foreach ($criteri as $v) {
            $tmp = (object) [
                //'type' => 'Decimal',
                'type' => 'String',
                'name' => $v->name,
                'label' => $v->label,
                //'rules' => 'required|numeric|min:0|max:4',
            ];
            $data[] = $tmp;
        }

        return $data;
    }
    */

    public static function getFieldsNamesYear(int $year, bool $is_po = false): array
    {
        return CriteriEsclusione::where('anno', $year)
            ->get()
            ->filter(
                static fn ($item): bool => Str::startsWith((string) $item->name, 'min_') && $item->value !== 0
            )
            ->map(static function ($item) {
                $item->name = Str::after($item->name.'', 'min_');

                return $item;
            })
            ->pluck('name')
            ->all();
    }
}
