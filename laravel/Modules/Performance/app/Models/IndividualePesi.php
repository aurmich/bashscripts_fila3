<?php

declare(strict_types=1);

namespace Modules\Performance\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Carbon;
use Modules\Ptv\Enums\WorkerType;
use Modules\Xot\Models\XotBaseModel;

/**
 * Modules\Performance\Models\IndividualePesi.
 *
 * @property int         $id
 * @property string|null $lista_propro
 * @property string|null $descr
 * @property int|null    $peso_esperienza_acquisita
 * @property int|null    $peso_risultati_ottenuti
 * @property int|null    $peso_arricchimento_professionale
 * @property int|null    $peso_impegno
 * @property int|null    $peso_qualita_prestazione
 * @property int|null    $anno
 * @property Carbon|null $created_at
 * @property string|null $created_by
 * @property Carbon|null $updated_at
 * @property string|null $updated_by
 *
 * @method static Builder|IndividualePesi newModelQuery()
 * @method static Builder|IndividualePesi newQuery()
 * @method static Builder|IndividualePesi query()
 * @method static Builder|IndividualePesi whereAnno($value)
 * @method static Builder|IndividualePesi whereCreatedAt($value)
 * @method static Builder|IndividualePesi whereCreatedBy($value)
 * @method static Builder|IndividualePesi whereDescr($value)
 * @method static Builder|IndividualePesi whereId($value)
 * @method static Builder|IndividualePesi whereListaPropro($value)
 * @method static Builder|IndividualePesi wherePesoArricchimentoProfessionale($value)
 * @method static Builder|IndividualePesi wherePesoEsperienzaAcquisita($value)
 * @method static Builder|IndividualePesi wherePesoImpegno($value)
 * @method static Builder|IndividualePesi wherePesoQualitaPrestazione($value)
 * @method static Builder|IndividualePesi wherePesoRisultatiOttenuti($value)
 * @method static Builder|IndividualePesi whereUpdatedAt($value)
 * @method static Builder|IndividualePesi whereUpdatedBy($value)
 *
 * @mixin \Eloquent
 */
class IndividualePesi extends XotBaseModel
{
    protected $connection = 'performance';
    protected $table = 'peso_performance_individuale';

    /** @var array<int, string> */
    protected $fillable = [
        'type',
        'lista_propro',
        'descr',
        'peso_esperienza_acquisita',
        'peso_risultati_ottenuti',
        'peso_arricchimento_professionale',
        'peso_impegno',
        'peso_qualita_prestazione',
        'anno',
    ];

    /** @return array<string, string>  */
    public function casts(): array
    {
        return [
            'type' => WorkerType::class,
        ];
    }

    // Nuovo approccio per il casting in Laravel 11
    public function type(): WorkerType
    {
        return WorkerType::from($this->getAttribute('type'));
    }

    public function setTypeAttribute(WorkerType $value): void
    {
        $this->setAttribute('type', $value->value);
    }

    public function getPesoEsperienzaAcquisitaAttribute(): float
    {
        return (float) $this->getAttribute('peso_esperienza_acquisita');
    }

    public function setPesoEsperienzaAcquisitaAttribute(float $value): void
    {
        $this->setAttribute('peso_esperienza_acquisita', $value);
    }

    public function getPesoRisultatiOttenutiAttribute(): float
    {
        return (float) $this->getAttribute('peso_risultati_ottenuti');
    }

    public function setPesoRisultatiOttenutiAttribute(float $value): void
    {
        $this->setAttribute('peso_risultati_ottenuti', $value);
    }

    public function getPesoArricchimentoProfessionaleAttribute(): float
    {
        return (float) $this->getAttribute('peso_arricchimento_professionale');
    }

    public function setPesoArricchimentoProfessionaleAttribute(float $value): void
    {
        $this->setAttribute('peso_arricchimento_professionale', $value);
    }

    public function getPesoImpegnoAttribute(): float
    {
        return (float) $this->getAttribute('peso_impegno');
    }

    public function setPesoImpegnoAttribute(float $value): void
    {
        $this->setAttribute('peso_impegno', $value);
    }

    public function getPesoQualitaPrestazioneAttribute(): float
    {
        return (float) $this->getAttribute('peso_qualita_prestazione');
    }

    public function setPesoQualitaPrestazioneAttribute(float $value): void
    {
        $this->setAttribute('peso_qualita_prestazione', $value);
    }

    public function getAnnoAttribute(): int
    {
        return (int) $this->getAttribute('anno');
    }

    public function setAnnoAttribute(int $value): void
    {
        $this->setAttribute('anno', $value);
    }

    public function getTotalWeightAttribute(): float
    {
        return $this->peso_esperienza_acquisita +
               $this->peso_risultati_ottenuti +
               $this->peso_arricchimento_professionale +
               $this->peso_impegno +
               $this->peso_qualita_prestazione;
    }

    public function individuale(): HasMany
    {
        return $this->hasMany(Individuale::class, 'type', 'type');
    }

    public function individualePo(): HasMany
    {
        return $this->hasMany(IndividualePo::class, 'type', 'type');
    }

    public function individualeRegionale(): HasMany
    {
        return $this->hasMany(IndividualeRegionale::class, 'type', 'type');
    }

    public function individualeAdm(): HasMany
    {
        return $this->hasMany(IndividualeAdm::class, 'type', 'type');
    }
}// end class Pesi
