<?php

declare(strict_types=1);

namespace Modules\IndennitaResponsabilita\Models;

use Modules\Rating\Models\RatingMorph as PtvRatingMorphModel;

/**
 * Modules\IndennitaResponsabilita\Models\RatingMorph
 *
 * @property int $id
 * @property int|null $user_id
 * @property int|null $value
 * @property string|null $note
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $created_by
 * @property string|null $updated_by
 * @property string|null $model_type
 * @property int|null $model_id
 * @property int|null $rating_id
 * @property-read \Modules\Rating\Models\Rating|null $rating
 *
 * @method static \Illuminate\Database\Eloquent\Builder|RatingMorph newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RatingMorph newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RatingMorph query()
 * @method static \Illuminate\Database\Eloquent\Builder|RatingMorph whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RatingMorph whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RatingMorph whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RatingMorph whereModelId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RatingMorph whereModelType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RatingMorph whereNote($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RatingMorph whereRatingId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RatingMorph whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RatingMorph whereUpdatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RatingMorph whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RatingMorph whereValue($value)
 *
 * @mixin \Eloquent
 */
class RatingMorph extends PtvRatingMorphModel
{
    protected $connection = 'indennita_responsabilita'; // this will use the specified database connection

    // -------------------------------------------------
}
