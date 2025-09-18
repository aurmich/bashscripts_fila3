<?php

declare(strict_types=1);

namespace Modules\Sigma\Models\Traits\Extras;

use Modules\Sigma\Models\Anag;
use Modules\Sigma\Models\Asz00k1;
use Modules\Sigma\Models\Qua00f;
use Modules\Sigma\Models\Qua03f;
use Modules\Sigma\Models\Rep00f;
use Modules\Xot\Services\ArrayService;
use Request;
// ------- services -------
use Schema;

trait FunctionExtra
{
    public static function getCoalesceDateRange(array $params): string
    {
        extract($params);
        // @phpstan-ignore variable.undefined, variable.undefined, variable.undefined, variable.undefined, variable.undefined
        if (\is_object($date_min)) {
            $date_min = $date_min->format('Ymd');
        }
        // @phpstan-ignore variable.undefined, variable.undefined, variable.undefined, variable.undefined, variable.undefined
        if (\is_object($date_max)) {
            $date_max = $date_max->format('Ymd');
        }
        // @phpstan-ignore-next-line
        if (! isset($from_field)) {
            $from_field = self::$from_field;
        }
        // @phpstan-ignore-next-line
        if (! isset($to_field)) {
            $to_field = self::$to_field;
        }

        if (isset($date_min)) {
            $dal = 'if('.$from_field.'=0 or '.$from_field.'<'.$date_min.' ,'.$date_min.','.$from_field.')';
        } else {
            $dal = $from_field;
        }

        if (isset($date_max)) {
            $al = 'if('.$to_field.'=0 or '.$to_field.'>'.$date_max.' ,'.$date_max.','.$to_field.')';
        } else {
            $al = $from_field;
        }

        return 'COALESCE(sum(greatest(datediff('.$al.','.$dal.')+1,0)),0)';
    }

    public function ggInSedeTot(array $params): ?int
    {
        extract($params);
        if (\is_object($date_min)) {
            $date_min = $date_min->format('Ymd');
        }

        if (\is_object($date_max)) {
            $date_max = $date_max->format('Ymd');
        }

        $qua00f = $this->qua00f();

        if (isset($lista_propro)) {
            if (isset($lista_propro_sup)) {
                if (isset($posfun)) {
                    $qua00f->whereRaw('(
                        (FIND_IN_SET( propro,"'.$lista_propro.'") AND SUBSTR(posfun,-1)='.substr((string) $posfun, -1).')
                        or  FIND_IN_SET(propro,"'.$lista_propro_sup.'")
                    )');
                } else {
                    // non c'e' posfun
                    $qua00f->whereRaw('find_in_set(propro,"'.$lista_propro.','.$lista_propro_sup.'")');
                }
            } elseif (isset($posfun)) {
                // non c'e' sup ma c'e' posfun
                $qua00f->whereRaw('find_in_set(propro,"'.$lista_propro.'")');
                $qua00f->whereRaw('SUBSTR(posfun,-1)='.substr((string) $posfun, -1));
            } else {
                $qua00f->whereRaw('find_in_set(propro,"'.$lista_propro.'")');
            }
        }

        if (isset($posiz)) {
            $qua00f->where('posiz', $posiz);
        }

        if (isset($date_max)) {
            $qua00f->where('qua2kd', '<=', $date_max);
        }

        if (isset($date_min)) {
            $qua00f->whereRaw('( qua2ka >='.$date_min.' or qua2ka=0 )');
        }

        $select = Qua00f::getCoalesceDateRange($params);
        $qua00f->selectRaw($select.' as tot');

        return (int) $qua00f->first()->tot;
        /* -- x debug
    $tot=0;
    foreach($qua00f->get() as $row){
    $dal=$row->qua2kd;
    if(isset($date_min)){
    $dal=($row->qua2kd>=$date_min)?$row->qua2kd:$date_min;
    }
    if(isset($date_max)){
    $al=($row->qua2ka>=$date_max || $row->qua2ka==0)?$date_max:$row->qua2ka;
    }
    $gg=0;
    if($dal<=$al){
    $gg=Carbon::parse($dal.'')->diffInDays($al.'',true)+1;
    }
    $tot+=$gg;
    //echo '<br/>['.$row->qua2kd.' '.$row->qua2ka.']  ['.$dal.' - '.$al.'] ['.$gg.']';
    }
    return $tot;
     */
    }

