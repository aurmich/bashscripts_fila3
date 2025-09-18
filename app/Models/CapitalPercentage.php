<?php

namespace Modules\Incentivi\Models;

/**
 * @property int $id
 * @property string $nome
 * @property string $descrizione
 * @property string $valore
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $updated_by
 * @property string|null $created_by
 * @property-read \Modules\Ptv\Models\Profile|null $creator
 * @property-read \Modules\Ptv\Models\Profile|null $updater
 *
 * @method static \Modules\Incentivi\Database\Factories\CapitalPercentageFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|CapitalPercentage newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CapitalPercentage newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CapitalPercentage query()
 * @method static \Illuminate\Database\Eloquent\Builder|CapitalPercentage whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CapitalPercentage whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CapitalPercentage whereDescrizione($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CapitalPercentage whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CapitalPercentage whereNome($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CapitalPercentage whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CapitalPercentage whereUpdatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CapitalPercentage whereValore($value)
 *
 * @mixin \Eloquent
 */
class CapitalPercentage extends BaseModel
{
    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = ['nome', 'descrizione', 'valore'];
}
