<?php

declare(strict_types=1);

namespace Modules\Performance\Models\Traits;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;
use Modules\Performance\Actions\TrovaEsclusiAction;
use Modules\Performance\Models\CriteriEsclusione;
use Modules\Performance\Models\CriteriOption;

/**
 * @template TModel of \Illuminate\Database\Eloquent\Model
 */
trait FunctionTrait
{
    /** @var array<string, mixed> */
    protected array $criteri_esclusione_anno = [];

    /** @var array<string, mixed> */
    protected array $criteri_options_anno = [];

    /** @var array<int, array<string, mixed>> */
    protected static array $cached_criteri_esclusione = [];

    /** @var array<int, array<string, mixed>> */
    protected static array $cached_criteri_options = [];

    public function listaTipoCodiceAssenze(): array
    {
        return $this->codiciAssenze->map(static fn ($item): string => $item->tipo.'-'.$item->codice)->toArray();
    }

    /**
     * @param string $name
     * @param mixed $value
     */
    public function check(string $name, mixed $value): string
    {
        $year = $this->anno;
        $trovaEsclusiAction = new TrovaEsclusiAction();
        $trovaEsclusiAction->year = $year;

        return $trovaEsclusiAction->check($name, $value, $this);
    }

    /**
     * @return array<string, mixed>
     */
    public function optionsCriteriOrdered(): array
    {
        $criteri = $this->options->where('name', 'criterio')->where('parent_id', 0)->sortBy('pos');

        $criteri1 = $this->criteriValutazione->sortBy('posizione');
        foreach ($criteri as $v) {
            $v1 = $criteri1->firstWhere('nome', $v->value);
            $v->pos = $v1->posizione;
            $v->save();
        }

        return $criteri->toArray();
    }

    /**
     * @param int $year
     * @return array<int, array<string, mixed>>
     */
    public function criteriOptionsYear(int $year): array
    {
        if (isset(static::$cached_criteri_options[$year])) {
            return static::$cached_criteri_options[$year];
        }

        $options = CriteriOption::where('anno', $year)->get();
        static::$cached_criteri_options[$year] = $options->toArray();

        return static::$cached_criteri_options[$year];
    }

    /**
     * @param int $year
     * @return array<int, array<string, mixed>>
     */
    public function criteriEsclusioneYear(int $year): array
    {
        if (isset(static::$cached_criteri_esclusione[$year])) {
            return static::$cached_criteri_esclusione[$year];
        }

        $esclusioni = CriteriEsclusione::where('anno', $year)->get();
        static::$cached_criteri_esclusione[$year] = $esclusioni->toArray();

        return static::$cached_criteri_esclusione[$year];
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
            $msg = $this->check($ce['name'], $ce['value']);
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
                'pesoPo' => $this->pesoPo()->toSql(),
                'peso' => $this->peso()->toSql(),
            ]);

            return null;
        }

        $value = $peso->$name;
        $this->$name = $value;
        $this->save();
        return (float) $value;
    }

    /**
     * @param string $func
     * @param mixed $value
     * @return void
     */
    public function setValutazioneFunc(string $func, mixed $value): void
    {
        $name = Str::snake(Str::before(Str::after($func, 'set'), 'Attribute'));
        // $value = number_format((float) $value, 1);
        $this->attributes[$name] = $value;
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
    /**
     * @param Builder<TModel> $query
     * @return Builder<TModel>
     */
    public function scopeWithTotPunt(Builder $query): Builder
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

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<\Modules\Performance\Models\IndividualePoPesi, static>
     */
    protected function pesoPo()
    {
        // ... existing code ...
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<\Modules\Performance\Models\IndividualePesi, static>
     */
    protected function peso()
    {
        // ... existing code ...
    }
}
