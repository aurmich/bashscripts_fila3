<?php

declare(strict_types=1);

<<<<<<< HEAD
namespace Modules\Progressioni\Services;

use Modules\Progressioni\Models\CriteriValutazione;
=======
namespace Modules\Performance\Services;

use Modules\Performance\Models\CriteriValutazione;
>>>>>>> 961ad402 (first)
use Request;

class CriteriValutazioneService
{
    /**
     * Undocumented function.
     */
    public static function getFieldsYear(int $year, bool $is_po = false): array
    {
<<<<<<< HEAD
        $year = Request::input('year', 0);
        if (is_string($year)) {
            $year = intval($year);
        }
        $criteri = CriteriValutazione::where('anno', $year)
            // ->where('descr', $po_str)
=======
        $year = (int) Request::input('year');
        $po_str = $is_po ? 'PO' : '';
        $criteri = CriteriValutazione::where('anno', $year)
            ->where('descr', $po_str)
>>>>>>> 961ad402 (first)
            ->get();

        $data = [];
        foreach ($criteri as $v) {
            $tmp = (object) [
<<<<<<< HEAD
                // 'type' => 'Decimal',
                'type' => 'String',
                'name' => $v->name,
                'label' => $v->label,
                // 'rules' => 'required|numeric|min:0|max:4',
=======
                'type' => 'Decimal',
                'name' => $v->nome,
                'label' => $v->label,
                'rules' => 'required|numeric|min:0|max:4',
            ];
            $data[] = $tmp;
        }

        return $data;
    }

    public static function getFieldsYearPostType(int $year, string $post_type): array
    {
        // $year = (int)\Request::input('year');

        $criteri = CriteriValutazione::where('anno', $year)
            ->where('post_type', $post_type)
            ->get();

        $data = [];
        foreach ($criteri as $v) {
            $tmp = (object) [
                'type' => 'Decimal',
                'name' => $v->nome,
                'label' => $v->label,
                'rules' => 'required|numeric|min:0|max:4',
>>>>>>> 961ad402 (first)
            ];
            $data[] = $tmp;
        }

        return $data;
    }
}
