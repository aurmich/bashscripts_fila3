<?php

declare(strict_types=1);

namespace Modules\Ptv\Actions;

use Modules\Ptv\Datas\RepQuaYearData;
use Modules\Sigma\Models\Qua00f;
use Modules\Sigma\Models\Rep00f;
use Spatie\LaravelData\DataCollection;
use Spatie\QueueableAction\QueueableAction;

class GetWorkersByYear
{
    use QueueableAction;

    /**
     * Undocumented function.
     *
     * @return DataCollection<RepQuaYearData>
     */
    public function execute(?string $year): DataCollection
    {
        $ente = 90;

        $inizioanno = $year * 10000 + 101;
        $fineanno = $year * 10000 + 1231;

        $rep00fs = Rep00f::ofYear(intval($year))
            ->select('ente', 'matr', 'repst1 as stabi', 'repre1 as repar', 'rep2kd', 'rep2ka')
            ->whereRaw('repann=""')
            ->where('ente', $ente)
                // ->limit('5')
            ->get();
        $qua00fs = Qua00f::ofYear(intval($year))
            ->select('ente', 'matr', 'propro', 'posfun', 'qua2kd', 'qua2ka')
            ->whereRaw('quaann=""')
            ->where('ente', $ente)
                // ->limit(5)
            ->get();

        $rep00f_coll = $rep00fs
            ->groupBy(
                static fn ($item): string => $item['ente'].'-'.$item['matr']
            );
        $qua00f_coll = $qua00fs
            ->groupBy(
                static fn ($item): string => $item['ente'].'-'.$item['matr']
            );

        $ris = [];
        foreach ($rep00f_coll as $k => $rep) {
            $ris[$k]['rep'] = $rep->toArray();
            $ris[$k]['qua'] = $qua00f_coll->get($k)?->toArray() ?? [];
        }

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
                    $intersect = app(\Modules\Xot\Actions\Array\RangeIntersectAction::class)->execute($rep['dal'], $rep['al'], $qua['dal'], $qua['al']);
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
                // echo '<br/>Multi Riga '.$k.' ';  //da problemi con livewire
            }

            // }
        }

        $ris2 = [];
        foreach ($ris as $ri) {
            if (isset($ri['merge'])) {
                $ris2 = array_merge_recursive($ris2, $ri['merge']);
            }
        }

        return RepQuaYearData::collection($ris2);
    }
}
