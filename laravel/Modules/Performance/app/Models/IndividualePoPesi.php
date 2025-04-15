<?php

declare(strict_types=1);

namespace Modules\Performance\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;
use Illuminate\Validation\Rule;

/**
 * @property int $id
 * @property int $ente
 * @property int|null $matr
 * @property int|null $anno
 * @property float|null $peso_esperienza_acquisita
 * @property float|null $peso_risultati_ottenuti
 * @property float|null $peso_arricchimento_professionale
 * @property float|null $peso_impegno
 * @property float|null $peso_qualita_prestazione
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $created_by
 * @property string|null $updated_by
 * @property-read Individuale|null $individuale
 * @property-read IndividualeAdm|null $individualeAdm
 * @property-read IndividualeDip|null $individualeDip
 * @property-read IndividualePo|null $individualePo
 * @property-read IndividualeRegionale|null $individualeRegionale
 * @property-read Organizzativa|null $organizzativa
 * @property-read Performance|null $performance
 *
 * @mixin Model
 */
class IndividualePoPesi extends Model
{
    /** @var string */
    protected $connection = 'performance';

    /** @var string */
    protected $table = 'performance_individuale_po_pesi';

    /** @var array<int, string> */
    protected $fillable = [
        'id', 'ente', 'matr', 'anno',
        'peso_esperienza_acquisita',
        'peso_risultati_ottenuti',
        'peso_arricchimento_professionale',
        'peso_impegno',
        'peso_qualita_prestazione',
    ];

    /** @return array<string, string> */
    public function casts(): array
    {
        return [
            'id' => 'integer',
            'ente' => 'integer',
            'matr' => 'integer',
            'anno' => 'integer',
            'peso_esperienza_acquisita' => 'float',
            'peso_risultati_ottenuti' => 'float',
            'peso_arricchimento_professionale' => 'float',
            'peso_impegno' => 'float',
            'peso_qualita_prestazione' => 'float',
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
        ];
    }

    /** @return array<string, mixed> */
    public function rules(): array
    {
        return [
            'ente' => ['required', 'integer', 'exists:ente,id'],
            'matr' => ['required', 'integer', 'exists:performance_individuale,matr'],
            'anno' => ['required', 'integer', 'min:2000', 'max:2100'],
            'peso_esperienza_acquisita' => ['nullable', 'numeric', 'min:0', 'max:100'],
            'peso_risultati_ottenuti' => ['nullable', 'numeric', 'min:0', 'max:100'],
            'peso_arricchimento_professionale' => ['nullable', 'numeric', 'min:0', 'max:100'],
            'peso_impegno' => ['nullable', 'numeric', 'min:0', 'max:100'],
            'peso_qualita_prestazione' => ['nullable', 'numeric', 'min:0', 'max:100'],
        ];
    }

    /**
     * Relazione con la scheda individuale
     * @return BelongsTo<Individuale, IndividualePoPesi>
     */
    public function individuale(): BelongsTo
    {
        return $this->belongsTo(Individuale::class, 'matr', 'matr')
            ->where('ente', $this->ente)
            ->where('anno', $this->anno);
    }

    /**
     * Relazione con la scheda amministrativa
     * @return BelongsTo<IndividualeAdm, IndividualePoPesi>
     */
    public function individualeAdm(): BelongsTo
    {
        return $this->belongsTo(IndividualeAdm::class, 'matr', 'matr')
            ->where('ente', $this->ente)
            ->where('anno', $this->anno);
    }

    /**
     * Relazione con la scheda dipendente
     * @return BelongsTo<IndividualeDip, IndividualePoPesi>
     */
    public function individualeDip(): BelongsTo
    {
        return $this->belongsTo(IndividualeDip::class, 'matr', 'matr')
            ->where('ente', $this->ente)
            ->where('anno', $this->anno);
    }

    /**
     * Relazione con la scheda PO
     * @return BelongsTo<IndividualePo, IndividualePoPesi>
     */
    public function individualePo(): BelongsTo
    {
        return $this->belongsTo(IndividualePo::class, 'matr', 'matr')
            ->where('ente', $this->ente)
            ->where('anno', $this->anno);
    }

    /**
     * Relazione con la scheda regionale
     * @return BelongsTo<IndividualeRegionale, IndividualePoPesi>
     */
    public function individualeRegionale(): BelongsTo
    {
        return $this->belongsTo(IndividualeRegionale::class, 'matr', 'matr')
            ->where('ente', $this->ente)
            ->where('anno', $this->anno);
    }

    /**
     * Relazione con la scheda organizzativa
     * @return BelongsTo<Organizzativa, IndividualePoPesi>
     */
    public function organizzativa(): BelongsTo
    {
        return $this->belongsTo(Organizzativa::class, 'matr', 'matr')
            ->where('ente', $this->ente)
            ->where('anno', $this->anno);
    }

    /**
     * Relazione con la performance
     * @return BelongsTo<Performance, IndividualePoPesi>
     */
    public function performance(): BelongsTo
    {
        return $this->belongsTo(Performance::class, 'matr', 'matr')
            ->where('ente', $this->ente)
            ->where('anno', $this->anno);
    }
} 