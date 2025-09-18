<?php

declare(strict_types=1);

namespace Modules\Sigma\Models\Traits\Mutators;

trait EnteStabiMutator
{
    public function getStabiTxtAttribute(?string $value): ?string
    {
        if ($value !== null) {
            return $value;
        }

        if (! \is_object($this->reparts)) {
            dddx($this);
        }

        $stabi = $this->reparts->where('repar', 0)->first();
        if (! \is_object($stabi)) {
            return '---';
        }

        $value = $stabi->dest1;

        $this->stabi_txt = $value;
        $this->save();

        return $value;
    }

    public function getReparTxtAttribute($value)
    {
        if ($value !== null && $value !== '---') {
            return $value;
        }

        if (! \is_object($this->reparts)) {
            dddx($this);
        }

        $repar = $this->repre1;
        if ($repar === null) {
            $repar = $this->repar;
        }

        $repar = $this->reparts->where('repar', $repar)->first();
        if (! \is_object($repar)) {
            return '---';
        }

        $value = $repar->dest1;
        if (\in_array('repar_txt', $this->getFillable(), false)) {
            $this->repar_txt = $value;
            $this->save();
        }

        return $value;
    }
}
