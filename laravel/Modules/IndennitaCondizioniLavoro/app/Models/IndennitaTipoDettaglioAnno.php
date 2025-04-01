<?php

declare(strict_types=1);

namespace Modules\IndennitaCondizioniLavoro\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Carbon;
use Route;

/**
 * Modules\IndennitaCondizioniLavoro\Models\IndennitaTipoDettaglioAnno.
 *
 * @property int $id
 * @property int|null $indennita_tipo_id
 * @property string|null $nome
 * @property int|null $dal
 * @property int|null $al
 * @property string|null $euro_giorno
 * @property string|null $only_disci1
 * @property string|null $only_codqua
 * @property string|null $except_disci1
 * @property string|null $except_codqua
 * @property Carbon|null $updated_at
 * @property Carbon|null $created_at
 * @property string|null $updated_by
 * @property string|null $created_by
 * @property-read array $indennita_tipo_opts
 * @property-read \Modules\IndennitaCondizioniLavoro\Models\IndennitaTipo|null $indennitaTipo
 *
 * @method static Builder|IndennitaTipoDettaglioAnno newModelQuery()
 * @method static Builder|IndennitaTipoDettaglioAnno newQuery()
 * @method static Builder|IndennitaTipoDettaglioAnno query()
 * @method static Builder|IndennitaTipoDettaglioAnno whereAl($value)
 * @method static Builder|IndennitaTipoDettaglioAnno whereCreatedAt($value)
 * @method static Builder|IndennitaTipoDettaglioAnno whereCreatedBy($value)
 * @method static Builder|IndennitaTipoDettaglioAnno whereDal($value)
 * @method static Builder|IndennitaTipoDettaglioAnno whereEuroGiorno($value)
 * @method static Builder|IndennitaTipoDettaglioAnno whereExceptCodqua($value)
 * @method static Builder|IndennitaTipoDettaglioAnno whereExceptDisci1($value)
 * @method static Builder|IndennitaTipoDettaglioAnno whereId($value)
 * @method static Builder|IndennitaTipoDettaglioAnno whereIndennitaTipoId($value)
 * @method static Builder|IndennitaTipoDettaglioAnno whereNome($value)
 * @method static Builder|IndennitaTipoDettaglioAnno whereOnlyCodqua($value)
 * @method static Builder|IndennitaTipoDettaglioAnno whereOnlyDisci1($value)
 * @method static Builder|IndennitaTipoDettaglioAnno whereUpdatedAt($value)
 * @method static Builder|IndennitaTipoDettaglioAnno whereUpdatedBy($value)
 *
 * @mixin \Eloquent
 */
class IndennitaTipoDettaglioAnno extends BaseModel
{
    protected $table = 'indennita_tipo_dettaglio';

    protected $fillable = ['nome', 'svocfi'];

    /**
     * The "booting" method of the model.
     */
    protected static function boot(): void
    {
        parent::boot();
        $route_current = Route::current();
        $params = [];
        if (isset($route_current)) {
            $params = $route_current->parameters();
        }

        extract($params);
        if (! isset($anno)) {
            $anno = 0;
        }

        static::addGlobalScope('dal', static function (Builder $query) use ($anno): void {
            $query->where('dal', '<=', $anno);
        });
        static::addGlobalScope('al', static function (Builder $query) use ($anno): void {
            $query->where('al', '>=', $anno);
        });
    }

    // -------- relationship ------
    public function indennitaTipo(): HasOne
    {
        return $this->hasOne(IndennitaTipo::class, 'id', 'indennita_tipo_id');
    }

    // ------ mutators ----
    public function getIndennitaTipoOptsAttribute(?string $value): array
    {
        return IndennitaTipo::all()->pluck('nome', 'id');
    }
}