    // ---------------------------------------------------------------------------------------------
    public function ggFuoriSedeTot(array $params)
    {
        extract($params);
        if (\is_object($date_min)) {
            $date_min = $date_min->format('Ymd');
        }

        if (\is_object($date_max)) {
            $date_max = $date_max->format('Ymd');
        }

        $qua = $this->qua03f();
        if (isset($lista_propro)) {
            $qua->whereRaw('find_in_set(q3pro,"'.$lista_propro.'")');
        }

        if (isset($posfun)) {
            // if (isset($posfun) && substr($posfun, -1)!=substr($this->attributes['posfun'], -1) ) {
            $qua->whereRaw('SUBSTR(q3fun,-1)='.substr((string) $posfun, -1));
        }

        if (isset($date_max)) {
            $qua->where('q32kd', '<=', $date_max);
        }

        if (isset($date_min)) {
            $qua->where('q32ka', '>=', $date_min);
        }

        $select = Qua03f::getCoalesceDateRange($params);
        $qua->selectRaw($select.' as tot');

        return $qua->first()->tot;

        /*
    $tot=0;
    foreach($qua->get() as $row){
    $dal=$row->q32kd;
    if(isset($date_min)){
    $dal=($row->q32kd>=$date_min)?$row->q32kd:$date_min;
    }
    if(isset($date_max)){
    $al=($row->q32ka>=$date_max || $row->q32ka==0)?$date_max:$row->q32ka;
    }
    $gg=0;
    if($dal<=$al){
    $gg=Carbon::parse($dal.'')->diffInDays($al.'',true)+1;
    }
    $tot+=$gg;
    //echo '<br/>['.$row->qua2kd.' '.$row->qua2ka.']  ['.$dal.' - '.$al.'] ['.$gg.']';
    }
    return $tot;
     */
    }

    // -------------------------------------------------------------------------------
    public function ggAssenzaFuoriSedeTot(array $params): int
    {
        return 0; // da fare
    }

    public function hhAssenzaFuoriSedeTot(array $params): int
    {
        return 0; // da fare
    }

    public function hhAssenzaInSedeTot(array $params): int
    {
        extract($params);
        if (\is_object($date_min)) {
            $date_min = $date_min->format('Ymd');
        }

        if (\is_object($date_max)) {
            $date_max = $date_max->format('Ymd');
        }

        $asz = $this->asz00k1();

        if (isset($lista_propro)) {
            /*
            $asz->whereHas('qua00f', function($query) use($lista_propro) {
            $query->whereRaw('find_in_set(propro,"'.$lista_propro.'")');
            });
             */
            if (isset($posfun)) {
                $asz->ofListaProproPosfun($lista_propro, $posfun);
            } else {
                $asz->ofListaProproPosfun($lista_propro);
            }
        }

        // dddx($asz->get());

        $asz->where('aszumi', 'O');
        /*
        if(isset($posfun)){
        //if (isset($posfun) && substr($posfun, -1)!=substr($this->attributes['posfun'], -1) ) {
        $qua00f->whereRaw('SUBSTR(posfun,-1)='.substr($posfun,-1));
        }
         */
        if (isset($lista_tipo_codice)) {
            $asz->whereRaw('find_in_set(concat(asztip,"-",aszcod),"'.$lista_tipo_codice.'")');
        }

        if (isset($date_max)) {
            $asz->where('asz2kd', '<=', $date_max);
        }

        if (isset($date_min)) {
            $asz->whereRaw('( asz2ka >='.$date_min.' or asz2ka=0 )');
        }

        $select = Asz00k1::getCoalesceDateRange($params);
        $asz->selectRaw($select.' as tot');

        return (int) $asz->first()->tot;

        /*
    $tot=0;

    foreach($asz->get() as $row){
    $dal=$row->asz2kd;
    if(isset($date_min)){
    $dal=($row->asz2kd>=$date_min)?$row->asz2kd:$date_min;
    }
    if(isset($date_max)){
    $al=($row->asz2ka>=$date_max || $row->asz2ka==0)?$date_max:$row->asz2ka;
    }
    $gg=0;
    if($dal<=$al){
    $gg=Carbon::parse($dal.'')->diffInDays($al.'',true)+1;
    }
    $tot+=$gg;
    //echo '<br/>['.$row->qua2kd.' '.$row->qua2ka.']  ['.$dal.' - '.$al.'] ['.$gg.']';
    }
    return $tot;
     */
    }

