<?php

declare(strict_types=1);

namespace Modules\Sigma\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

// ----------traits ---
/**
 * Modules\Sigma\Models\Dipt00f.
 *
 * @property int $id
 * @property int $enteap
 * @property string $dtannu
 * @property int $dtmatr
 * @property string $dtturn
 * @property int $dtdal
 * @property int $dtal
 * @property string $dtcom1
 * @property string $dtcom2
 * @property int $dtcom3
 * @property int $dtcom4
 * @property-read mixed $assunzione
 * @property-read string|null $cognome
 * @property-read mixed $dimissione
 * @property-read mixed $ente
 * @property-read mixed $matr
 * @property-read string|null $nome
 * @property-read mixed $oree
 * @property-read mixed $oret
 * @property-read mixed $turno_txt
 * @property-read Collection<int, \Modules\Sigma\Models\Qua00f> $qua00f
 * @property-read int|null $qua00f_count
 * @property-read Collection<int, \Modules\Sigma\Models\Turn01l1> $turn01l1
 * @property-read int|null $turn01l1_count
 *
 * @method static Builder|Dipt00f newModelQuery()
 * @method static Builder|Dipt00f newQuery()
 * @method static Builder|Dipt00f query()
 * @method static Builder|Dipt00f whereDtal($value)
 * @method static Builder|Dipt00f whereDtannu($value)
 * @method static Builder|Dipt00f whereDtcom1($value)
 * @method static Builder|Dipt00f whereDtcom2($value)
 * @method static Builder|Dipt00f whereDtcom3($value)
 * @method static Builder|Dipt00f whereDtcom4($value)
 * @method static Builder|Dipt00f whereDtdal($value)
 * @method static Builder|Dipt00f whereDtmatr($value)
 * @method static Builder|Dipt00f whereDtturn($value)
 * @method static Builder|Dipt00f whereEnteap($value)
 * @method static Builder|Dipt00f whereId($value)
 *
 * @mixin \Eloquent
 */
class Dipt00f extends Model
{
    protected $fillable = ['id', 'enteap', 'dtannu', 'dtmatr', 'dtturn', 'dtdal', 'dtal', 'dtcom1', 'dtcom2', 'dtcom3', 'dtcom4'];

    protected $connection = 'generale';

    // this will use the specified database connection
    protected $table = 'dipt00f';

    public $timestamps = false;

    // -------relationship----
    /*
    public function anag():HasOne {
        return $this->hasOne(Anag::class, 'matr', 'dtmatr')->where('ente', $this->enteap);
    }
    */
    public function turn01l1(): HasMany
    {
        return $this->hasMany(Turn01l1::class, 't1codi', 'dtturn')->where('enteap', $this->enteap);
    }

    public function qua00f()
    {
        $qua00f = $this->hasMany(Qua00f::class, 'matr', 'dtmatr')->where('ente', $this->enteap)->whereRaw('quaann=""');
        if (property_exists($this, 'data_elab') && $this->data_elab !== null) {
            $sql = '(
			('.$this->data_elab->format('Ymd').' between qua2kd and qua2ka)
			or
			('.$this->data_elab->format('Ymd').' >= qua2kd and qua2ka=0)
			)';
            $qua00f = $qua00f->whereRaw($sql);
        }

        return $qua00f;
    }

    // ------ mutators ------
    public function getEnteAttribute($value)
    {
        return $this->enteap;
    }

    public function getMatrAttribute($value)
    {
        return $this->dtmatr;
    }

    public function getCognomeAttribute(?string $value): ?string
    {
        if ($this->anag === null) {
            return '----';
        }

        return $this->anag->cognome;
    }

    public function getNomeAttribute(?string $value): ?string
    {
        if ($this->anag === null) {
            return '----';
        }

        return $this->anag->nome;
    }

    public function getTurnoTxtAttribute($value)
    {
        $turn01l1 = $this->turn01l1()->orderBy('t1dal', 'desc')->first();
        if ($turn01l1 === null) {
            return null;
        }

        return $turn01l1->t1desc;
        /*
        $sql='update '.$tablename.' set turno_txt=(select t1desc from generale.turn01l1
        where turn01l1.t1codi='.$tablename.'.turno order by t1dal desc limit 1)
    ';*/
    }

    public function getOreeAttribute($value)
    {
        $qua00f = $this->qua00f()->first();
        if ($qua00f === null) {
            // echo '<br/>'.$this->matr;
            // echo '<pre>';print_r($this->qua00f()->whereRaw($sql)->toSql());echo '</pre>';
            return '---';
        }

        return $qua00f->oree;
    }

    public function getOretAttribute($value)
    {
        $qua00f = $this->qua00f()->first();
        if ($qua00f === null) {
            // echo '<pre>';print_r($this->qua00f()->whereRaw($sql)->toSql());echo '</pre>';
            return '---';
        }

        return $qua00f->oret;
    }

    public function getAssunzioneAttribute($value)
    {
        if ($this->anag === null) {
            return '---';
        }

        $sto00f = $this->anag->sto00f()->orderBy('st2kas', 'desc')->first();
        if ($sto00f === null) {
            echo '<br/>ente: '.$this->ente;
            echo '<br/>matr: '.$this->matr;
            echo '<br/>cognome: '.$this->cognome;
            echo '<br/>nome: '.$this->nome;
            echo '<br/>NON TROVO LO STORICO tabella sto00f';

            exit('['.__LINE__.']['.__FILE__.']');
        }

        return $sto00f->st2kas;
    }

    public function getDimissioneAttribute($value)
    {
        if ($this->anag === null) {
            return '---';
        }

        $sto00f = $this->anag->sto00f()->orderBy('st2kas', 'desc')->first();
        if ($sto00f === null) {
            exit('['.__LINE__.']['.__FILE__.']');
        }

        return $sto00f->st2kdi;
    }
}
