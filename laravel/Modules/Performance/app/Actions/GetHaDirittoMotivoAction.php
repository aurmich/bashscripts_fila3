<?php

declare(strict_types=1);

namespace Modules\Performance\Actions;

use Carbon\Carbon;
use Exception;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Modules\Performance\Models\Performance;
use Spatie\QueueableAction\QueueableAction;

/**
 * @template TModel of Model
 */
class GetHaDirittoMotivoAction
{
    use QueueableAction;

    public int $year;

    /**
     * @param Performance|Model $model
     * @param array<string, mixed> $criteri_esclusione
     * @param array<string, mixed> $criteri_option
     * @return array{0: int, 1: string}
     */
    public function execute(Model $model, array $criteri_esclusione, array $criteri_option): array
    {
        $ha_diritto = 1;
        $motivo = '';
        foreach ($criteri_esclusione as $k => $v) {
            $func = 'check'.Str::studly($k);
            $parz = $criteri_option;
            $parz[$k] = $v;
            /*
            $parz['date_max'] = $this->year * 10000 + 1231;
            $parz['date_min'] = $this->year * 10000 + 101;
            */
            if (!property_exists($model, 'anno')) {
                throw new Exception('Property anno is not defined on model');
            }
            $parz['date_max'] = $model->anno * 10000 + 1231;
            $parz['date_min'] = $model->anno * 10000 + 101;
            $msg = $this->$func($parz, $model);
            if ($msg !== '') {
                $motivo .= ', '.$msg;
                $ha_diritto = 0;
            }
        }

        return [$ha_diritto, $motivo];
    }

    /**
     * @param array<string,mixed> $parz
     * @param object{gg_ruolo:int} $scheda
     */
    public function checkMinGgRuolo(array $parz, object $scheda): string
    {
        extract($parz);
        if (! isset($min_gg_ruolo)) {
            throw new Exception('min_gg_ruolo is not defined ['.__LINE__.']['.class_basename(self::class).']');
        }

        if ($scheda->gg_ruolo < $min_gg_ruolo) {
            return 'no min gg_ruolo ['.$scheda->gg_ruolo.']';
        }

        return '';
    }

    public function checkMinGgPropro(array $parz, object $scheda): string
    {
        extract($parz);

        return '';
    }

    public function checkMinGgProproPosfun(array $parz, object $scheda): string
    {
        extract($parz);

        return '';
    }

    /**
     * @param array<string,mixed> $parz
     * @param object{gg_presenza_anno:int,gg_assenza_anno:int} $scheda
     */
    public function checkMinGgAnno(array $parz, object $scheda): string
    {
        extract($parz);
        if (! isset($min_gg_anno)) {
            throw new Exception('min_gg_anno is not defined ['.__LINE__.']['.class_basename(self::class).']');
        }

        // dddx($scheda->gg_presenza_anno);
        // dddx($scheda->gg_assenza_anno);
        $eff = $scheda->gg_presenza_anno - $scheda->gg_assenza_anno;
        if ($eff < $min_gg_anno) {
            return 'no min gg_anno ['.$eff.']';
        }

        return '';
    }

    public function checkMinGgTempoDeterminato(array $parz, object $scheda): string
    {
        extract($parz);

        // dddx($scheda->gg_tempo_determinato);
        return '';
    }

    public function checkMinGgEffettuati(array $parz, object $scheda): string
    {
        extract($parz);

        return '';
    }

    /**
     * @param array<string,mixed> $parz
     * @param object{posiz:string} $scheda
     */
    public function checkNoposizList(array $parz, object $scheda): string
    {
        extract($parz);
        if (! isset($noposiz_list)) {
            throw new Exception('noposiz_list is not defined ['.__LINE__.']['.class_basename(self::class).']');
        }

        $noposiz_arr = explode(',', (string) $noposiz_list);
        if (\in_array($scheda->posiz, $noposiz_arr, false)) {
            return 'no_posiz ['.$scheda->posiz.']';
        }

        return '';
    }

