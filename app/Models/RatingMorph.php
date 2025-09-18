<?php

declare(strict_types=1);

<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> bc2abf99 (.)
namespace Modules\Rating\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Modules\Xot\Datas\XotData;
<<<<<<< HEAD
<<<<<<< HEAD
use Modules\Xot\Contracts\ProfileContract;
=======
>>>>>>> 2df6fbc8 (first)
=======
>>>>>>> bc2abf99 (.)

/**
 * Modules\Rating\Models\RatingMorph.
 *
 * @property int                             $id
 * @property bool                            $is_winner
 * @property string|null                     $post_type
 * @property int|null                        $post_id
 * @property string|null                     $related_type
 * @property int|null                        $related_id
 * @property Rating|null                     $rating
 * @property string|null                     $created_by
 * @property string|null                     $updated_by
 * @property string|null                     $deleted_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int|null                        $auth_user_id
<<<<<<< HEAD
=======
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
>>>>>>> e0005d7d (first)
=======
>>>>>>> bc2abf99 (.)
 *
 * @method static \Illuminate\Database\Eloquent\Builder|RatingMorph newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RatingMorph newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RatingMorph query()
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> bc2abf99 (.)
 * @method static \Illuminate\Database\Eloquent\Builder|RatingMorph whereAuthUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RatingMorph whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RatingMorph whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RatingMorph whereDeletedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RatingMorph whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RatingMorph wherePostId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RatingMorph wherePostType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RatingMorph whereRating($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RatingMorph whereRelatedId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RatingMorph whereRelatedType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RatingMorph whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RatingMorph whereUpdatedBy($value)
 *
 * @property string|null $user_id
 * @property string|null $model_type
 * @property int|null    $model_id
 * @property int         $rating_id
 * @property int|null    $value
 * @property string|null $note
 * @property string|null $deleted_at
 *
 * @method static \Illuminate\Database\Eloquent\Builder|RatingMorph whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RatingMorph whereIsWinner($value)
<<<<<<< HEAD
=======
 * @method static \Illuminate\Database\Eloquent\Builder|RatingMorph whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RatingMorph whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RatingMorph whereId($value)
>>>>>>> e0005d7d (first)
=======
>>>>>>> bc2abf99 (.)
 * @method static \Illuminate\Database\Eloquent\Builder|RatingMorph whereModelId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RatingMorph whereModelType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RatingMorph whereNote($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RatingMorph whereRatingId($value)
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> bc2abf99 (.)
 * @method static \Illuminate\Database\Eloquent\Builder|RatingMorph whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RatingMorph whereValue($value)
 *
 * @property \Illuminate\Database\Eloquent\Model|\Eloquent $model
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD:app/Models/RatingMorph.php
<<<<<<< HEAD
 * @property \Illuminate\Database\Eloquent\Model|null $profile
=======
 * @property \Modules\Blog\Models\Profile|null             $profile
>>>>>>> 6a338e09 (Merge commit 'e1d791bbad6512f4a9dade9d330c2e1ce0a99418' as 'laravel/Modules/Rating')
=======
 * @property ProfileContract|null                          $profile
>>>>>>> 1d35aa92 (.):laravel/Modules/Rating/app/Models/RatingMorph.php
=======
 * @property \Illuminate\Database\Eloquent\Model|null $profile
>>>>>>> 2df6fbc8 (first)
=======
 * @property \Modules\Blog\Models\Profile|null             $profile
>>>>>>> bc2abf99 (.)
 * @property \Modules\Xot\Contracts\UserContract|null      $user
 * @property string                                        $reward
 *
 * @method static \Illuminate\Database\Eloquent\Builder|RatingMorph whereReward($value)
 *
 * @property \Modules\Xot\Contracts\ProfileContract|null $creator
 * @property \Modules\Xot\Contracts\ProfileContract|null $updater
 *
 * @mixin \Eloquent
 * @mixin Eloquent
 */
class RatingMorph extends BaseMorphPivot
{
    /** @var list<string> */
    protected $fillable = [
        'id',
        'model_id', 'model_type',
        'rating_id',
        'user_id',
        'note',
        'value',
        'is_winner',
        'reward',
    ];
    // -------- RELATIONSHIP -----------

    public function rating(): BelongsTo
    {
        return $this->belongsTo(Rating::class, 'rating_id');
    }

    public function user(): BelongsTo
    {
        $user_class = XotData::make()->getUserClass();

        return $this->belongsTo($user_class, 'user_id');
    }

    public function profile(): BelongsTo
    {
        $profile_class = XotData::make()->getProfileClass();

        return $this->belongsTo($profile_class, 'user_id', 'user_id');
    }

    public function model(): MorphTo
    {
        return $this->morphTo('model');
    }
<<<<<<< HEAD
=======
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
>>>>>>> e0005d7d (first)
=======
>>>>>>> bc2abf99 (.)
}
