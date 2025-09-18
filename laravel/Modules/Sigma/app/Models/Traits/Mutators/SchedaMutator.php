<?php

declare(strict_types=1);

namespace Modules\Sigma\Models\Traits\Mutators;

use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\Schema;
use Modules\Sigma\Models\Codici;
use Modules\Xot\Services\ModelService;

trait SchedaMutator
{
    public function getCodquaAttribute($value)
    {
        if ($value !== null) {
            return $value;
        }

        $fieldname = 'codqua';

        if ($this->qua2kd === '') {
            return null;
        }

        $qua00f = $this->qua00f->where('qua2kd', $this->qua2kd)->first();
        /*
        }else{
            $qua00f = $this->qua00f()->ofYear($this->anno);
            if($qua00f->count()!=1){
                dddx('Matricola non trovata nella tabella qua00f aggiornare');
            }
            $qua00f=$qua00f->first();
            $this->qua2kd=$qua00f->qua2kd;
            $this->qua2ka=$qua00f->qua2ka;
            $this->save();
        }
        */
        if (! \is_object($qua00f)) {
            $msg = [
                'qua2kd' => $this->qua2kd,
                'dal' => $this->dal,
            ];

            // dddx($msg);
            return null;
        }

        $value = $qua00f->$fieldname;
        if (\in_array($fieldname, $this->getFillable(), false)) {
            $this->$fieldname = $value;
            $this->cont = $qua00f->cont;
            $this->tipco = $qua00f->tipco;
            $this->save();
        } else {
            // dddx(get_class($this)); //4 debug
        }

        return $value;
    }

    public function getContAttribute($value)
    {
        if ($value !== null) {
            return $value;
        }

        $fieldname = 'cont';
        if ($this->qua2kd === '') {
            return null;
            /*
            $qua00f = $this->qua00f()->ofYear($this->anno);
            if($qua00f->count()!=1){
                dddx('Matricola non trovata nella tabella qua00f aggiornare');
            }
            $qua00f=$qua00f->first();
            $this->qua2kd=$qua00f->qua2kd;
            $this->qua2ka=$qua00f->qua2ka;
            $this->save();
            */
        }

        $qua00f = $this->qua00f->where('qua2kd', $this->qua2kd)->first();
        if (! \is_object($qua00f)) {
            return null;
        }

        $value = $qua00f->$fieldname;
        if (\in_array($fieldname, $this->getFillable(), false)) {
            $this->$fieldname = $value;
            $this->save();
        }

        return $value;
    }

    public function getTipcoAttribute($value)
    {
        if ($value !== null) {
            return $value;
        }

        $fieldname = 'tipco';
        $qua00f = $this->qua00f->where('qua2kd', $this->qua2kd)->first();
        if (! \is_object($qua00f)) {
            return null;
        }

        $value = $qua00f->$fieldname;
        if (\in_array($fieldname, $this->getFillable(), false)) {
            $this->$fieldname = $value;
            $this->save();
        }

        return $value;
    }

    public function getPosizioneEcoAttribute(?string $value): ?string
    {
        if ($value !== null && ! request('refresh', false)) {
            return $value;
        }

        $fieldname = 'posizione_eco';
        $tqu00f = $this->tqu00f;
        if (! \is_object($tqu00f)) {
            /*
            if($this->propro==''){
                $qua00f = $this->qua00f->where('qua2kd', $this->qua2kd)->first();
                $this->qua2kd=$qua00f->qua2kd;
                $this->qua2ka=$qua00f->qua2ka;
                $this->propro=$qua00f->propro;
                $this->posfun=$qua00f->posfun;
                $this->tipco=$qua00f->tipco;
                $this->cont=$qua00f->cont;
                $this->codqua=$qua00f->codqua;
                $this->save();
            }
            */
            echo 'propro:['.$this->propro.'] posfun:['.$this->posfun.'] tipco:['.$this->tipco.'] cont:['.$this->cont.'] codqua: ['.$this->codqua.']';

            return null; // 'propro:['.$this->propro.'] posfun:['.$this->posfun.'] tipco:['.$this->tipco.'] cont:['.$this->cont.'] codqua: ['.$this->codqua.']';
        }

        $value = str_replace('Posizione economica', '', (string) $tqu00f->desc1);
        $value .= ' ('.$tqu00f->desc2.')';
        /*
        if (in_array($fieldname, $this->getFillable())) {
            $this->$fieldname = $value;
            $this->save();
        }
        */
        try {
            $this->$fieldname = $value;
            $this->save();
        } catch (Exception) {
            ModelService::make()->setModel($this)->addField($fieldname, 'string');
        }

        return $value;
    }

    public function getPercParttimepondAnnoAttribute(?float $value): ?float
    {
        // *
        if ($value !== null) {
            return $value;
        }

        // */
        $value = 0;
        if ($this->gg_presenza_anno !== 0) {
            $value = $this->perc_parttime_anno * (1 - ($this->gg_parttimevert_anno / $this->gg_presenza_anno));
        }

        // $value = number_format($value, 3);
        $this->perc_parttimepond_anno = $value;
        $this->save();

        return (float) $value;
    }

