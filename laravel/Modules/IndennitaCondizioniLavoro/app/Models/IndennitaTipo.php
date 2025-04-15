<?php

declare(strict_types=1);

namespace Modules\IndennitaCondizioniLavoro\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Request;
use Route;
use function Safe\date;

/**
 * Modules\IndennitaCondizioniLavoro\Models\IndennitaTipo.
 *
 * @property int $id
 * @property string|null $nome
 * @property string|null $svocfi
 * @property string|null $created_by
 * @property string|null $updated_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read Collection<int, \Modules\IndennitaCondizioniLavoro\Models\IndennitaTipoDettaglio> $dettaglio
 * @property-read int|null $dettaglio_count
 *
 * @method static Builder|IndennitaTipo newModelQuery()
 * @method static Builder|IndennitaTipo newQuery()
 * @method static Builder|IndennitaTipo query()
 * @method static Builder|IndennitaTipo whereCreatedAt($value)
 * @method static Builder|IndennitaTipo whereCreatedBy($value)
 * @method static Builder|IndennitaTipo whereId($value)
 * @method static Builder|IndennitaTipo whereNome($value)
 * @method static Builder|IndennitaTipo whereSvocfi($value)
 * @method static Builder|IndennitaTipo whereUpdatedAt($value)
 * @method static Builder|IndennitaTipo whereUpdatedBy($value)
 *
 * @mixin \Eloquent
 */
class IndennitaTipo extends BaseModel
{
    protected $table = 'indennita_tipo';

    protected $fillable = ['id', 'nome', 'svocfi' /* , 'anno' */];

    public function dettaglio(): HasMany
    {
        $route_current = Route::current();
        $params = [];
        if (isset($route_current)) {
            $params = $route_current->parameters();
        }

        // $sql='(find_in_set('.$this->codqua.',only_codqua) or only_codqua="")';
        extract($params);
        if (! isset($anno)) {
            $anno = Request::input('year', date('Y'));
        }

        return $this->hasMany(IndennitaTipoDettaglio::class, 'indennita_tipo_id', 'id')
            ->whereRaw($anno.' between dal and al');
        // ->whereRaw($this->anno.' between dal and al')
    }
}
