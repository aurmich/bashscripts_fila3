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
            ->whereBetween('asz2kd', [$date_min, $date_max])
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
            ->whereBetween('asz2kd', [$date_min, $date_max])
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

    public function getTotalePunteggio(): ?float
    {
        if ($this->getKey() == null) {
            return null;
        }

        
        $value = 0;
        $criteri_valutazione=$this->criteriValutazione->where('post_type',$this->type);
        $tmp=[];
        foreach ($criteri_valutazione as $v) {
            $val = $this->{$v->nome};
            $peso = $this->getPeso((string) $v->nome);

            $value += $val * $peso / 4;
            $tmp[]=[
                'nome'=>$v->nome,
                'val'=>$val,
                'peso'=>$peso,
                'value'=>$value,
            ];
        }
        dddx($value);
        

        return $value;
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
        $criteri_valutazione=$this->criteriValutazione->where('post_type',$this->type);
        $tmp=[];
        foreach ($criteri_valutazione as $v) {
            $val = $this->{$v->nome};
            $peso = $this->getPeso((string) $v->nome);

            $value += $val * $peso / 4;
            $tmp[]=[
                'nome'=>$v->nome,
                'val'=>$val,
                'peso'=>$peso,
                'value'=>$value,
            ];
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
                foreach ($criteri_valutazione as $v) {
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

     public function getGgPresenzaAnnoAttribute(?int $value): ?int
    {
        if ($value !== null && ! request()->input('refresh', false)) {
            return $value;
        }

       
        $anno = $this->anno;
        $dal = $anno * 10000 + 101;
        $al = $anno * 10000 + 1231;
        $parz = [
            'date_min' => $dal,
            'date_max' => $al,
        ];
        $anag = $this->anag;
        if ($anag === null) {
            return null;
        }

        $value = $anag->ggInSedeTot($parz);
        $this->gg_presenza_anno = $value;
        $this->save();

        return $value;
    }

    public function getGgAssenzaAnnoAttribute(?int $value): ?int 
    {
        if ($value !== null && ! request()->input('refresh', 0)) {
            return $value;
        }
        if ($this->matr == null) {
            return null;
        }
        if ($this->qua2kd == null) {
            return null;
        }

        // dddx($this->anno);
        // dddx($this->criteriEsclusione->pluck('value', 'name')['data_presenza_al']);
        // $data_presenza_al = ($this->criteriEsclusione->data_presenza_al);
        // $anno = $data_presenza_al->year;
        $anno = $this->anno;
        $dal = $anno * 10000 + 101;
        $al = $anno * 10000 + 1231;
        $value = $this->anag?->ggAssenzaInSedeTot(
            [
                'date_min' => $dal,
                'date_max' => $al,
            ]
        );
        $this->gg_assenza_anno = $value;
        $this->save();

        return $value;
    }

    public function getTypeAttribute(?string $value): ?string
    {
         if ($value !== null && ! request()->input('refresh', 0)) {
            return $value;
            //$value=null; // per forzare il refresh
        }
       
        if($value==null && $this->isRegionale()){
            $value = 'regionale';
        }
        
        if($value==null && $this->isDirigente()){
            
            $value = 'dirigente';
        }
        if($value==null && $this->isPo()){
            $value = 'po';
        }
        if($value==null){
            $value = 'dip';
        }
        $this->type = $value;
        $this->save();

        return $value;
        
    }

}