    public function ggAssenzaInSedeTot(array $params): int
    {
        extract($params);
        if (\is_object($date_min)) {
            $date_min = $date_min->format('Ymd');
        }

        if (\is_object($date_max)) {
            $date_max = $date_max->format('Ymd');
        }

        $asz = $this->asz00k1();

        if (isset($lista_propro)) {
            /*
            $asz->whereHas('qua00f', function($query) use($lista_propro) {
            $query->whereRaw('find_in_set(propro,"'.$lista_propro.'")');
            });
             */
            if (isset($posfun)) {
                $asz->ofListaProproPosfun($lista_propro, $posfun);
            } else {
                $asz->ofListaProproPosfun($lista_propro);
            }
        }

        // dddx($asz->get());

        $asz->where('aszumi', 'G');
        /*
        if(isset($posfun)){
        //if (isset($posfun) && substr($posfun, -1)!=substr($this->attributes['posfun'], -1) ) {
        $qua00f->whereRaw('SUBSTR(posfun,-1)='.substr($posfun,-1));
        }
         */
        if (isset($lista_tipo_codice)) {
            $asz->whereRaw('find_in_set(concat(asztip,"-",aszcod),"'.$lista_tipo_codice.'")');
        }

        if (isset($date_max)) {
            $asz->where('asz2kd', '<=', $date_max);
        }

        if (isset($date_min)) {
            $asz->whereRaw('( asz2ka >='.$date_min.' or asz2ka=0 )');
        }

        $select = Asz00k1::getCoalesceDateRange($params);
        $asz->selectRaw($select.' as tot');

        return (int) $asz->first()->tot;

        /*
    $tot=0;

    foreach($asz->get() as $row){
    $dal=$row->asz2kd;
    if(isset($date_min)){
    $dal=($row->asz2kd>=$date_min)?$row->asz2kd:$date_min;
    }
    if(isset($date_max)){
    $al=($row->asz2ka>=$date_max || $row->asz2ka==0)?$date_max:$row->asz2ka;
    }
    $gg=0;
    if($dal<=$al){
    $gg=Carbon::parse($dal.'')->diffInDays($al.'',true)+1;
    }
    $tot+=$gg;
    //echo '<br/>['.$row->qua2kd.' '.$row->qua2ka.']  ['.$dal.' - '.$al.'] ['.$gg.']';
    }
    return $tot;
     */
    }

