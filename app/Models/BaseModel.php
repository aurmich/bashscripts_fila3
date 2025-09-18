<?php

declare(strict_types=1);

<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
namespace Modules\Rating\Models;

use Illuminate\Database\Eloquent\Model;
=======
namespace Modules\Xot\Models;

=======
namespace Modules\Lang\Models;

// use GeneaLabs\LaravelModelCaching\Traits\Cachable;
>>>>>>> bbec4378 (first)
// use Laravel\Scout\Searchable;
// ---------- traits
=======
namespace Modules\Media\Models;

>>>>>>> c986cc10 (first)
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\Xot\Actions\Factory\GetFactoryAction;
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> 59bc4fe7 (first)
=======
>>>>>>> bbec4378 (first)
=======
namespace Modules\Job\Models;
=======
namespace Modules\Notify\Models;
>>>>>>> d79d9e57 (first)
=======
namespace Modules\User\Models;
>>>>>>> 0d55b583 (first)
=======
namespace Modules\Tenant\Models;
>>>>>>> 8fc3049b (first)

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> c088001a (first)
use Modules\Xot\Traits\Updater;
=======
use Modules\Xot\Traits\Updater;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
>>>>>>> d79d9e57 (first)
=======
use Modules\Xot\Models\Traits\RelationX;
use Modules\Xot\Traits\Updater;
>>>>>>> 0d55b583 (first)
=======
namespace Modules\Setting\Models;

// ---------- traits
use Illuminate\Database\Eloquent\Factories\Factory;
=======
namespace Modules\Badge\Models;

use GeneaLabs\LaravelModelCaching\Traits\Cachable;
use Illuminate\Database\Eloquent\Factories\Factory;
// ---------- traits
>>>>>>> 7e417e87 (first)
use Illuminate\Database\Eloquent\Factories\HasFactory;
// //use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;
use Modules\Xot\Traits\Updater;
<<<<<<< HEAD
>>>>>>> 9cec72d6 (first)
=======
namespace Modules\Rating\Models;

use Illuminate\Database\Eloquent\Model;
use Modules\Xot\Traits\Updater;
>>>>>>> 2df6fbc8 (first)
=======
use Modules\Xot\Traits\Updater;
>>>>>>> c986cc10 (first)
=======
use Modules\Xot\Traits\Updater;
>>>>>>> 8fc3049b (first)
=======
>>>>>>> 7e417e87 (first)
=======
namespace Modules\Incentivi\Models;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// //use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;
use Modules\Xot\Models\Traits\RelationX;
use Modules\Xot\Traits\Updater;
>>>>>>> 15ea09e2 (first)

/**
 * Class BaseModel.
 */
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
abstract class BaseModel extends Model
{
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
>>>>>>> c088001a (first)
=======
abstract class BaseModel extends Model
{
>>>>>>> c986cc10 (first)
    use HasFactory;

    // use Searchable;
    // //use Cachable;
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> 59bc4fe7 (first)
=======
=======
abstract class BaseModel extends Model
{
>>>>>>> 7e417e87 (first)
    use HasFactory;

    // use Searchable;
    // use Cachable;
<<<<<<< HEAD
>>>>>>> bbec4378 (first)
=======
>>>>>>> c088001a (first)
=======
abstract class BaseModel extends Model implements HasMedia
{
    // use Searchable;
    use HasFactory;
    use InteractsWithMedia;
>>>>>>> d79d9e57 (first)
=======
abstract class BaseModel extends Model
{
    use HasFactory;
    use RelationX;
>>>>>>> 0d55b583 (first)
=======
abstract class BaseModel extends Model
{
    // use Searchable;
    // use Cachable;
    use HasFactory;
>>>>>>> 9cec72d6 (first)
=======
abstract class BaseModel extends Model
{
>>>>>>> 2df6fbc8 (first)
=======
>>>>>>> c986cc10 (first)
=======
abstract class BaseModel extends Model
{
    use HasFactory;
>>>>>>> 8fc3049b (first)
=======
abstract class BaseModel extends Model
{
    // use Searchable;
    // //use Cachable;
    use HasFactory;
    use RelationX;
>>>>>>> 15ea09e2 (first)
    use Updater;

