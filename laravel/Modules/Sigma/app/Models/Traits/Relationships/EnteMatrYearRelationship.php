<?php

declare(strict_types=1);

namespace Modules\Sigma\Models\Traits\Relationships;

use Exception;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Modules\Sigma\Models\Qua00f;

trait EnteMatrYearRelationship
{
    // --- relationship ---------
    public function qua00fYear(): HasMany
    {
        if (! property_exist($this, 'anno')) {
            throw new Exception('in ['.static::class.'] property [anno] not exist');
        }

        $sql = '(
		('.$this->anno.' between year(qua2kd) and year(qua2ka) )or
		('.$this->anno.' >= year(qua2kd) and qua2ka=0)
		)';
        $inizioanno = $this->anno * 10000 + 101;
        $fineanno = $this->anno * 10000 + 1231;

        return $this->hasMany(Qua00f::class, 'matr', 'matr')
            ->selectRaw('ente,matr,propro,posfun,posiz
				,if(oree=0,36,oree) as oree
				,if(oret=0,36,oret) as oret
				,if(qua2kd<'.$inizioanno.','.$inizioanno.',qua2kd) as qua2kd
				,if(qua2ka=0,'.$fineanno.',qua2ka) as qua2ka
				,datediff(if(qua2ka=0,'.$fineanno.',qua2ka),if(qua2kd<'.$inizioanno.','.$inizioanno.',qua2kd))+1 as giorni
				')
            ->whereRaw('quaann=""')
            ->where('ente', $this->ente)
            ->whereRaw($sql);
    }
}
