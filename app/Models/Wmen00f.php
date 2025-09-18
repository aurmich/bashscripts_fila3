<?php

declare(strict_types=1);

namespace Modules\Sigma\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use stdClass;

/**
 * Modules\Sigma\Models\Wmen00f.
 *
 * @property int $id
 * @property int $enteap
 * @property string $mnannu
 * @property int $mnbadg
 * @property int $mnmatr
 * @property string $mncogn
 * @property string $mnnome
 * @property int $mncaus
 * @property int $mnp1
 * @property int $mnp2
 * @property int $mnp3
 * @property int $mnp4
 * @property mixed $mndata
 * @property mixed $mnorat
 * @property string $mnflg1
 * @property string $mnflg2
 * @property int $mnflg3
 * @property string $mnflg4
 * @property int $mntmen
 * @property string $mncom2
 * @property int $mncom3
 * @property string $ixterm
 * @property-read mixed $durata
 * @property-read float $durata_giornata
 * @property-read float $durata_pomeriggio
 * @property-read mixed $mensa_end
 * @property-read mixed $mensa_start
 * @property-read mixed $pause
 * @property-read bool $valida
 * @property-read Collection<int, \Modules\Sigma\Models\Wstr01lx> $wstr01lx
 * @property-read int|null $wstr01lx_count
 * @property-read Collection<int, \Modules\Sigma\Models\Wstr02f> $wstr02f
 * @property-read int|null $wstr02f_count
 *
 * @method static Builder|Wmen00f newModelQuery()
 * @method static Builder|Wmen00f newQuery()
 * @method static Builder|Wmen00f query()
 * @method static Builder|Wmen00f whereEnteap($value)
 * @method static Builder|Wmen00f whereId($value)
 * @method static Builder|Wmen00f whereIxterm($value)
 * @method static Builder|Wmen00f whereMnannu($value)
 * @method static Builder|Wmen00f whereMnbadg($value)
 * @method static Builder|Wmen00f whereMncaus($value)
 * @method static Builder|Wmen00f whereMncogn($value)
 * @method static Builder|Wmen00f whereMncom2($value)
 * @method static Builder|Wmen00f whereMncom3($value)
 * @method static Builder|Wmen00f whereMndata($value)
 * @method static Builder|Wmen00f whereMnflg1($value)
 * @method static Builder|Wmen00f whereMnflg2($value)
 * @method static Builder|Wmen00f whereMnflg3($value)
 * @method static Builder|Wmen00f whereMnflg4($value)
 * @method static Builder|Wmen00f whereMnmatr($value)
 * @method static Builder|Wmen00f whereMnnome($value)
 * @method static Builder|Wmen00f whereMnorat($value)
 * @method static Builder|Wmen00f whereMnp1($value)
 * @method static Builder|Wmen00f whereMnp2($value)
 * @method static Builder|Wmen00f whereMnp3($value)
 * @method static Builder|Wmen00f whereMnp4($value)
 * @method static Builder|Wmen00f whereMntmen($value)
 *
 * @mixin \Eloquent
 */
class Wmen00f extends Model
{
    protected $fillable = ['id', 'enteap', 'mnannu', 'mnbadg', 'mnmatr', 'mncogn', 'mnnome', 'mncaus', 'mnp1', 'mnp2', 'mnp3', 'mnp4', 'mndata', 'mnorat', 'mnflg1', 'mnflg2', 'mnflg3', 'mnflg4', 'mntmen', 'mncom2', 'mncom3', 'ixterm'];

    protected $connection = 'generale';

    // this will use the specified database connection
    protected $table = 'wmen00f';

    public $timestamps = false;

    public function casts(): array
    {
        return [
            'mndata' => 'datetime',
        ];
    }

    // ----------relationship--------
    public function wstr01lx(): HasMany
    {
        $rows = $this->hasMany(Wstr01lx::class, 'wtmatr', 'mnmatr')
            ->whereRaw('wtannu=""')
            ->where('enteap', $this->enteap)
            ->where('wtdata', $this->mndata->format('Ymd'));

        return $rows;
    }

    public function wstr02f(): HasMany
    {
        $rows = $this->hasMany(Wstr02f::class, 'w2matr', 'mnmatr')
            ->whereRaw('w2annu=""')
            ->where('enteap', $this->enteap)
            ->where('stdata', $this->mndata->format('Ymd'));

        return $rows;
    }

    // ----------mutators------------
    /**
     * Undocumented function.
     *
     *
     * @return Carbon
     */
    public function getMndataAttribute(string|Carbon $value)
    {
        // if (! \is_object($value)) {
        if (is_string($value)) {
            return Carbon::parse($value);
        }

        return $value;
    }