    /**
     * Indicates whether attributes are snake cased on arrays.
     *
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
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
     * @see https://laravel-news.com/6-eloquent-secrets
>>>>>>> 0d55b583 (first)
=======
     * @see https://laravel-news.com/6-eloquent-secrets
>>>>>>> 9cec72d6 (first)
=======
     * @see  https://laravel-news.com/6-eloquent-secrets
>>>>>>> 2df6fbc8 (first)
=======
     * @see https://laravel-news.com/6-eloquent-secrets
>>>>>>> c986cc10 (first)
=======
     * @see https://laravel-news.com/6-eloquent-secrets
>>>>>>> 8fc3049b (first)
=======
     * @see https://laravel-news.com/6-eloquent-secrets
>>>>>>> 15ea09e2 (first)
     *
     * @var bool
     */
    public static $snakeAttributes = true;

<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> bbec4378 (first)
=======
>>>>>>> c088001a (first)
=======
>>>>>>> d79d9e57 (first)
=======
>>>>>>> 0d55b583 (first)
=======
>>>>>>> 9cec72d6 (first)
=======
>>>>>>> 2df6fbc8 (first)
=======
>>>>>>> c986cc10 (first)
=======
>>>>>>> 8fc3049b (first)
=======
>>>>>>> 15ea09e2 (first)
    /** @var bool */
    public $incrementing = true;

    /** @var bool */
    public $timestamps = true;

    /** @var int */
    protected $perPage = 30;

    /** @var string */
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
    protected $connection = 'rating';
=======
    public $incrementing = true;

    public $timestamps = true;

    protected $perPage = 30;

    protected $connection = 'xot';
>>>>>>> 59bc4fe7 (first)
=======
    protected $connection = 'lang';
>>>>>>> bbec4378 (first)
=======
    protected $connection = 'job';

    /** @var string|null */
    protected $prefix;
>>>>>>> c088001a (first)
=======
    protected $connection = 'rating';
>>>>>>> 2df6fbc8 (first)

    /** @var list<string> */
    protected $fillable = ['id'];

<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> bbec4378 (first)
=======
>>>>>>> c088001a (first)
=======
    protected $connection = 'notify';
=======
    protected $connection = 'user';
>>>>>>> 0d55b583 (first)
=======
    protected $connection = 'setting';
>>>>>>> 9cec72d6 (first)
=======
    protected $connection = 'setting';
>>>>>>> 8fc3049b (first)
=======
    protected $connection = 'incentivi';

    /** @return array<string, string> */
    public function casts(): array
    {
        return [
            'published_at' => 'datetime',
            'verified_at' => 'datetime',

            'created_at' => 'datetime',
            'updated_at' => 'datetime',
            'deleted_at' => 'datetime',

            'updated_by' => 'string',
            'created_by' => 'string',
            'deleted_by' => 'string',
        ];
    }
>>>>>>> 15ea09e2 (first)

    /** @var list<string> */
    protected $appends = [];

<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> d79d9e57 (first)
=======
>>>>>>> 0d55b583 (first)
=======
>>>>>>> 9cec72d6 (first)
=======
>>>>>>> 2df6fbc8 (first)
=======
    protected $connection = 'media';

    /** @var list<string> */
    protected $fillable = [
        'id',
    ];

>>>>>>> c986cc10 (first)
=======
>>>>>>> 8fc3049b (first)
    /** @var string */
    protected $primaryKey = 'id';

    /** @var string */
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
    protected $primaryKey = 'id';

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
>>>>>>> 9cec72d6 (first)
=======
>>>>>>> 2df6fbc8 (first)
=======
>>>>>>> c986cc10 (first)
=======
>>>>>>> 8fc3049b (first)
    protected $keyType = 'string';

    /** @var list<string> */
=======
    use Updater;

    protected $connection = 'badge';

    /**
     * @var list<string>
     */
    protected $fillable = ['id'];

    /**
     * @var array<string, string>
     */
    protected $casts = ['published_at' => 'datetime', 'created_at' => 'datetime', 'updated_at' => 'datetime'];

    /**
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * @var bool
     */
    public $incrementing = true;

    /**
     * @var list<string>
     */
>>>>>>> 7e417e87 (first)
=======
    /** @var string */
    protected $primaryKey = 'id';

    /** @var list<string> */
>>>>>>> 15ea09e2 (first)
    protected $hidden = [
        // 'password'
    ];

<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
    /** @return array<string, string> */
    public function casts(): array
=======
    public function __construct(array $attributes = [])
    {
        if (isset($this->prefix)) {
            $this->table = $this->prefix.$this->table;
        }

        parent::__construct($attributes);
    }