    // ---------------------------------------------------------------------------------------------
    public static function rep00fQua00fAnnoCollection(array $params)
    {
        extract($params);

        $rep00f_coll = Rep00f::stabiReparOfYearCollection($params)
            ->groupBy(
                static fn ($item): string => $item['ente'].'-'.$item['matr']
            );
        $qua00f_coll = Qua00f::posizioniEconomicheOfYearCollection($params)
            ->groupBy(
                static fn ($item): string => $item['ente'].'-'.$item['matr']
            );

        // $rep00f_coll
        // ($rep00f_coll->count());//422 - 424
        // dddx($qua00f_coll->count());//422 - 426
        // dddx($perf_qua_coll);
        $ris = [];
        foreach ($rep00f_coll as $k => $rep) {
            $ris[$k]['rep'] = $rep;
            $ris[$k]['qua'] = $qua00f_coll[$k];
        }

        $inizioanno = $anno * 10000 + 101;
        $fineanno = $anno * 10000 + 1231;

        // *
        foreach ($ris as $k => $v) {
            // if($v['rep']->count()!=1 || $v['qua']->count()!=1){
            foreach ($v['rep'] as &$rep) {
                $rep['rep2kd'] = (int) $rep['rep2kd'];
                $rep['rep2ka'] = (int) $rep['rep2ka'];
                $rep['dal'] = ($rep['rep2kd'] > $inizioanno) ? $rep['rep2kd'] : $inizioanno;
                $rep['al'] = ($rep['rep2ka'] < $fineanno && $rep['rep2ka'] !== 0) ? $rep['rep2ka'] : $fineanno;
                foreach ($v['qua'] as $qua) {
                    $qua['qua2kd'] = (int) $qua['qua2kd'];
                    $qua['qua2ka'] = (int) $qua['qua2ka'];
                    $qua['dal'] = ($qua['qua2kd'] > $inizioanno) ? $qua['qua2kd'] : $inizioanno;
                    $qua['al'] = ($qua['qua2ka'] < $fineanno && $qua['qua2ka'] !== 0) ? $qua['qua2ka'] : $fineanno;
                    // echo '<hr/>';
                    // echo '<pre>';print_r($rep);echo '</pre>';
                    // echo '<pre>';print_r($qua);echo '</pre>';
                    $intersect = ArrayService::rangeIntersect($rep['dal'], $rep['al'], $qua['dal'], $qua['al']);
                    // echo '<pre>';print_r($intersect);echo '</pre>';
                    if ($intersect !== false) {
                        $tmp = array_merge($rep, $qua);
                        unset($tmp['dal'], $tmp['al']);
                        // per visualizzazione per spostarli in ultima posizione
                        $tmp['dal'] = $intersect[0];
                        $tmp['al'] = $intersect[1];
                        $ris[$k]['merge'][] = $tmp;
                        //
                        // if($v['rep']->count()!=1 || $v['qua']->count()!=1){
                        // echo '<br/>Check '.$k.' ';
                        // }
                        // /
                        if ($tmp['dal'] !== $inizioanno || $tmp['al'] !== $fineanno) {
                            // echo '<pre>';print_r($tmp);echo '</pre>';
                        }
                    }
                }
            }

            if (isset($ris[$k]['merge']) && \count($ris[$k]['merge']) !== 1) {
                echo '<br/>Multi Riga '.$k.' ';
            }

            // }
        }

        // */
        /*
        $ris=collect($ris)->map(
            function($v) use($inizioanno,$fineanno){
                $rows=[];
                foreach ($v['rep'] as $rep) {
                    $rep['rep2kd']=(int)$rep['rep2kd'];
                    $rep['rep2ka']=(int)$rep['rep2ka'];
                    $rep['dal'] = ($rep['rep2kd'] > $inizioanno) ? $rep['rep2kd'] : $inizioanno;
                    $rep['dal'] =(int)$rep['dal'];
                    $rep['al'] = ($rep['rep2ka'] < $fineanno && 0 !== $rep['rep2ka']) ? $rep['rep2ka'] : $fineanno;
                    $rep['al'] =(int)$rep['al'];
                    $items=[];
                    foreach ($v['qua'] as $qua) {
                        $qua['qua2kd']=(int)$qua['qua2kd'];
                        $qua['qua2ka']=(int)$qua['qua2ka'];
                        $qua['dal'] = ($qua['qua2kd'] > $inizioanno) ? $qua['qua2kd'] : $inizioanno;
                        $qua['dal'] =(int)$qua['dal'];
                        $qua['al'] = ($qua['qua2ka'] < $fineanno && 0 !== $qua['qua2ka']) ? $qua['qua2ka'] : $fineanno;
                        $qua['al'] =(int)$qua['al'];
                        $intersect = ArrayService::rangeIntersect($rep['dal'], $rep['al'], $qua['dal'], $qua['al']);

                        //dddx([
                        //    'intersect'=>$intersect,
                        //    'rep'=>$rep['dal'].'-'.$rep['al'].'   -   '.$rep['rep2kd'].'-'.$rep['rep2ka'],
                        //    'qua'=>$qua['dal'].'-'.$qua['al'].'   -   '.$qua['qua2kd'].'-'.$qua['qua2ka'],
                        //]);

                        if (false !== $intersect) {
                            $item=array_merge($rep,$qua);
                            [$item['dal'],$item['al']]=$intersect;
                            $items[]=$item;
                        }
                    }
                    $rows[]=$items;
                }
                return $rows;
            }
        );
        */
        // dddx($ris);
        // dddx($ris['90-23539']);
        // return $ris;
        $ris2 = [];
        foreach ($ris as $ri) {
            if (isset($ri['merge'])) {
                $ris2 = array_merge_recursive($ris2, $ri['merge']);
            }
        }

        return collect($ris2);
    }