    public function getPercParttimepondDalalAttribute($value)
    {
        // *
        if ($value !== null) {
            return $value;
        }

        // */
        $value = 0;
        if ($this->gg_presenza_dalal !== 0) {
            $value = $this->perc_parttime_dalal * (1 - ($this->gg_parttimevert_dalal / $this->gg_presenza_dalal));
        }

        // $value = number_format($value, 3);
        $this->perc_parttimepond_dalal = $value;
        $this->save();

        return $value;
    }

    public function getDisci1TxtAttribute(?string $value): ?string
    {
        if ($value !== null) {
            return $value;
        }
        if ($this->disci1 == null) {
            return null;
        }

        $row = Codici::where('tipo', 6)
            ->where('codice', $this->disci1)
            ->first();
        if (! \is_object($row)) {
            return null;
        }

        try {
            $this->disci1_txt = $row->desc1;
            $this->save();
        } catch (Exception) {
            $fieldname = 'disci1_txt';
            if (! Schema::connection($this->getConnectionName())->hasColumn($this->getTable(), $fieldname)) {
                Schema::connection($this->getConnectionName())->table($this->getTable(), static function ($table) use ($fieldname): void {
                    $table->string($fieldname);
                });
            }
        }

        return $this->attributes['disci1_txt'];
    }

    public function getPosizTxtAttribute(?string $value): ?string
    {
        if ($value !== null) {
            return $value;
        }
        if ($this->posiz == null) {
            return null;
        }

        $row = Codici::firstWhere(['tipo' => 19, 'codice' => $this->posiz]);
        if (! \is_object($row)) {
            return null;
        }

        $this->posiz_txt = $row->desc1;
        $this->save();

        return $this->attributes['posiz_txt'];
    }

    public function getDisci1Attribute(?int $value): ?int
    {
        if ($value != null && ! request()->input('refresh', false)) {
            return $value;
        }
        $qua00f_curr = $this->qua00fDaterange->first();
        if (! \is_object($qua00f_curr)) {
            return null;
        }

        // Access to an undefined property Modules\Sigma\Models\Qua00f::$disci1.
        // return $qua00f_curr->disci1;
        $value = $qua00f_curr->attributes['disci1'];
        $this->update(['disci1' => $value]);

        return $value;
    }

    public function getCategoriaEcovalAttribute(?string $value): ?string
    {
        if ($value != null && ! request()->input('refresh', false)) {
            return $value;
        }
        if ($this->matr == null) {
            return null;
        }
        if ($this->propro == null) {
            return null;
        }

        $categoria_propro = $this->categoriaPropro;
        $value = $categoria_propro?->categoria;
        $this->update(['categoria_ecoval' => $value]);

        return $value;
    }

    public function getPosizAttribute(?int $value): ?int
    {
        if ($value !== null) {
            return $value;
        }

        $qua00f = $this->qua00f;
        if ($qua00f === null) {
            dddx('errore');
        }

        if ($qua00f->count() !== 1) {
            // dddx($qua00f);
            $arr = collect($qua00f)->map(static fn ($item): array => ['propro' => $item->propro, 'posfun' => $item->posfun]);
            // foreach($arr as $i){

            // }
            // dddx($arr->count());
        }

        $this->attributes['posiz'] = $qua00f->first()?->posiz;
        $this->save();

        return $this->attributes['posiz'];
    }

    public function getEtaAttribute(?float $value): ?float
    {
        /*
        if (null !== $value && $value > 0 && ! request()->input('refresh', 0)) {
            return $value;
        }
        */

        // if (! property_exists($this, 'ana02f')) {
        //    throw new \Exception('not exixst property [ana02f] on ['.get_class($this).']');
        // }
        $ana02f = $this->ana02f;
        if ($ana02f === null) {
            dddx([
                'get_class' => static::class,
                'this' => $this->toArray(),
                'ana02f' => $this->ana02f(),
            ]);
        }

        if ($ana02f->last() === null) {
            return 0;
        }

        $ana2kd = $ana02f->last()->ana2kd;

        $ana2kd_date = Carbon::createFromFormat('Ymd', $ana2kd);
        $date_max = $this->criteriOptionsArr('data_presenza_al');

        $value = $date_max?->floatDiffInYears($ana2kd_date, true);

        $this->eta = abs($value);
        $this->save();

        return $value;
    }

    /*
     public function getPosizTxtAttribute($value) {
       if (null !== $value) {
           return $value;
       }

       $row = Codici::where('tipo', 19)->where('codice', $this->posiz)->first();
       if (! \is_object($row)) {
           return null;
       }

       $this->attributes['posiz_txt'] = $row->desc1;
       $this->save();

       return $this->attributes['posiz_txt'];
    }
    */

    /* esempio trimestrale
    public function getDalAttribute($value)
    {
        if ($value != '') {
            return $value;
        }
        $value = $this->anno * 10000 + 101;
        $this->dal=$value;
        $this->save();
        return $value;
    }

    public function getAlAttribute($value)
    {
        if ($value != '') {
            return $value;
        }
        $value = $this->anno * 10000 + 1231;
        $this->al=$value;
        $this->save();
        return $value;
    }
    */

    // *

    // */
}
