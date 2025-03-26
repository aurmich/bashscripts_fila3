<?php

declare(strict_types=1);

namespace Modules\Sigma\Models\Traits\Mutators;

trait EnteMatrAnnoMutator
{
    public function getPercPTimeYearAttribute($value): int|float
    {
        $rows = $this->qua00fYear();
        $array = $rows->get()->toArray();

        // echo '<pre>';print_r($array);echo '</pre>';

        $ore = 0;
        $giorni = 0;
        foreach ($array as $v) {
            $ore += ($v['oree'] / $v['oret']) * $v['giorni'];
            $giorni += $v['giorni'];
        }

        if ($giorni === 0) {
            return 0;
        }

        // echo '<h3>'.$ris.'</h3>';
        return $ore / $giorni;
    }

    public function getPercParttimeAnnoAttribute($value)
    {
        // *
        if ($value !== null) {
            return $value;
        }

        // */
        $date_max = $this->anno * 10000 + 1231;
        $date_min = $this->anno * 10000 + 101;
        $rows = $this->qua00f()
            ->withDays($date_min, $date_max)
            ->withPercPtime()
            ->having('days', '>', 0)
        // ->sum(\DB::raw('order_product.price * order_product.quantity'));
            ->get();
        $perc = 0;
        $peso = 0;
        foreach ($rows as $row) {
            $perc += $row->perc_ptime * $row->days;
            $peso += $row->days;
        }

        $value = 0;
        if ($peso !== 0) {
            $value = ($perc / $peso);
        }

        // $value = number_format($value, 3);
        $this->perc_parttime_anno = $value;
        $this->save();

        return $value;
    }

    public function getGgParttimevertAnnoAttribute($value)
    {
        // *
        if ($value !== null) {
            return $value;
        }

        // */
        $date_max = $this->anno * 10000 + 1231;
        $date_min = $this->anno * 10000 + 101;

        $value = $this->asz00k1()
            ->where('asztip', 505)
            ->where('aszcod', 97)
            ->withDays($date_min, $date_max)
            ->get()
            ->sum('days');
        // $value = number_format($value, 3);
        $this->gg_parttimevert_anno = $value;
        $this->save();

        return $value;
    }

    public function getGgPTimeVertYearAttribute($value): int|float
    {
        $asz = $this->asz00k1Year()->where('asztip', 505)->where('aszcod', 97)->get();
        $giorni = 0;
        foreach ($asz as $v) {
            $giorni += $v->aszdur;
        }

        return $giorni;
    }

    public function getGgParttimevertAttribute(?int $value): ?int
    {
        // *
        if ($value !== null && ! request()->input('refresh', false)) {
            return $value;
        }

        // */
        $date_max = $this->anno * 10000 + 1231;
        $date_min = $this->anno * 10000 + 101;

        $value = $this->asz00k1()
            ->where('asztip', 505)
            ->where('aszcod', 97)
            ->withDays($date_min, $date_max)
            ->get()
            ->sum('days');
        // $value = number_format($value, 3);
        $this->gg_parttimevert = $value;
        $this->save();

        return (int) $value;
    }

    public function getPercParttimeAttribute(?float $value): ?float
    {
        // *
        if ($value !== null && ! request()->input('refresh', false)) {
            return $value;
        }

        // */
        $date_max = $this->anno * 10000 + 1231;
        $date_min = $this->anno * 10000 + 101;
        $rows = $this->qua00f()
            ->withDays($date_min, $date_max)
            ->withPercPtime()
            ->having('days', '>', 0)
        // ->sum(\DB::raw('order_product.price * order_product.quantity'));
            ->get();
        $perc = 0;
        $peso = 0;
        foreach ($rows as $row) {
            $perc += $row->perc_ptime * $row->days;
            $peso += $row->days;
        }

        $value = ($perc / $peso);
        // $value = number_format($value, 3);
        $this->perc_parttime = $value;
        $this->save();

        return (float) $value;
    }
}
