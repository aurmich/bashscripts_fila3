<?php

declare(strict_types=1);

namespace Modules\Sigma\Models\Traits\Scopes;

use Carbon\Carbon;
use Exception;
use Illuminate\Database\Eloquent\Builder;

trait CommonScope
{
    // ------ SCOPES --------
    public function scopeOfQuarter(Builder $query, int $quarter, int $year): Builder
    {
        $m_from = (($quarter - 1) * 3) + 1;
        $from = Carbon::create($year, $m_from, 1, 0, 0, 0);
        $to = Carbon::create($year, $m_from, 1, 0, 0, 0);
        if ($from === null) {
            throw new Exception('$from==null');
        }

        if ($to === null) {
            throw new Exception('$to==null');
        }

        $to = $to->addMonths(3)->subDay();
        $sql = ''.$this->from_field.' >= '.$from->format('Ymd').' and
            '.$this->to_field.' <= '.$to->format('Ymd').'';

        return $query->whereRaw($sql);
    }

    public function scopeOfYear(Builder $query, int $year): Builder
    {
        if ($this->from_field === '') {
            dddx(['message' => 'from_field missing on '.static::class]);
        }

        $sql = '(
            ('.$year.' between year('.$this->from_field.') and year('.$this->to_field.') ) or
            ('.$year.' >= year('.$this->from_field.') and '.$this->to_field.'=0 )
        )';

        return $query->whereRaw($sql);
    }

    public function scopeOfEnteYear(Builder $query, int $ente, int $year): Builder
    {
        return $query->where('ente', $ente)->whereRaw('quaann=""')->ofYear($year);
    }

    public function scopeOfEnte(Builder $query, int $ente): Builder
    {
        return $query->where('ente', $ente);
        // ->whereRaw('quaann=""');
    }

    public function scopeOfDate(Builder $query, int $date): Builder
    {
        $sql = '(
            ('.$date.' between '.$this->from_field.' and '.$this->to_field.' ) or
            ('.$date.' >= '.$this->from_field.' and '.$this->to_field.'=0 )
        )';

        return $query->whereRaw($sql);
    }

    public function scopeOfRangeDate(Builder $query, int $date_start, int $date_end): Builder
    {
        /*
        if (is_object($date_start)) {
            $date_start = $date_start->format('Ymd');
        }
        */

        if ($date_end === 0) {
            $sql = '(('.$this->to_field.' >= '.$date_start.') or ('.$this->to_field.' =0))';

            return $query->whereRaw($sql);
        }

        $sql = '
        (
            (
                ('.$date_start.' between '.$this->from_field.' and '.$this->to_field.' ) or
                ('.$date_start.' >= '.$this->from_field.' and '.$this->to_field.'=0 )
            ) or
            (
                ('.$date_end.' between '.$this->from_field.' and '.$this->to_field.' ) or
                ('.$date_end.' >= '.$this->from_field.' and '.$this->to_field.'=0 )
            ) or

                ('.$this->from_field.' between '.$date_start.' and '.$date_end.' )


        )';

        return $query->whereRaw($sql);
    }

    public function scopeWithDays(Builder $query, int $date_min, int $date_max): Builder
    {
        $days = 'greatest(datediff(if('.$this->to_field.'=0 or '.$this->to_field.'>'.$date_max.','.$date_max.','.$this->to_field.'),
            if('.$this->from_field.'<'.$date_min.','.$date_min.','.$this->from_field.'))+1,0) ';

        return $query->selectRaw(sprintf('*,%s AS days', $days));
    }
}
