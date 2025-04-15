<?php

declare(strict_types=1);

namespace Modules\Sigma\Models;

use Illuminate\Database\Eloquent\Builder;

/**
 * Modules\Sigma\Models\Wstr02l1.
 *
 * @property int $id
 * @property string|null $w2annu
 * @property string|null $enteap
 * @property string|null $stdata
 * @property string|null $ortobb
 * @property string|null $w2matr
 * @property string|null $w2orar
 * @property string|null $w2odat
 * @property string|null $w2turn
 * @property string|null $w2tdat
 * @property string|null $w2chiu
 * @property string|null $w2moda
 * @property string|null $w2modp
 * @property string|null $w2quad
 * @property string|null $w2sogl
 * @property string|null $w2sogd
 * @property string|null $w2vent
 * @property string|null $w2vesc
 * @property string|null $w2tent
 * @property string|null $w2tesc
 * @property string|null $w2pesg
 * @property string|null $w2mint
 * @property string|null $w2minp
 * @property string|null $w2stab
 * @property string|null $w2repa
 * @property string|null $w2pers
 * @property string|null $w2aper
 * @property string|null $w2anom
 * @property string|null $w2orae
 * @property string|null $w2orau
 * @property string|null $w2svil
 * @property string|null $w2teef
 * @property string|null $w2minf
 * @property string|null $w2aste
 * @property string|null $w2gipe
 * @property string|null $w2calc
 * @property string|null $w2corr
 * @property string|null $w2flg1
 * @property string|null $w2flg2
 * @property string|null $w2flg3
 * @property string|null $w2flg4
 * @property string|null $w2tora
 * @property string|null $w2ttur
 * @property string|null $w2tfes
 * @property string|null $w2ruol
 * @property string|null $w2prof
 * @property string|null $w2posi
 * @property string|null $w2rapp
 * @property string|null $w2cont
 * @property string|null $w2paui
 * @property string|null $w2pauf
 * @property string|null $w2paum
 * @property string|null $w2paus
 * @property string|null $w2ince
 * @property string|null $w2incc
 * @property string|null $w2com1
 * @property string|null $w2com2
 * @property string|null $w2com3
 *
 * @method static Builder|Wstr02l1 newModelQuery()
 * @method static Builder|Wstr02l1 newQuery()
 * @method static Builder|Wstr02l1 query()
 * @method static Builder|Wstr02l1 whereEnteap($value)
 * @method static Builder|Wstr02l1 whereId($value)
 * @method static Builder|Wstr02l1 whereOrtobb($value)
 * @method static Builder|Wstr02l1 whereStdata($value)
 * @method static Builder|Wstr02l1 whereW2annu($value)
 * @method static Builder|Wstr02l1 whereW2anom($value)
 * @method static Builder|Wstr02l1 whereW2aper($value)
 * @method static Builder|Wstr02l1 whereW2aste($value)
 * @method static Builder|Wstr02l1 whereW2calc($value)
 * @method static Builder|Wstr02l1 whereW2chiu($value)
 * @method static Builder|Wstr02l1 whereW2com1($value)
 * @method static Builder|Wstr02l1 whereW2com2($value)
 * @method static Builder|Wstr02l1 whereW2com3($value)
 * @method static Builder|Wstr02l1 whereW2cont($value)
 * @method static Builder|Wstr02l1 whereW2corr($value)
 * @method static Builder|Wstr02l1 whereW2flg1($value)
 * @method static Builder|Wstr02l1 whereW2flg2($value)
 * @method static Builder|Wstr02l1 whereW2flg3($value)
 * @method static Builder|Wstr02l1 whereW2flg4($value)
 * @method static Builder|Wstr02l1 whereW2gipe($value)
 * @method static Builder|Wstr02l1 whereW2incc($value)
 * @method static Builder|Wstr02l1 whereW2ince($value)
 * @method static Builder|Wstr02l1 whereW2matr($value)
 * @method static Builder|Wstr02l1 whereW2minf($value)
 * @method static Builder|Wstr02l1 whereW2minp($value)
 * @method static Builder|Wstr02l1 whereW2mint($value)
 * @method static Builder|Wstr02l1 whereW2moda($value)
 * @method static Builder|Wstr02l1 whereW2modp($value)
 * @method static Builder|Wstr02l1 whereW2odat($value)
 * @method static Builder|Wstr02l1 whereW2orae($value)
 * @method static Builder|Wstr02l1 whereW2orar($value)
 * @method static Builder|Wstr02l1 whereW2orau($value)
 * @method static Builder|Wstr02l1 whereW2pauf($value)
 * @method static Builder|Wstr02l1 whereW2paui($value)
 * @method static Builder|Wstr02l1 whereW2paum($value)
 * @method static Builder|Wstr02l1 whereW2paus($value)
 * @method static Builder|Wstr02l1 whereW2pers($value)
 * @method static Builder|Wstr02l1 whereW2pesg($value)
 * @method static Builder|Wstr02l1 whereW2posi($value)
 * @method static Builder|Wstr02l1 whereW2prof($value)
 * @method static Builder|Wstr02l1 whereW2quad($value)
 * @method static Builder|Wstr02l1 whereW2rapp($value)
 * @method static Builder|Wstr02l1 whereW2repa($value)
 * @method static Builder|Wstr02l1 whereW2ruol($value)
 * @method static Builder|Wstr02l1 whereW2sogd($value)
 * @method static Builder|Wstr02l1 whereW2sogl($value)
 * @method static Builder|Wstr02l1 whereW2stab($value)
 * @method static Builder|Wstr02l1 whereW2svil($value)
 * @method static Builder|Wstr02l1 whereW2tdat($value)
 * @method static Builder|Wstr02l1 whereW2teef($value)
 * @method static Builder|Wstr02l1 whereW2tent($value)
 * @method static Builder|Wstr02l1 whereW2tesc($value)
 * @method static Builder|Wstr02l1 whereW2tfes($value)
 * @method static Builder|Wstr02l1 whereW2tora($value)
 * @method static Builder|Wstr02l1 whereW2ttur($value)
 * @method static Builder|Wstr02l1 whereW2turn($value)
 * @method static Builder|Wstr02l1 whereW2vent($value)
 * @method static Builder|Wstr02l1 whereW2vesc($value)
 *
 * @mixin \Eloquent
 */
class Wstr02l1 extends BaseModel
{
    protected $table = 'wstr02l1';
}