    /**
     * @param array<string,mixed> $parz
     * @param object{propro:string} $scheda
     */
    public function checkNoproproList(array $parz, object $scheda): string
    {
        extract($parz);
        if (! isset($nopropro_list)) {
            throw new Exception('nopropro_list is not defined ['.__LINE__.']['.class_basename(self::class).']');
        }

        $arr = explode(',', (string) $nopropro_list);
        if (\in_array($scheda->propro, $arr, false)) {
            return 'no_propro ['.$scheda->propro.']';
        }

        return '';
    }

    /**
     * @param array<string,mixed> $parz
     * @param object{posfun:string} $scheda
     */
    public function checkNoposfunList(array $parz, object $scheda): string
    {
        extract($parz);
        if (! isset($noposfun_list)) {
            throw new Exception('noposfun_list is not defined ['.__LINE__.']['.class_basename(self::class).']');
        }

        $arr = explode(',', (string) $noposfun_list);
        if (\in_array($scheda->posfun, $arr, false)) {
            return 'no_posfun ['.$scheda->posfun.']';
        }

        return '';
    }

    /**
     * @param array<string,mixed> $parz
     * @param object{disci1:int|string} $scheda
     */
    public function checkNodisci1List(array $parz, object $scheda): string
    {
        extract($parz);
        if (! isset($nodisci1_list)) {
            throw new Exception('nodisci1_list is not defined ['.__LINE__.']['.class_basename(self::class).']');
        }

        $arr = explode(',', (string) $nodisci1_list);
        // if (23925 == $scheda->matr) {  //4 debug
        //    dddx(['scheda->disci1' => $scheda->disci1, 'arr' => $arr, 't' => in_array(202, $arr, false)]);
        // }

        if (\in_array($scheda->disci1, $arr, false)) {
            return 'no_disci1 ['.$scheda->disci1.']';
        }

        return '';
    }

    /**
     * @param array<string,mixed> $parz
     * @param object{gg_assenza_anno:int} $scheda
     */
    public function checkMaxGgAssenzeAnno(array $parz, object $scheda): string
    {
        extract($parz);

        if (! isset($max_gg_assenze_anno)) {
            throw new Exception('max_gg_assenze_anno is not defined ['.__LINE__.']['.class_basename(self::class).']');
        }

        if ($scheda->gg_assenza_anno > $max_gg_assenze_anno) {
            return 'max gg assenze anno ['.$scheda->gg_assenza_anno.']>['.$max_gg_assenze_anno.']';
        }

        return '';
    }

    /**
     * @param array<string,mixed> $parz
     * @param object{gg_assenza_anno:int} $scheda
     */
    public function checkMaxGgAssenzaAnno(array $parz, object $scheda): string
    {
        extract($parz);
        if (! isset($max_gg_assenza_anno)) {
            throw new Exception('max_gg_assenza_anno is not defined ['.__LINE__.']['.class_basename(self::class).']');
        }

        if ($scheda->gg_assenza_anno > $max_gg_assenza_anno) {
            return 'max gg assenze anno ['.$scheda->gg_assenza_anno.']>['.$max_gg_assenza_anno.']';
        }

        return '';
    }

    /**
     * @param array<string,mixed> $parz
     * @param object{last_data_assunz:string|int|null} $scheda
     */
    public function checkDateMinAssunz(array $parz, object $scheda): string
    {
        extract($parz);

        $last_data_assunz = $scheda->last_data_assunz;
        if (! \is_object($last_data_assunz)) {
            $last_data_assunz = Carbon::parse($last_data_assunz);
        }

        if (! isset($date_min_assunz)) {
            throw new Exception('date_min_assunz is not defined ['.__LINE__.']['.class_basename(self::class).']');
        }

        if (! \is_object($date_min_assunz)) {
            $date_min_assunz = Carbon::parse($date_min_assunz);
        }

        if ($last_data_assunz > $date_min_assunz) {
            if ($last_data_assunz instanceof Carbon && $date_min_assunz instanceof Carbon) {
                return sprintf('date min assunz [%s]>[%s][1]', $last_data_assunz->format('Y-m-d'), $date_min_assunz->format('Y-m-d'));
            }
            return 'Invalid date format';
        }

        return '';
    }
}
