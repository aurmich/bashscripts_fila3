<?php

namespace Modules\Incentivi\Models;

/**
 * @property int $id
 * @property string $nome
 * @property string $tipo
 * @property int $quota_percentuale
 * @property int|null $importo
 * @property string $anno_competenza
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $updated_by
 * @property string|null $created_by
 * @property-read \Modules\Ptv\Models\Profile|null $creator
 * @property-read \Modules\Ptv\Models\Profile|null $updater
 *
 * @method static \Modules\Incentivi\Database\Factories\DefaultActivityFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|DefaultActivity newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DefaultActivity newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DefaultActivity query()
 * @method static \Illuminate\Database\Eloquent\Builder|DefaultActivity whereAnnoCompetenza($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DefaultActivity whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DefaultActivity whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DefaultActivity whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DefaultActivity whereImporto($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DefaultActivity whereNome($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DefaultActivity whereQuotaPercentuale($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DefaultActivity whereTipo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DefaultActivity whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DefaultActivity whereUpdatedBy($value)
 *
 * @property int $appartiene_a_liquidazione_a_fasi
 * @property string|null $liquidazione_fasi
 *
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DefaultActivity whereAppartieneALiquidazioneAFasi($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DefaultActivity whereLiquidazioneFasi($value)
 *
 * @mixin \Eloquent
 */
class DefaultActivity extends BaseModel
{
    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'nome',
        'tipo',
        'quota_percentuale',
        'importo',
        'anno_competenza',
        'appartiene_a_liquidazione_a_fasi',
        'liquidazione_fasi',
        'project_id',
    ];
}
