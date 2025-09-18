<?php

declare(strict_types=1);

namespace Modules\Performance\Models\Traits;

use Illuminate\Database\Eloquent\Model;
use Modules\Performance\Models\Individuale;

/**
 * @template TModel of Model
 */
trait MutatorTrait
{
    public function getGgAssenzaDalalAttribute(?int $value): ?int
    {
        if ($value !== null) {
            return $value;
        }

        $lista_tipo_codice_assenze = $this->listaTipoCodiceAssenze();

        $date_min = $this->dal;
        $date_max = $this->al;

        if ($date_min === '') {
            return 0;
        }

        $value = $this->asz00k1()
            ->whereIn('aszcod', $lista_tipo_codice_assenze)
            ->selectRaw('COALESCE(sum(aszdur),0) as aszdur_sum')
            ->whereBetween('aszdat', [$date_min, $date_max])
        // ->withDays($date_min, $date_max)
            ->where('aszumi', 'G')
            ->first();
        // ->sum('aszdur')
        $aszdur_sum = $value->aszdur_sum ?? 0;
        $int_value = (int) $aszdur_sum;

        $this->gg_assenza_dalal = $int_value;
        $this->save();

        return $int_value;
    }

    public function getHhAssenzaDalalAttribute(?float $value): ?float
    {
        if ($value !== null) {
            return $value;
        }

        $lista_tipo_codice_assenze = $this->listaTipoCodiceAssenze();

        $aszdur = "(hour(replace(aszdur,'.',':')))+((minute(replace(aszdur,'.',':')))/60)";

        $date_min = $this->dal;
        $date_max = $this->al;

        if ($date_min === '') {
            return 0;
        }

        $value = $this->asz00k1()
            ->whereIn('aszcod', $lista_tipo_codice_assenze)
            ->selectRaw('sum('.$aszdur.') as aszdur_sum')
            ->whereBetween('aszdat', [$date_min, $date_max])
        // ->withDays($date_min, $date_max)
            ->where('aszumi', 'O')
            ->first();
        // ->sum('aszdur')
        $aszdur_sum = $value->aszdur_sum ?? 0;
        if (empty($aszdur_sum)) {
            $float_value = 0.0;
        } else {
            $float_value = (float) $aszdur_sum;
        }

        $this->hh_assenza_dalal = $float_value;
        $this->save();

        return $float_value;
    }

    public function getTotalePunteggioAttribute(?float $value): ?float
    {
        if ($this->getKey() == null) {
            return null;
        }

        if ($value !== null && $value >= 1) {
            return $value;
        }

        $value = 0;

        foreach ($this->criteriValutazione as $v) {
            $val = $this->{$v->nome};
            $peso = $this->getPeso((string) $v->nome);

            $value += $val * $peso / 4;
        }
        if ($value <= 0.001 && $this->ha_diritto > 0) {
            $where = [
                'ente' => $this->ente,
                'matr' => $this->matr,
                'anno' => $this->anno,
            ];
            $row = Individuale::where($where)->where('ha_diritto', '>', 0)
                ->where('esperienza_acquisita', '>', 0)
                ->first();
            if ($row !== null) {
                $up = [];
                foreach ($this->criteriValutazione as $v) {
                    $up[$v->nome] = $row->{$v->nome};
                }
                $this->update($up);
            }
        }
        /*
        if (0.001 >= $value) {
            $tot = 0;
            $gg = 0;

            $voti = $this->criteriValutazione->pluck('nome')->toArray();
            $voti[] = 'totale_punteggio';

            $tot = [];
            foreach ($this->otherWinnerRows as $otherWinnerRow) {
                foreach ($voti as $voto) {
                    if (! isset($tot[$voto])) {
                        $tot[$voto] = 0;
                    }
                    $tot[$voto] += ($otherWinnerRow->attributes[$voto] * $otherWinnerRow->attributes['gg_presenza_dalal']);
                }

                // $tot += $otherWinnerRow->attributes['totale_punteggio'] * $otherWinnerRow->attributes['gg_presenza_dalal'];
                $gg += $otherWinnerRow->attributes['gg_presenza_dalal'];
            }

            if (0 !== $gg) {
                foreach ($voti as $voto) {
                    $tot[$voto] = $tot[$voto] / $gg;
                }
                $this->update($tot);
                $value = $tot['totale_punteggio'];
            }
        }
        // */

        $this->update(['totale_punteggio' => $value]);

        return $value;
    }
}
