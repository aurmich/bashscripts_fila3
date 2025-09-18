<?php

declare(strict_types=1);

<<<<<<< HEAD
<<<<<<< HEAD
namespace Modules\IndennitaCondizioniLavoro\Models\Traits;

use Carbon\Carbon;
use Modules\Sigma\Models\Traits\Mutators\EnteMatrAnnoMutator;
use Modules\Sigma\Models\Traits\Mutators\EnteMatrDateRangeMutator;
use Modules\Sigma\Models\Traits\Mutators\EnteMatrMutator;
=======
namespace Modules\IndennitaResponsabilita\Models\Traits;

use Carbon\Carbon;
>>>>>>> e0005d7d (first)
use Request;

// use Laravel\Scout\Searchable;
// ----- models------
<<<<<<< HEAD
// use Modules\IndennitaCondizioniLavoro\Models\IndennitaResponsabilita;
=======

>>>>>>> e0005d7d (first)
// ------ ext models---

// ----- services -----

// ------ traits ---

trait MutatorTrait
{
<<<<<<< HEAD
    use EnteMatrAnnoMutator;
    use EnteMatrDateRangeMutator;
    use EnteMatrMutator;

=======
>>>>>>> e0005d7d (first)
    public function getFromFieldAttribute(?string $value): string
    {
        return 'dal';
    }

    public function getToFieldAttribute(?string $value): string
    {
        return 'al';
    }

    public function getDalAttribute($value)
    {
        // if(is_object($value)) return $value;
        // if($value!=null) return Carbon::parse($value);
        $dt = Carbon::create($this->anno, 1, 1, 0);
        $value = clone ($dt)->addQuarters($this->trimestre - 1);
        $this->dal = $value;
        $this->save();

        return $value;
    }

    public function getAlAttribute($value)
    {
        // if(is_object($value)) return $value;
        // if($value!=null) return Carbon::parse($value);
        $dt = Carbon::create($this->anno, 1, 1, 0);
        $value = clone ($dt)->addQuarters($this->trimestre)->subDay();

        $this->al = $value;
        $this->save();

        return $value;
    }

    public function getGgPresenzaPeriodoAttribute(?int $value): ?int
    {
        // devo esplicitare quando e' stata aggiornata la tabella wstr01lx o non ha senso
<<<<<<< HEAD
        /*
        if (! \Request::input('refresh', false)) {
            if (null !== $value && ! request()->input('refresh', false)) {
                return $value;
            }
            if (null === $this->dal) {
                return 0;
            }
            if (null === $this->al) {
                return 0;
            }
        }
        */
        $dal = $this->dal;
        $al = $this->al;
        if ($this->anno >= 2023) {
            $q = $this->quadrimestre;
            $dal = Carbon::parse($this->anno.'-01-01')->addMonths(4 * ($q - 1));
            $al = Carbon::parse($this->anno.'-01-01')->addMonths(4 * $q)->subDays(1);
            // dddx(['dal'=>$dal,'al'=>$al,'q'=>$q,'anno'=>$this->anno,'this'=>$this]);
        }

        $dal = (int) $dal->format('Ymd');
        $al = (int) $al->format('Ymd');
        // dddx([$dal,$al]);
        $gg = $this->wstr01lx()
            ->select('wtdata')
            ->distinct('wtdata')
            ->where('wtdata', '>=', $dal)
            ->where('wtdata', '<=', $al)
            ->get();
        // dddx([$gg->pluck('wtdata'),'al'=>$al]);
        $gg = $gg->count();

=======
        if (! Request::input('refresh', false)) {
            if ($value !== null && ! request()->input('refresh', false)) {
                return $value;
            }

            if ($this->dal === null) {
                return 0;
            }

            if ($this->al === null) {
                return 0;
            }
        }

        $dal = $this->dal->format('Ymd');
        $al = $this->al->format('Ymd');

        $gg = $this->wstr01lx()->select('wtdata')->distinct('wtdata')
            ->where('wtdata', '>=', $dal)
            ->where('wtdata', '<=', $al)
            ->get()->count();
>>>>>>> e0005d7d (first)
        $this->gg_presenza_periodo = $gg;
        $this->save();

        return $gg;
=======
namespace Modules\Performance\Models\Traits;

use Modules\Performance\Models\Individuale;

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
            ->OfListaTipoCodice($lista_tipo_codice_assenze)
            ->selectRaw('COALESCE(sum(aszdur),0) as aszdur_sum')
            ->OfRangeDate($date_min, $date_max)
        // ->withDays($date_min, $date_max)
            ->where('aszumi', 'G')
            ->first();
        // ->sum('aszdur')
        $value = $value->aszdur_sum;

        $this->gg_assenza_dalal = $value;
        $this->save();

        return (int) $value;
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
            ->OfListaTipoCodice($lista_tipo_codice_assenze)
            ->selectRaw('sum('.$aszdur.') as aszdur_sum')
            ->OfRangeDate($date_min, $date_max)
        // ->withDays($date_min, $date_max)
            ->where('aszumi', 'O')
            ->first();
        // ->sum('aszdur')
        $value = $value->aszdur_sum;
        if ($value === '') {
            $value = 0;
        }

        if ($value === null) {
            $value = 0;
        }

        $this->hh_assenza_dalal = $value;
        $this->save();

        return (float) $value;
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
>>>>>>> 961ad402 (first)
    }
}