    /**
     * ----
=======
    /**
>>>>>>> d79d9e57 (first)
     * Create a new factory instance for the model.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory<static>
=======
=======
>>>>>>> 15ea09e2 (first)
    /**
     * @see vendor/ laravel / framework / src / Illuminate / Database / Eloquent / Factories / HasFactory.php
     * Create a new factory instance for the model.
     *
     * @return Factory<static>
<<<<<<< HEAD
>>>>>>> 0d55b583 (first)
=======
>>>>>>> 15ea09e2 (first)
     */
    protected static function newFactory()
    {
        return app(\Modules\Xot\Actions\Factory\GetFactoryAction::class)->execute(static::class);
    }
<<<<<<< HEAD

    /** @return array<string, string> */
<<<<<<< HEAD
<<<<<<< HEAD
    protected function casts(): array
>>>>>>> c088001a (first)
=======
    public function casts(): array
>>>>>>> d79d9e57 (first)
=======
    protected function casts(): array
>>>>>>> 0d55b583 (first)
=======
    /** @return array<string, string> */
    public function casts(): array
>>>>>>> 2df6fbc8 (first)
=======
    /**
     * ----
     * Create a new factory instance for the model.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory<static>
     */
    protected static function newFactory()
    {
        return app(GetFactoryAction::class)->execute(static::class);
    }

    /** @return array<string, string> */
    protected function casts(): array
>>>>>>> c986cc10 (first)
    {
        return [
            'id' => 'string',
            'uuid' => 'string',
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> 2df6fbc8 (first)
            // 'published_at' => 'datetime:Y-m-d', // da verificare
            'published_at' => 'datetime',
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
<<<<<<< HEAD
=======
    /**
     * Create a new factory instance for the model.
     *
     * @return Factory<static>
     */
    protected static function newFactory(): Factory
    {
        // return app(\Modules\Xot\Actions\Factory\GetFactoryAction::class)->execute(static::class);
        return app(GetFactoryAction::class)->execute(static::class);
    }

    /** @return array<string, class-string|string> */
    protected function casts(): array
    {
        return [
=======
>>>>>>> c088001a (first)
            'published_at' => 'datetime',
=======
            'published_at' => 'datetime',

            'verified_at' => 'datetime',
>>>>>>> d79d9e57 (first)
=======

            'published_at' => 'datetime',
            'verified_at' => 'datetime',

>>>>>>> 0d55b583 (first)
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
            'deleted_at' => 'datetime',

            'updated_by' => 'string',
            'created_by' => 'string',
            'deleted_by' => 'string',
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> 59bc4fe7 (first)
        ];
=======
=======
>>>>>>> 9cec72d6 (first)
=======
>>>>>>> 8fc3049b (first)
=======
    /**
     * @var bool
     */
    public $timestamps = true;

>>>>>>> 7e417e87 (first)
    /**
     * Create a new factory instance for the model.
     *
     * @return Factory
     */
    protected static function newFactory()
    {
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        return app(GetFactoryAction::class)->execute(static::class);
    }

    /**
     * @return array<string, string> */
=======
=======
>>>>>>> 8fc3049b (first)
        return app(\Modules\Xot\Actions\Factory\GetFactoryAction::class)->execute(static::class);
    }

    /** @return array<string, string> */
<<<<<<< HEAD
>>>>>>> 9cec72d6 (first)
    protected function casts(): array
    {
        return [
            'id' => 'string',
<<<<<<< HEAD
            'uuid' => 'string', 'published_at' => 'datetime', 'created_at' => 'datetime', 'updated_at' => 'datetime'];
>>>>>>> bbec4378 (first)
=======
        ];
>>>>>>> c088001a (first)
=======
        ];
>>>>>>> d79d9e57 (first)
=======
        ];
>>>>>>> 0d55b583 (first)
=======
=======
    public function casts(): array
    {
        return [
            'id' => 'string',
>>>>>>> 8fc3049b (first)
            'uuid' => 'string',
            'published_at' => 'datetime',

            'verified_at' => 'datetime',

            'created_at' => 'datetime',
            'updated_at' => 'datetime',
<<<<<<< HEAD
=======
            'published_at' => 'datetime',
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
>>>>>>> c986cc10 (first)
=======
>>>>>>> 8fc3049b (first)
            'deleted_at' => 'datetime',

            'updated_by' => 'string',
            'created_by' => 'string',
            'deleted_by' => 'string',
        ];
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> 9cec72d6 (first)
=======
        ];
>>>>>>> 2df6fbc8 (first)
=======
>>>>>>> c986cc10 (first)
=======
>>>>>>> 8fc3049b (first)
    }
=======
        return app(\Modules\Xot\Actions\Factory\GetFactoryAction::class)->execute(static::class);
    }
>>>>>>> 7e417e87 (first)
=======
>>>>>>> 15ea09e2 (first)
}
