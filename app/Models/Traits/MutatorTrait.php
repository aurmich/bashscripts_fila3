<?php

declare(strict_types=1);

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
    }
}
