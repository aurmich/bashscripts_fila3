<?php

declare(strict_types=1);

namespace Modules\IndennitaResponsabilita\Models;

use Modules\Rating\Models\Rating as BaseRatingModel;

/**
 * Modules\IndennitaResponsabilita\Models\Rating
 *
 * @property int $id
 * @property string|null $title
 * @property string|null $color
 * @property string|null $icon
 * @property string|null $txt
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $created_by
 * @property string|null $updated_by
 * @property \Spatie\SchemalessAttributes\SchemalessAttributes|null $extra_attributes
 * @property \Modules\Rating\Enums\RuleEnum|null $rule
 * @property bool|null $is_disabled
 * @property bool|null $is_readonly
 * @property int|null $order_column
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Rating newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Rating newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Rating query()
 * @method static \Illuminate\Database\Eloquent\Builder|Rating whereColor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rating whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rating whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rating whereExtraAttributes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rating whereIcon($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rating whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rating whereIsDisabled($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rating whereIsReadonly($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rating whereOrderColumn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rating whereRule($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rating whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rating whereTxt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rating whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rating whereUpdatedBy($value)
 * @method static Builder|Rating withExtraAttributes()
 *
 * @mixin \Eloquent
 */
class Rating extends BaseRatingModel
{
    protected $connection = 'indennita_responsabilita'; // this will use the specified database connection

    // -------------------------------------------------
}
