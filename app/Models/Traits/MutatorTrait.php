<?php

declare(strict_types=1);

namespace Modules\IndennitaResponsabilita\Models\Traits;

use Carbon\Carbon;
use Request;

// use Laravel\Scout\Searchable;
// ----- models------

// ------ ext models---

// ----- services -----

// ------ traits ---

trait MutatorTrait
{
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
        $this->gg_presenza_periodo = $gg;
        $this->save();

        return $gg;
    }
}
