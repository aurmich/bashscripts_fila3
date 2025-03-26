<?php

declare(strict_types=1);

namespace Modules\Progressioni\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Carbon;
use Modules\Sigma\Actions\MassUpdateCognomeNomeAction;
use Modules\Sigma\Models\Anag;

// ---------models----------
/**
 * Modules\Progressioni\Models\EsclusiExtra.
 *
 * @property int $id
 * @property int|null $ente
 * @property int|null $matr
 * @property string|null $cognome
 * @property string|null $nome
 * @property string|null $motivo
 * @property int|null $anno
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $created_by
 * @property string|null $updated_by
 * @property string|null $deleted_at
 * @property string|null $deleted_by
 * @property string|null $deleted_ip
 * @property string|null $created_ip
 * @property string|null $updated_ip
 *
 * @method static \Modules\Progressioni\Database\Factories\EsclusiExtraFactory factory($count = null, $state = [])
 * @method static Builder|EsclusiExtra newModelQuery()
 * @method static Builder|EsclusiExtra newQuery()
 * @method static Builder|EsclusiExtra query()
 * @method static Builder|EsclusiExtra whereAnno($value)
 * @method static Builder|EsclusiExtra whereCognome($value)
 * @method static Builder|EsclusiExtra whereCreatedAt($value)
 * @method static Builder|EsclusiExtra whereCreatedBy($value)
 * @method static Builder|EsclusiExtra whereCreatedIp($value)
 * @method static Builder|EsclusiExtra whereDeletedAt($value)
 * @method static Builder|EsclusiExtra whereDeletedBy($value)
 * @method static Builder|EsclusiExtra whereDeletedIp($value)
 * @method static Builder|EsclusiExtra whereEnte($value)
 * @method static Builder|EsclusiExtra whereId($value)
 * @method static Builder|EsclusiExtra whereMatr($value)
 * @method static Builder|EsclusiExtra whereMotivo($value)
 * @method static Builder|EsclusiExtra whereNome($value)
 * @method static Builder|EsclusiExtra whereUpdatedAt($value)
 * @method static Builder|EsclusiExtra whereUpdatedBy($value)
 * @method static Builder|EsclusiExtra whereUpdatedIp($value)
 *
 * @mixin \Eloquent
 */
class EsclusiExtra extends BaseModel
{
    protected $fillable = ['id', 'ente', 'matr', 'cognome', 'nome', 'motivo', 'anno'];

    protected $table = 'esclusi_progressione';

    public function updateFields(): array
    {
        $params = getRouteParameters();
        $parz = [];
        $parz['table'] = $this->getTable();
        $parz['conn'] = $this->getConnection();
        $parz['where'] = 'anno="'.$params['anno'].'"';
        // Anag::massUpdateCognomeNome($parz);
        app(MassUpdateCognomeNomeAction::class)->execute($parz['conn'], $parz['table'], $parz['where']);
        $rows = self::where('anno', $params['anno']);
        foreach ($rows->get() as $row) {
            // echo '<br/>'.$row->ente.' '.$row->matr.' '.$row->anno;
            $schede = Schede::where('ente', $row->ente)->where('matr', $row->matr)->where('anno', $row->anno);
            foreach ($schede->get() as $scheda) {
                $scheda->ha_diritto = 0;
                $motivi = array_map('trim', explode(',', (string) $scheda->motivo));
                $motivi[] = $row->motivo;
                $motivi = array_unique($motivi);
                $scheda->motivo = implode(', ', $motivi);
                $scheda->update();
            }
        }

        return [];
    }

    // -------------------------
}
