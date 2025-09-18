<?php

declare(strict_types=1);

<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
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
=======
namespace Modules\Notify\Models;
>>>>>>> d79d9e57 (first)

use Illuminate\Database\Eloquent\Relations\MorphPivot;
=======
namespace Modules\User\Models;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\MorphPivot;
use Modules\Xot\Actions\Factory\GetFactoryAction;
>>>>>>> 0d55b583 (first)
=======
namespace Modules\Rating\Models;

use Illuminate\Database\Eloquent\Relations\MorphPivot;
>>>>>>> 2df6fbc8 (first)
use Modules\Xot\Traits\Updater;

/**
 * Class BaseMorphPivot.
 */
abstract class BaseMorphPivot extends MorphPivot
{
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> 2df6fbc8 (first)
    use Updater;

    /**
     * Indicates whether attributes are snake cased on arrays.
     *
<<<<<<< HEAD
<<<<<<< HEAD
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
=======
     * @see https://laravel-news.com/6-eloquent-secrets
>>>>>>> d79d9e57 (first)
=======
    use HasFactory;
    use Updater;

    // use HasUuids;

    /** @var bool */
    public $incrementing = true;

    /** @var bool */
    public $timestamps = true;

    /**
     * Indicates whether attributes are snake cased on arrays.
     *
     * @see https://laravel-news.com/6-eloquent-secrets
>>>>>>> 0d55b583 (first)
=======
     * @see  https://laravel-news.com/6-eloquent-secrets
>>>>>>> 2df6fbc8 (first)
     *
     * @var bool
     */
    public static $snakeAttributes = true;

<<<<<<< HEAD
<<<<<<< HEAD
    /** @var bool */
    public $incrementing = true;

<<<<<<< HEAD
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
=======
    /** @var bool */
    public $timestamps = true;

>>>>>>> d79d9e57 (first)
=======
    /** @var bool */
    public $incrementing = true;

    /** @var bool */
    public $timestamps = true;

>>>>>>> 2df6fbc8 (first)
    /** @var int */
    protected $perPage = 30;

    /** @var string */
<<<<<<< HEAD
<<<<<<< HEAD
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
=======
    protected $connection = 'notify';
>>>>>>> d79d9e57 (first)
=======
    /**
     * The number of models to return for pagination.
     *
     * @var int
     */
    protected $perPage = 30;

    /** @var string */
    protected $connection = 'user';
>>>>>>> 0d55b583 (first)
=======
    protected $connection = 'rating';
>>>>>>> 2df6fbc8 (first)

    /** @var list<string> */
    protected $appends = [];

    /** @var string */
    protected $primaryKey = 'id';

    /** @var string */
    protected $keyType = 'string';

    /** @var list<string> */
=======
namespace Modules\Ptv\Models;

use Illuminate\Database\Eloquent\Relations\MorphPivot;
use Modules\Xot\Traits\Updater;

abstract class BaseMorphPivot extends MorphPivot
{
    use Updater;

    protected $connection = 'ptv'; // this will use the specified database connection

    protected $appends = [];

    protected $primaryKey = 'id';

    public $incrementing = true;

    public $timestamps = true;

>>>>>>> dc18abbe (first)
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
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
    public function casts(): array
=======
    protected function casts(): array
>>>>>>> bbec4378 (first)
=======
    public function casts(): array
>>>>>>> 2df6fbc8 (first)
    {
        return [
            'id' => 'string',
            'uuid' => 'string', 'created_at' => 'datetime', 'updated_at' => 'datetime', 'deleted_at' => 'datetime'];
<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
    /**
     * Create a new factory instance for the model.
     *
     * @return Factory<static>
     */
    protected static function newFactory()
    {
        // return app(\Modules\Xot\Actions\Factory\GetFactoryAction::class)->execute(static::class);
        return app(GetFactoryAction::class)->execute(static::class);
    }

>>>>>>> 0d55b583 (first)
    /** @return array<string, string> */
    protected function casts(): array
    {
        return [
            'id' => 'string', // must be string else primary key of related model will be typed as int
<<<<<<< HEAD
            'uuid' => 'string',

=======
    protected function casts(): array
=======
    public function casts(): array
>>>>>>> d79d9e57 (first)
    {
        return [
            'id' => 'string',
            'uuid' => 'string',
<<<<<<< HEAD
>>>>>>> c088001a (first)
=======
>>>>>>> d79d9e57 (first)
=======
>>>>>>> 0d55b583 (first)
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
            'deleted_at' => 'datetime',

            'updated_by' => 'string',
            'created_by' => 'string',
            'deleted_by' => 'string',
        ];
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> 59bc4fe7 (first)
=======
>>>>>>> bbec4378 (first)
=======
>>>>>>> c088001a (first)
=======
>>>>>>> d79d9e57 (first)
=======
>>>>>>> 0d55b583 (first)
=======
>>>>>>> 2df6fbc8 (first)
=======
    public function casts(): array
    {
        return [
            'created_at' => 'datetime', 'updated_at' => 'datetime', 'deleted_at' => 'datetime',
        ];
>>>>>>> dc18abbe (first)
    }
}
