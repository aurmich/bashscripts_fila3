<?php

declare(strict_types=1);

namespace Modules\Sigma\Models\Traits\Relationships;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Modules\Sigma\Models\Ana02f;
use Modules\Sigma\Models\Ana10f;
use Modules\Sigma\Models\Anag;
use Modules\Sigma\Models\Asz00f;
use Modules\Sigma\Models\Asz00k1;
use Modules\Sigma\Models\Qua00f;
use Modules\Sigma\Models\Qua03f;
use Modules\Sigma\Models\Rep00f;
use Modules\Sigma\Models\Sto00f;
use Modules\Sigma\Models\Wstr01lx;

trait EnteMatrRelationship
{
    public function wstr01lx(): HasMany
    {
        return $this->hasMany(Wstr01lx::class, 'wtmatr', 'matr')
            ->where('enteap', $this->ente)
            ->whereRaw('wtannu=""');
    }

    public function wstr01lxYear(): HasMany
    {
        return $this->wstr01lx()
            ->whereRaw('year(wtdata)="'.$this->anno.'"');
    }

    public function anag(): HasOne
    {
        return $this->hasOne(Anag::class, 'matr', 'matr')
            ->where('ente', $this->ente);
    }

    public function ana02f(): HasMany
    {
        return $this->hasMany(Ana02f::class, 'matr', 'matr')
            ->where('ente', $this->ente)
            ->whereRaw("anaann = '' ");
    }

    public function ana10f(): HasOne
    {
        return $this->hasOne(Ana10f::class, 'matr', 'matr')
            ->where('ente', $this->ente);
    }

    public function qua00f(): HasMany
    {
        return $this->hasMany(Qua00f::class, 'matr', 'matr')
            ->where('ente', $this->ente)
            ->whereRaw('quaann=""');
    }

    public function rep00f(): HasMany
    {
        return $this->hasMany(Rep00f::class, 'matr', 'matr')
            ->where('ente', $this->ente)
            ->whereRaw("repann = '' ");
        // ->whereNotNull('repann')
    }

    public function sto00f(): HasMany
    {
        return $this->hasMany(Sto00f::class, 'matr', 'matr')
            ->where('ente', $this->ente)
            ->whereRaw("stann = '' ");
    }

    public function qua03f(): HasMany
    {
        return $this->hasMany(Qua03f::class, 'matr', 'matr')
            ->where('ente', $this->ente)
            ->whereRaw("q3ann = '' ");
    }

    public function asz00f(): HasMany
    {
        return $this->hasMany(Asz00f::class, 'matr', 'matr')
            ->where('ente', $this->ente)
            ->whereRaw("aszann = '' ");
    }

    public function asz00k1(): HasMany
    {
        $table = (new Asz00k1)->getTable();

        return $this->hasMany(Asz00k1::class, 'matr', 'matr')
            ->where($table.'.ente', $this->ente)
            ->whereRaw($table.".aszann = '' ");
    }
}
