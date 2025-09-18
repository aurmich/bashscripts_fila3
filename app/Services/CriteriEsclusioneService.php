<?php

declare(strict_types=1);

<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> f3d4311a (Squashed 'laravel/Modules/Progressioni/' content from commit 72d99eef1)
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
<<<<<<< HEAD
=======
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
>>>>>>> 961ad402 (first)
=======
>>>>>>> f3d4311a (Squashed 'laravel/Modules/Progressioni/' content from commit 72d99eef1)
        }

        return $data;
    }
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> f3d4311a (Squashed 'laravel/Modules/Progressioni/' content from commit 72d99eef1)
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
<<<<<<< HEAD
=======
>>>>>>> 961ad402 (first)
=======
>>>>>>> f3d4311a (Squashed 'laravel/Modules/Progressioni/' content from commit 72d99eef1)
}