    /**
     * Undocumented function.
     *
     *
     * @return Carbon
     */
    public function getMnoratAttribute(Carbon|string $value)
    {
        // $pos=strpos($value,':');
        // if($pos===false){
        // if (! \is_object($value)) {
        if (is_string($value)) {
            $value = substr((string) $value, 0, -2).':'.substr((string) $value, -2);
            $value = Carbon::parse($this->attributes['mndata'].' '.$value);
        }

        return $value;
    }

    /**
     * Undocumented function.
     *
     *
     * @return mixed
     */
    public function getMensaStartAttribute(mixed $value)
    {
        $wstr01lx = $this->wstr01lx;
        $start = $wstr01lx->where('wtorat', '<', $this->mnorat)
            ->sortByDesc('wtorat')
            ->first();
        if (\is_object($start)) {
            // 141    Access to an undefined property Illuminate\Database\Eloquent\Model::$wtorat
            // return $start->wtorat;

            return $start->getAttributeValue('wtorat');
        }

        return $start;
    }

    /**
     * Undocumented function.
     *
     *
     * @return mixed
     */
    public function getMensaEndAttribute(mixed $value)
    {
        $wstr01lx = $this->wstr01lx;
        $start = $wstr01lx->where('wtorat', '>', $this->mnorat)
            ->sortBy('wtorat')
            ->first();
        if (\is_object($start)) {
            // 141    Access to an undefined property Illuminate\Database\Eloquent\Model::$wtorat
            // return $start->wtorat;
            return $start->getAttributeValue('wtorat');
        }

        return $start;
    }

    /**
     * Undocumented function.
     *
     *
     * @return mixed
     */
    public function getDurataAttribute(mixed $value)
    {
        $start = $this->mensa_start;
        $end = $this->mensa_end;
        if ($start === null) {
            return 0;
        }

        if ($end === null) {
            return 0;
        }

        return $end->diffInMinutes($start);
    }

    /**
     * Undocumented function.
     *
     *
     * @return mixed
     */
    public function getPauseAttribute(mixed $value)
    {
        $timbr = $this->wstr01lx->toArray();
        $n = \count($timbr);
        $pause = [];
        for ($i = 0; $i < $n - 1; $i++) {
            $curr = $timbr[$i];
            $succ = $timbr[$i + 1];
            if ($curr['wtsens'] === 2) {
                $tmp = new stdClass;
                $tmp->time_start = Carbon::parse($curr['wtorat']);
                $tmp->time_end = Carbon::parse($succ['wtorat']);
                $tmp->durata = $tmp->time_end->diffInMinutes($tmp->time_start);
                $pause[] = $tmp;
            }
        }

        return collect($pause);
    }

    // end function

    public function getDurataGiornataAttribute(?float $value): float
    {
        $timbr = $this->wstr01lx;
        $sens1 = $timbr->where('wtsens', 1)
            ->pluck('wtorat');
        $sens2 = $timbr->where('wtsens', 2)
            ->pluck('wtorat');
        $durata = 0;
        $n = min($sens1->count(), $sens2->count());
        for ($i = 0; $i < $n; $i++) {
            $durata += $sens2[$i]->diffInMinutes($sens1[$i]);
        }

        return $durata;
    }

    public function getDurataPomeriggioAttribute(?float $value): float
    {
        $pause = $this->pause;
        $pausa30 = $pause->where('durata', '>=', 25)
            ->first();
        if ($pausa30 === null) {
            return 0;
        }

        $timbr = $this->wstr01lx->where('wtorat', '>=', $pausa30->time_end);
        $sens1 = $timbr->where('wtsens', 1)
            ->pluck('wtorat');
        $sens2 = $timbr->where('wtsens', 2)
            ->pluck('wtorat');
        $durata = 0;
        $n = min($sens1->count(), $sens2->count());
        for ($i = 0; $i < $n; $i++) {
            $durata += $sens2[$i]->diffInMinutes($sens1[$i]);
        }

        return $durata;
    }

    public function getValidaAttribute(?bool $value): bool
    {
        $durata_giornata = 7 * 60 + 10;
        $durata_pomeriggio = 90;
        $motivo = '';
        if ($this->durata < 25) {
            $motivo .= ', pausa mensa < 25 ';
        }

        if ($this->durata_giornata < $durata_giornata) {
            $motivo .= ', durata giornata < '.floor($durata_giornata / 60).':'.($durata_giornata % 60);
        }

        if ($this->durata_pomeriggio < $durata_pomeriggio) {
            $motivo .= ', durata pomeriggio < '.floor($durata_pomeriggio / 60).':'.($durata_pomeriggio % 60);
        }

        // 259    Access to an undefined property Modules\Sigma\Models\Wmen00f::$motivo.
        // $this->motivo = $motivo;
        return $motivo === '';
    }

    // */
}// end class
