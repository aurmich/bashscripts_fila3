<?php

declare(strict_types=1);

namespace Modules\Progressioni\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Carbon;

/**
 * Modules\Progressioni\Models\Message.
 *
 * @property int $id
 * @property string|null $type
 * @property string|null $title
 * @property string|null $txt
 * @property string|null $anno
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $created_by
 * @property string|null $updated_by
 *
 * @method static \Modules\Progressioni\Database\Factories\MessageFactory factory($count = null, $state = [])
 * @method static Builder|Message newModelQuery()
 * @method static Builder|Message newQuery()
 * @method static Builder|Message query()
 * @method static Builder|Message whereAnno($value)
 * @method static Builder|Message whereCreatedAt($value)
 * @method static Builder|Message whereCreatedBy($value)
 * @method static Builder|Message whereId($value)
 * @method static Builder|Message whereTitle($value)
 * @method static Builder|Message whereTxt($value)
 * @method static Builder|Message whereType($value)
 * @method static Builder|Message whereUpdatedAt($value)
 * @method static Builder|Message whereUpdatedBy($value)
 *
 * @mixin \Eloquent
 */
class Message extends BaseModel
{
    protected $table = 'messages';

    // public $timestamps= false;
    protected $fillable =
        [
            'id',
            'type',
            'title',
            'txt',
            'anno',
        ];
}