    // end function
    // ---------------------------------------------------------------------------------------------------------
    public static function updateFieldQuaRepForm(array $params): void
    {
        if (! isset($params['ente'])) {
            $params['ente'] = 90;
        }

        echo '<h3>Anno: '.$params['anno'].'</h3>';

        extract($params);
        $called_class = static::class;
        $self = new $called_class;
        echo '<h3>'.$called_class.'</h3>';
        $count = $self->where('anno', $anno)->count();
        echo '<h3>'.$count.'</h3>';

        // $this->fixRep($params);
        // $this->fixQua($params);
        $rows_coll = Anag::rep00fQua00fAnnoCollection($params);

        $fields = array_keys($rows_coll->first());
        echo '<pre>'.implode(', ', $fields).'</pre>';
        $perf = self::where('anno', $anno)
            // ->select($fields)
            ->get();

        /**
         * se trasformo in array, mi va a prendere tutti i mutators.
         */
        // $perf_coll = collect($perf->toArray())->map(
        $perf_coll = $perf->map(
            static function (array $item) use ($fields): array {
                $tmp = [];
                foreach ($fields as $field) {
                    $tmp[$field] = $item[$field];
                }

                return $tmp;
                /* return collect($item)->only($fields)->all(); */
            }
        );
        // dddx($perf_coll);

        // Cannot instantiate abstract class Modules\Performance\Models\BaseIndividualeModel
        // dddx(['get_called_class'=>get_called_class(),
        //    'self'=>new self(),
        //    ]);
        // *

        $results = ArrayService::diff_assoc_recursive($rows_coll->all(), $perf_coll->all());
        /*
        dddx([
            'results'=>$results,
            'A'=>$rows_coll->first(),
            'B'=>$perf_coll->first(),
            //'T'=>$rows_coll->diffAssoc($perf_coll->all()),
        ]);
        //*/
        echo '<h3> Fix Add :'.\count($results).'</h3>';

        echo '<pre>';
        print_r($results);

        echo '</pre>';

        foreach ($results as $v) {
            // ------- CREATE SOLO A MANO NON LAVATRICE PER OVII MOTIVI
            // SE DB SIGMA NO AGGIORNATO BAGNO DI SANGUE

            if (isset($create_force) && $create_force === '1') {
                // echo '<h3>FORCE</h3>';
                // $self = new self();
                $called_class = static::class;
                $self = new $called_class;
                $fillable = $self->getFillable();
                $diff = collect(array_keys($v))->diff($fillable);
                if ($diff->count() > 0) {
                    dddx(
                        [
                            'message' => 'mancano campi nei fillable',
                            'class' => $self::class,
                            'fillable mancanti' => $diff,
                        ]
                    );
                }

                /*
                dddx([
                    'fill'=>$fillable,
                    'class'=>get_class($test),
                    'v'=>$v,
                    'test'=>$test,
                    ]);
                */
                $test = self::updateOrCreate($v);
                // dddx(['test'=>$test,'v'=>$v,'test_array'=>$test->toArray()]);
            }

            $i_row = $rows_coll->where('matr', $v['matr'])->where('dal', $v['dal'])->all();
            $i_perf = $perf_coll->where('matr', $v['matr'])->where('dal', $v['dal'])->all();
            foreach ($i_row as $i_row0) {
                foreach ($i_perf as $i_perf0) {
                    $diff = collect($i_row0)->diffAssoc($i_perf0)->all();
                    if ($diff !== []) {
                        echo '<hr/>';
                        echo '<pre>';
                        print_r($i_row0);
                        echo '</pre>';
                        echo '<pre>';
                        print_r($i_perf0);
                        echo '</pre>';
                        echo '<pre>';
                        print_r($diff);
                        echo '</pre>';
                        // dddx($v);
                        // $up = new self();
                        $up = new static;
                        foreach ($i_perf0 as $ku => $vu) {
                            $up = $up->where($ku, $vu);
                        }

                        $up->update($diff);
                    } // end if
                }
            }

            // dddx($up->get());
        }

        // */

        $results = ArrayService::diff_assoc_recursive($perf_coll->all(), $rows_coll->all());
        echo '<h3> Fix Sub :'.\count($results).'</h3>';
        echo '<pre>';
        print_r($results);
        echo '</pre>';
        foreach ($results as $v) {
            // ------- DELETE SOLO A MANO NON LAVATRICE PER OVII MOTIVI
            // SE DB SIGMA NO AGGIORNATO BAGNO DI SANGUE
            if (isset($delete_force) && $delete_force === '1') {
                $test = self::where($v)->limit(1)->delete();
            }

            $i_row = $rows_coll->where('matr', $v['matr'])->where('dal', $v['dal'])->all();
            $i_perf = $perf_coll->where('matr', $v['matr'])->where('dal', $v['dal'])->all();
            foreach ($i_row as $i_row0) {
                foreach ($i_perf as $i_perf0) {
                    $diff = collect($i_row0)->diffAssoc($i_perf0)->all();
                    if ($diff !== []) {
                        echo '<hr/>';
                        echo '<pre>';
                        print_r($i_row0);
                        echo '</pre>';
                        echo '<pre>';
                        print_r($i_perf0);
                        echo '</pre>';
                        echo '<pre>';
                        print_r($diff);
                        echo '</pre>';
                        // dddx($v);
                        /*
                    $up=new self;
                    foreach($i_perf0 as $ku => $vu){
                    $up=$up->where($ku,$vu);
                    }
                    $up->update($diff);
                    //*/
                    } // end if
                }
            }

            // dddx($up->get());
        }

        // dddx($fields);
        $double = self::where('anno', $anno)
            ->groupBy($fields)->havingRaw('COUNT(*) > 1')->get();
        echo '<h3> Double Sub :'.\count($double).'</h3>';
        foreach ($double as $v) {
            echo '<hr><pre>';
            print_r($v->only($fields));
            echo '</pre>';
        }

        // dddx($double);
        // dddx($results);
        echo '<hr/>';
        $url = Request::fullUrlWithQuery(['create_force' => '1']);
        echo '|<a href="'.$url.'" class="btn btn-danger">
                <i class="fas fa-fist-raised"></i>Force Create
            </a>';
        $url = Request::fullUrlWithQuery(['delete_force' => '1']);
        echo '|<a href="'.$url.'" class="btn btn-danger">
                <i class="fas fa-fist-raised"></i>Force Delete
            </a>';
        echo '<hr/>';
    }

    // -------------------------------------------------------------------------------------------------------
    public function addTableField(array $params): void
    {
        $table = $this->getTable();
        $conn = $this->getConnection();
        $fieldname = $params['name'];
        if (! Schema::connection($conn->getName())->hasColumn($table, $fieldname)) {
            Schema::connection($conn->getName())->table($table, static function ($table) use ($params): void {
                extract($params);
                $table->$type($name);
            });
        }
    }
} // end class
