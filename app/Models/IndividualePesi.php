<?php

declare(strict_types=1);

namespace Modules\Performance\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Carbon;
use Modules\Performance\Enums\WorkerType;

/**
 * Modules\Performance\Models\IndividualePesi.
 *
 * @property int $id
 * @property string|null $lista_propro
 * @property string|null $descr
 * @property int|null $peso_esperienza_acquisita
 * @property int|null $peso_risultati_ottenuti
 * @property int|null $peso_arricchimento_professionale
 * @property int|null $peso_impegno
 * @property int|null $peso_qualita_prestazione
 * @property int|null $anno
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
class IndividualePesi extends BaseModel
{
    /** @var array<int, string> */
    protected $fillable = [
        'id',
        'lista_propro',
        'descr',
        'peso_esperienza_acquisita',
        'peso_risultati_ottenuti',
        'peso_arricchimento_professionale',
        'peso_impegno',
        'peso_qualita_prestazione',
        'anno',
        'type',
    ];

    protected $table = 'peso_performance_individuale';

    /** @return array<string, string>  */
    public function casts(): array
    {
        return [
            'type' => WorkerType::class,
        ];
    }
}// end class Pesi
