<?php

declare(strict_types=1);

<<<<<<< HEAD
<<<<<<< HEAD
namespace Modules\Progressioni\Services;

use Modules\Progressioni\Models\CriteriValutazione;
=======
namespace Modules\Performance\Services;

use Modules\Performance\Models\CriteriValutazione;
>>>>>>> 961ad402 (first)
=======
namespace Modules\Progressioni\Services;

use Modules\Progressioni\Models\CriteriValutazione;
>>>>>>> f3d4311a (Squashed 'laravel/Modules/Progressioni/' content from commit 72d99eef1)
use Request;

class CriteriValutazioneService
{
    /**
     * Undocumented function.
     */
    public static function getFieldsYear(int $year, bool $is_po = false): array
    {
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> f3d4311a (Squashed 'laravel/Modules/Progressioni/' content from commit 72d99eef1)
        $year = Request::input('year', 0);
        if (is_string($year)) {
            $year = intval($year);
        }
        $criteri = CriteriValutazione::where('anno', $year)
            // ->where('descr', $po_str)
<<<<<<< HEAD
=======
        $year = (int) Request::input('year');
        $po_str = $is_po ? 'PO' : '';
        $criteri = CriteriValutazione::where('anno', $year)
            ->where('descr', $po_str)
>>>>>>> 961ad402 (first)
=======
>>>>>>> f3d4311a (Squashed 'laravel/Modules/Progressioni/' content from commit 72d99eef1)
            ->get();

        $data = [];
        foreach ($criteri as $v) {
            $tmp = (object) [
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> f3d4311a (Squashed 'laravel/Modules/Progressioni/' content from commit 72d99eef1)
                // 'type' => 'Decimal',
                'type' => 'String',
                'name' => $v->name,
                'label' => $v->label,
                // 'rules' => 'required|numeric|min:0|max:4',
<<<<<<< HEAD
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
=======
>>>>>>> f3d4311a (Squashed 'laravel/Modules/Progressioni/' content from commit 72d99eef1)
            ];
            $data[] = $tmp;
        }

        return $data;
    }
}
