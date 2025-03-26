<?php

declare(strict_types=1);

namespace Modules\Performance\Models\Traits;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;
use Modules\Performance\Actions\TrovaEsclusiAction;
use Modules\Performance\Models\CriteriEsclusione;
use Modules\Performance\Models\CriteriOption;

trait FunctionTrait
{
    public static $criteri_esclusione_anno;

    public static $criteri_options_anno;

    public function listaTipoCodiceAssenze()
    {
        return $this->codiciAssenze->map(static fn ($item): string => $item->tipo.'-'.$item->codice)->implode(',');
    }

    public function check($name, $value): string
    {
        $year = $this->anno;
        $trovaEsclusiAction = new TrovaEsclusiAction();
        $trovaEsclusiAction->year = $year;

        return $trovaEsclusiAction->check($name, $value, $this);
    }

    public function optionsCriteriOrdered()
    {
        $criteri = $this->options->where('name', 'criterio')->where('parent_id', 0)->sortBy('pos');

        $criteri1 = $this->criteriValutazione->sortBy('posizione');
        foreach ($criteri as $v) {
            $v1 = $criteri1->firstWhere('nome', $v->value);
            $v->pos = $v1->posizione;
            $v->save();
        }

        return $criteri;
    }

    public function criteriOptionsYear($year)
    {
        if (isset(static::$criteri_options_anno)) {
            return static::$criteri_options_anno;
        }

        static::$criteri_options_anno = CriteriOption::where('anno', $year)->get();

        return static::$criteri_options_anno;
    }

    public function criteriEsclusioneYear($year)
    {
        if (isset(static::$criteri_esclusione_anno)) {
            return static::$criteri_esclusione_anno;
        }

        static::$criteri_esclusione_anno = CriteriEsclusione::where('anno', $year)->get();

        return static::$criteri_esclusione_anno;
    }

    public function getHaDirittoEMotivo(): array
    {
        $anno = $this->anno;
        if ($anno === null) {
            $anno = request('year');
            if ($anno !== null) {
                $anno = (int) $anno;
            }
        }

        $criteri_esclusione = $this->criteriEsclusioneYear($anno);
        $ha_diritto = 1;
        $motivo = '';
        foreach ($criteri_esclusione as $ce) {
            $msg = $this->check($ce->name, $ce->value);
            if ($msg !== '') {
                $motivo .= ', '.$msg;
                $ha_diritto = 0;
            }
        }

        return [$ha_diritto, $motivo];
    }

    public function getPeso(string $name): int
    {
        $peso = $this->peso;
        $field = 'peso_'.$name;
        $value = $peso?->getAttributeValue($field);
        if (is_int($value)) {
            return $value;
        }

        return 0;
    }

    public function getPesoFunc(string $func, ?float $value): ?float
    {
        if ($value !== null && $this->posfun < 100) {
            return $value;
        }

        $name = Str::snake(Str::before(Str::after($func, 'get'), 'Attribute'));
        if (! \is_object($this->peso)) {
            $msg = [
                'propro' => $this->propro,
                'anno' => $this->anno,
                'qua2k' => $this->qua2kd,
            ];

            // dddx($msg);
            return null;
        }

        $peso = $this->posfun >= 100 ? $this->pesoPo : $this->peso;
        if (! \is_object($peso)) {
            dddx([
                'this' => $this,
                'posfun' => $this->posfun,
                'pesoPo' => rowsToSql($this->pesoPo()),
                'peso' => rowsToSql($this->peso()),
            ]);

            return null;
        }

        $value = $peso->$name;
        $this->$name = $value;
        $this->save();

        return (float) $value;
    }

    public function setValutazioneFunc($func, $value)
    {
        $name = Str::snake(Str::before(Str::after($func, 'set'), 'Attribute'));
        // $value = number_format((float) $value, 1);
        $this->attributes[$name] = $value;

        return $value;
    }

    public function option(string $name): string
    {
        $option = $this->options->firstWhere('name', $name);
        if (! \is_object($option)) {
            return '<h3 style="color:red">andare su options e popolare:
            <ul>
            <li>option_type ['.$this->getType().']</li>
            <li>name ['.$name.']</li>
            <li>year ['.$this->anno.']</li>
            </ul>
            </h3>';
        }
        if (strlen((string) $option->value)) {
            return $option->value;
        }

        return $option->txt;
    }

    protected function getType(): string
    {
        return $this->type ?? '';
    }

    public function isPo(): bool
    {
        return $this->posfun >= 100;
    }

    public function isRegionale(): bool
    {
        return $this->disci1 === 203;
    }

    /**
     * Undocumented function.
     *
     * @param  Builder  $query
     * @return Builder
     */
    public function scopeWithTotPunt($query)
    {
        return $query;
    }

    public function canSendEmail(): bool
    {
        if ($this->ha_diritto == 0) {
            return false;
        }
        if ($this->totale_punteggio <= 1) {
            return false;
        }

        return true;
    }
}
