<?php

declare(strict_types=1);

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
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\Xot\Actions\Factory\GetFactoryAction;
<<<<<<< HEAD
>>>>>>> 59bc4fe7 (first)
=======
>>>>>>> bbec4378 (first)
=======
namespace Modules\Job\Models;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
>>>>>>> c088001a (first)
use Modules\Xot\Traits\Updater;

/**
 * Class BaseModel.
 */
abstract class BaseModel extends Model
{
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
>>>>>>> c088001a (first)
    use HasFactory;

    // use Searchable;
    // //use Cachable;
<<<<<<< HEAD
>>>>>>> 59bc4fe7 (first)
=======
    use HasFactory;

    // use Searchable;
    // use Cachable;
>>>>>>> bbec4378 (first)
=======
>>>>>>> c088001a (first)
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

<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> bbec4378 (first)
=======
>>>>>>> c088001a (first)
    /** @var bool */
    public $incrementing = true;

    /** @var bool */
    public $timestamps = true;

    /** @var int */
    protected $perPage = 30;

    /** @var string */
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

    /** @var list<string> */
    protected $fillable = ['id'];

<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> bbec4378 (first)
=======
>>>>>>> c088001a (first)
    /** @var string */
    protected $primaryKey = 'id';

    /** @var string */
<<<<<<< HEAD
<<<<<<< HEAD
=======
    protected $primaryKey = 'id';

>>>>>>> 59bc4fe7 (first)
=======
>>>>>>> bbec4378 (first)
=======
>>>>>>> c088001a (first)
    protected $keyType = 'string';

    /** @var list<string> */
    protected $hidden = [
        // 'password'
    ];

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
     * Create a new factory instance for the model.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory<static>
     */
    protected static function newFactory()
    {
        return app(\Modules\Xot\Actions\Factory\GetFactoryAction::class)->execute(static::class);
    }

    /** @return array<string, string> */
    protected function casts(): array
>>>>>>> c088001a (first)
    {
        return [
            'id' => 'string',
            'uuid' => 'string',
<<<<<<< HEAD
            // 'published_at' => 'datetime:Y-m-d', // da verificare
            'published_at' => 'datetime',
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
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
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
            'deleted_at' => 'datetime',

            'updated_by' => 'string',
            'created_by' => 'string',
            'deleted_by' => 'string',
<<<<<<< HEAD
>>>>>>> 59bc4fe7 (first)
        ];
=======
    /**
     * Create a new factory instance for the model.
     *
     * @return Factory
     */
    protected static function newFactory()
    {
        return app(GetFactoryAction::class)->execute(static::class);
    }

    /**
     * @return array<string, string> */
    protected function casts(): array
    {
        return [
            'id' => 'string',
            'uuid' => 'string', 'published_at' => 'datetime', 'created_at' => 'datetime', 'updated_at' => 'datetime'];
>>>>>>> bbec4378 (first)
=======
        ];
>>>>>>> c088001a (first)
    }
}
