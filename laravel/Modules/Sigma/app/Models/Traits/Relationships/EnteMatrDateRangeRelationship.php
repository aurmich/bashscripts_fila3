<?php

declare(strict_types=1);

namespace Modules\Sigma\Models\Traits\Relationships;

use Modules\Sigma\Models\Qua00f;

trait EnteMatrDateRangeRelationship
{
    // forse meglio tradurlo in uno scope
    public function qua00fDaterange()
    {
        $from_field = $this->from_field;
        $to_field = $this->to_field;
        if ($this->from_field === null) {
            $msg = [
                'err' => 'impostare mutator from_field',
                'class_basename' => class_basename($this),
                'get_class' => static::class,
                'from_field' => $this->from_field,
                '$from_field' => $this->$from_field,
                'line' => __LINE__,
                'file' => __FILE__,
            ];
            echo '<pre>'.print_r($msg, true).'</pre>';

            return;
        }

        $dal = 0;
        $al = 0;
        if (isset($this->$from_field) && isset($this->$to_field)) {
            /*
            dddx(
                [
                    'from_field' => $from_field,
                    'val' => $this->{$from_field},
                ]
            );
            */
            $dal = \is_object($this->{$from_field}) ? $this->{$from_field}->format('Ymd') : $this->{$from_field};
            $al = \is_object($this->{$to_field}) ? $this->{$to_field}->format('Ymd') : $this->{$to_field};
        }

        $sql = '(
		('.$dal.' between qua2kd and qua2ka ) or
		('.$dal.' >= year(qua2kd) and qua2ka=0) or
		('.$al.' between qua2kd and qua2ka ) or
		('.$al.' between qua2kd and qua2ka ) or
		(qua2kd between '.$dal.' and '.$al.' )
		)';

        return $this->hasMany(Qua00f::class, 'matr', 'matr')
            ->selectRaw('ente,matr,propro,posfun,posiz,disci1,codqua
                ,cont,tipco,ruolo
				,if(oree=0,36,oree) as oree
				,if(oret=0,36,oret) as oret

				,datediff(if(qua2ka=0 or qua2ka>'.$al.','.$al.',qua2ka),if(qua2kd<'.$dal.','.$dal.',qua2kd))+1 as giorni
				')
            ->whereRaw('quaann=""')
            ->where('ente', $this->ente)
            ->whereRaw($sql);
    }
}
