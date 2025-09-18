<?php

declare(strict_types=1);

<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
namespace Modules\Rating\Models;
=======
namespace Modules\Xot\Models;
>>>>>>> 59bc4fe7 (first)
=======
namespace Modules\Lang\Models;
>>>>>>> bbec4378 (first)
=======
namespace Modules\Job\Models;
>>>>>>> c088001a (first)

use Illuminate\Database\Eloquent\Relations\MorphPivot;
use Modules\Xot\Traits\Updater;

/**
 * Class BaseMorphPivot.
 */
abstract class BaseMorphPivot extends MorphPivot
{
    use Updater;

    /**
     * Indicates whether attributes are snake cased on arrays.
     *
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
     * @see  https://laravel-news.com/6-eloquent-secrets
=======
     * @see https://laravel-news.com/6-eloquent-secrets
>>>>>>> 59bc4fe7 (first)
=======
     * @see  https://laravel-news.com/6-eloquent-secrets
>>>>>>> bbec4378 (first)
=======
     * @see https://laravel-news.com/6-eloquent-secrets
>>>>>>> c088001a (first)
     *
     * @var bool
     */
    public static $snakeAttributes = true;

    /** @var bool */
    public $incrementing = true;

<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
    /** @var bool */
    public $timestamps = true;

=======
>>>>>>> 59bc4fe7 (first)
=======
    /** @var bool */
    public $timestamps = true;

>>>>>>> c088001a (first)
    /** @var int */
    protected $perPage = 30;

    /** @var string */
<<<<<<< HEAD
<<<<<<< HEAD
    protected $connection = 'rating';
=======
    protected $connection = 'xot';
>>>>>>> 59bc4fe7 (first)
=======
    /** @var bool */
    public $timestamps = true;

    /** @var int */
    protected $perPage = 30;

    protected $connection = 'lang';
>>>>>>> bbec4378 (first)
=======
    protected $connection = 'job';
>>>>>>> c088001a (first)

    /** @var list<string> */
    protected $appends = [];

    /** @var string */
    protected $primaryKey = 'id';

    /** @var string */
    protected $keyType = 'string';

    /** @var list<string> */
    protected $fillable = [
        'id',
        'post_id', 'post_type',
        'related_type',
        'user_id',
        'note',
    ];

<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
    public function casts(): array
=======
    protected function casts(): array
>>>>>>> bbec4378 (first)
    {
        return [
            'id' => 'string',
            'uuid' => 'string', 'created_at' => 'datetime', 'updated_at' => 'datetime', 'deleted_at' => 'datetime'];
<<<<<<< HEAD
=======
    /** @return array<string, string> */
    protected function casts(): array
    {
        return [
            'id' => 'string', // must be string else primary key of related model will be typed as int
            'uuid' => 'string',

=======
    protected function casts(): array
    {
        return [
            'id' => 'string',
            'uuid' => 'string',
>>>>>>> c088001a (first)
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
            'deleted_at' => 'datetime',

            'updated_by' => 'string',
            'created_by' => 'string',
            'deleted_by' => 'string',
        ];
<<<<<<< HEAD
>>>>>>> 59bc4fe7 (first)
=======
>>>>>>> bbec4378 (first)
=======
>>>>>>> c088001a (first)
    }
}
