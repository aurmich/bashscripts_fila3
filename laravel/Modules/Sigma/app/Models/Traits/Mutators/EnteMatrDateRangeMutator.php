<?php

declare(strict_types=1);

namespace Modules\Sigma\Models\Traits\Mutators;

trait EnteMatrDateRangeMutator
{
    public function getPercPTimeDaterangeAttribute($value): int|float
    {
        $rows = $this->qua00fDaterange();
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

    public function getPercParttimeDalalAttribute($value)
    {
        // *
        if ($value !== null) {
            return $value;
        }

        // */
        $date_min = $this->dal;
        $date_max = $this->al;
        if ($date_min === '') {
            return 0;
        }

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

        if ($peso === 0) {
            return null;
        }

        $value = ($perc / $peso);
        // $value = number_format($value, 3);
        $this->perc_parttime_dalal = $value;
        $this->save();

        return $value;
    }

    public function getGgParttimevertDalalAttribute($value)
    {
        // *
        if ($value !== null) {
            return $value;
        }

        // */

        $date_min = $this->dal;
        $date_max = $this->al;
        if ($date_min === '') {
            return 0;
        }

        $value = $this->asz00k1()
            ->where('asztip', 505)
            ->where('aszcod', 97)
            ->withDays($date_min, $date_max)
            ->get()
            ->sum('days');
        // $value = number_format($value, 3);

        $this->gg_parttimevert_dalal = $value;
        $this->save();

        return $value;
    }

    public function getGgPresenzaDalalAttribute($value)
    {
        
        if ($value !== null) {
            return $value;
        }

        $date_min = $this->dal;
        $date_max = $this->al;
        if ($date_min === '') {
            return 0;
        }

        $value = $this->qua00f()
            ->withDays($date_min, $date_max)
            ->get()
            ->sum('days');
        $this->gg_presenza_dalal = $value;
        $this->save();

        return $value;
    }

    public function getCategoriaEcoAttribute(?string $value): ?string
    {
        if ($value != null) {
            return $value;
        }
        if ($this->matr == null) {
            return null;
        }
        if ($this->qua2kd == null) {
            return null;
        }

        $qua00f = $this->qua00fDaterange()->first();

        if (! \is_object($qua00f)) {
            // dddx($this);

            return null;
        }

        $tqu00f = $qua00f->tqu00f;
        if ($tqu00f === null) {
            $rows = $qua00f->tqu00f();
            dddx(['rows' => $rows, 'sql' => rowsToSql($rows), 'qua00f' => $qua00f]);

            return '---';
        }

        $categoria_eco = $tqu00f->desc1;
        $categoria_eco = str_replace('Posizione economica ', '', (string) $categoria_eco);
        $this->categoria_eco = $categoria_eco;
        $this->save();

        return $this->attributes['categoria_eco'];
    }
}
