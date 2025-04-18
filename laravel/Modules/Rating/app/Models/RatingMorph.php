<?php

declare(strict_types=1);

namespace Modules\Rating\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Modules\Rating\Models\Rating;
use Modules\User\Models\User;
use Modules\User\Models\Profile;

/**
 * Modello per la gestione delle relazioni polimorfiche dei rating.
 *
 * @property int $id Identificativo univoco
 * @property int|null $model_id ID dell'elemento valutato
 * @property string|null $model_type Tipo dell'elemento valutato
 * @property int $rating_id ID del rating associato
 * @property string|null $user_id ID dell'utente che ha dato il rating
 * @property string|null $note Note opzionali
 * @property int|null $value Valore numerico del rating
 * @property bool $is_winner Flag per indicare se è un rating vincente
 * @property string|null $reward Premio/ricompensa associata
 * @property \Illuminate\Support\Carbon|null $created_at Data di creazione
 * @property \Illuminate\Support\Carbon|null $updated_at Data di ultimo aggiornamento
 * @property \Illuminate\Support\Carbon|null $deleted_at Data di cancellazione soft
 *
 * @property-read Rating|null $rating Rating associato
 * @property-read User|null $user Utente che ha dato il rating
 * @property-read Profile|null $profile Profilo dell'utente
 * @property-read Model $model Modello valutato
 *
 * @method static \Illuminate\Database\Eloquent\Builder|RatingMorph whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RatingMorph whereModelId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RatingMorph whereModelType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RatingMorph whereRatingId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RatingMorph whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RatingMorph whereNote($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RatingMorph whereValue($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RatingMorph whereIsWinner($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RatingMorph whereReward($value)
 */
class RatingMorph extends BaseMorphPivot
{
    /**
     * I campi assegnabili in massa.
     *
     * @var array<string>
     */
    protected $fillable = [
        'id',
        'model_id',
        'model_type',
        'rating_id',
        'user_id',
        'note',
        'value',
        'is_winner',
        'reward',
    ];

    /**
     * I campi da castare a tipi nativi.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'is_winner' => 'boolean',
        'value' => 'integer',
        'model_id' => 'integer',
        'rating_id' => 'integer',
    ];

    /**
     * Relazione con il rating.
     */
    public function rating(): BelongsTo
    {
        return $this->belongsTo(Rating::class);
    }

    /**
     * Relazione con l'utente.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relazione con il profilo.
     */
    public function profile(): BelongsTo
    {
        return $this->belongsTo(Profile::class);
    }

    /**
     * Relazione polimorfica con il modello valutato.
     */
    public function model(): MorphTo
    {
        return $this->morphTo();
    }
}
