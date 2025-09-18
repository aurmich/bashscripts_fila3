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
=======
namespace Modules\Progressioni\Models;
>>>>>>> bcab6efe (first)
=======
namespace Modules\Progressioni\Models;
>>>>>>> f3d4311a (Squashed 'laravel/Modules/Progressioni/' content from commit 72d99eef1)
=======
namespace Modules\User\Models;
>>>>>>> e83070fd (.)

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
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
=======
namespace Modules\Legge104\Models;
>>>>>>> 6907d18e (first)
=======
namespace Modules\Mensa\Models;
>>>>>>> c6af2eee (first)
=======
namespace Modules\Prenotazioni\Models;
>>>>>>> 4658bb86 (first)

use GeneaLabs\LaravelModelCaching\Traits\Cachable;
use Illuminate\Database\Eloquent\Factories\Factory;
// ---------- traits
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> 7e417e87 (first)
=======
>>>>>>> 6907d18e (first)
=======
>>>>>>> c6af2eee (first)
=======
>>>>>>> 4658bb86 (first)
use Illuminate\Database\Eloquent\Factories\HasFactory;
// //use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;
use Modules\Xot\Traits\Updater;
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
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
=======
>>>>>>> 6907d18e (first)
=======
>>>>>>> c6af2eee (first)
=======
namespace Modules\MobilitaVolontaria\Models;

use Illuminate\Database\Eloquent\Factories\Factory;
use GeneaLabs\LaravelModelCaching\Traits\Cachable;
// ---------- traits
use Illuminate\Database\Eloquent\Factories\HasFactory;
// //use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;
// use Modules\Xot\Services\FactoryService;
use Modules\Xot\Traits\Updater;
>>>>>>> 8e6e7d4c (first)
=======
>>>>>>> 4658bb86 (first)
=======
use Modules\Xot\Models\Traits\RelationX;
use Modules\Xot\Traits\Updater;
>>>>>>> e83070fd (.)

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
=======
abstract class BaseModel extends Model
{
>>>>>>> 6907d18e (first)
=======
abstract class BaseModel extends Model
{
>>>>>>> c6af2eee (first)
=======
abstract class BaseModel extends Model
{
>>>>>>> 4658bb86 (first)
    use HasFactory;

    // use Searchable;
    // use Cachable;
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
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
=======
>>>>>>> e83070fd (.)
abstract class BaseModel extends Model
{
    use HasFactory;
    use RelationX;
<<<<<<< HEAD
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
=======
>>>>>>> e83070fd (.)
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
=======
     * @see https://laravel-news.com/6-eloquent-secrets
>>>>>>> e83070fd (.)
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
=======
>>>>>>> e83070fd (.)
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
=======
    protected $connection = 'user';
>>>>>>> e83070fd (.)

    /** @var list<string> */
    protected $appends = [];

<<<<<<< HEAD
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
=======
>>>>>>> e83070fd (.)
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
=======
    use Updater;

    protected $connection = 'legge_104'; // this will use the specified database connection

    /**
     * @var string[]
>>>>>>> 6907d18e (first)
=======
    use Updater;

    protected $connection = 'mensa'; // this will use the specified database connection

    /**
     * @var list<string>
>>>>>>> c6af2eee (first)
     */
    protected $fillable = ['id'];

=======
abstract class BaseModel extends Model {
    use HasFactory;
    // use Searchable;
    // use Cachable;
    use Updater;

    protected $connection = 'mobilita_volontaria'; // this will use the specified database connection

    /**
     * @var list<string>
     */
    protected $fillable = ['id'];
    
>>>>>>> 8e6e7d4c (first)
=======
    use Updater;

    protected $connection = 'prenotazioni';

    /**
     * @var string[]
     */
    protected $fillable = ['id'];

>>>>>>> 4658bb86 (first)
    /**
     * @var array<string, string>
     */
    protected $casts = ['published_at' => 'datetime', 'created_at' => 'datetime', 'updated_at' => 'datetime'];
<<<<<<< HEAD
<<<<<<< HEAD

=======
>>>>>>> 8e6e7d4c (first)
=======

>>>>>>> 4658bb86 (first)
    /**
     * @var string
     */
    protected $primaryKey = 'id';
<<<<<<< HEAD
<<<<<<< HEAD

=======
    
>>>>>>> 8e6e7d4c (first)
=======

>>>>>>> 4658bb86 (first)
    /**
     * @var bool
     */
    public $incrementing = true;
<<<<<<< HEAD
<<<<<<< HEAD

    /**
<<<<<<< HEAD
<<<<<<< HEAD
     * @var list<string>
     */
>>>>>>> 7e417e87 (first)
=======
    /** @var string */
    protected $primaryKey = 'id';

    /** @var list<string> */
>>>>>>> 15ea09e2 (first)
=======
namespace Modules\IndennitaCondizioniLavoro\Models;
=======
namespace Modules\IndennitaResponsabilita\Models;
>>>>>>> e0005d7d (first)

use Illuminate\Database\Eloquent\Model;
=======
>>>>>>> bcab6efe (first)
=======
>>>>>>> f3d4311a (Squashed 'laravel/Modules/Progressioni/' content from commit 72d99eef1)
// use Laravel\Scout\Searchable;
// ---------- traits
use Modules\Xot\Traits\Updater;

abstract class BaseModel extends Model
{
<<<<<<< HEAD
<<<<<<< HEAD
    use Updater;

    // use Searchable;
<<<<<<< HEAD
    protected $connection = 'indennita_condizioni_lavoro';

    // this will use the specified database connection
=======
    protected $connection = 'indennita_responsabilita';

>>>>>>> e0005d7d (first)
    protected $fillable = ['id'];

    protected $casts = ['published_at' => 'datetime', 'created_at' => 'datetime', 'updated_at' => 'datetime'];
=======
namespace Modules\Ptv\Models;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;
use Modules\Xot\Traits\Updater;

abstract class BaseModel extends Model
{
    use HasFactory;

    // use Searchable;
    use Updater;

    protected $connection = 'ptv'; // this will use the specified database connection

    protected $fillable = ['id'];

    public function casts(): array
    {
        return [
            'published_at' => 'datetime', 'created_at' => 'datetime', 'updated_at' => 'datetime',
        ];
    }
>>>>>>> dc18abbe (first)

    protected $primaryKey = 'id';

    public $incrementing = true;

<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> b7483fd0 (first)
=======
>>>>>>> e0005d7d (first)
=======
     * @var array<int, string>
     */
>>>>>>> 6907d18e (first)
=======
     * @var list<string>
     */
>>>>>>> c6af2eee (first)
=======

    /**
     * @var array<int, string>
     */
>>>>>>> 4658bb86 (first)
=======
>>>>>>> dc18abbe (first)
=======
    protected $keyType = 'string';

    /** @var list<string> */
>>>>>>> e83070fd (.)
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
=======
>>>>>>> e83070fd (.)
    /**
     * @see vendor/ laravel / framework / src / Illuminate / Database / Eloquent / Factories / HasFactory.php
     * Create a new factory instance for the model.
     *
     * @return Factory<static>
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> 0d55b583 (first)
=======
>>>>>>> 15ea09e2 (first)
=======
>>>>>>> e83070fd (.)
     */
    protected static function newFactory()
    {
        return app(\Modules\Xot\Actions\Factory\GetFactoryAction::class)->execute(static::class);
    }
<<<<<<< HEAD
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
=======

    /** @return array<string, string> */
    protected function casts(): array
>>>>>>> e83070fd (.)
    {
        return [
            'id' => 'string',
            'uuid' => 'string',
<<<<<<< HEAD
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
=======
>>>>>>> e83070fd (.)

            'published_at' => 'datetime',
            'verified_at' => 'datetime',

<<<<<<< HEAD
>>>>>>> 0d55b583 (first)
=======
>>>>>>> e83070fd (.)
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
            'deleted_at' => 'datetime',

            'updated_by' => 'string',
            'created_by' => 'string',
            'deleted_by' => 'string',
<<<<<<< HEAD
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
=======
>>>>>>> 6907d18e (first)
=======
>>>>>>> c6af2eee (first)
=======
    
    /**
     * @var list<string>
     */
    protected $hidden = [
        // 'password'
    ];
    
>>>>>>> 8e6e7d4c (first)
=======
>>>>>>> 4658bb86 (first)
    /**
     * @var bool
     */
    public $timestamps = true;

<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> 7e417e87 (first)
=======
>>>>>>> 6907d18e (first)
=======
>>>>>>> c6af2eee (first)
=======
>>>>>>> 8e6e7d4c (first)
=======
>>>>>>> 4658bb86 (first)
=======
=======
>>>>>>> f3d4311a (Squashed 'laravel/Modules/Progressioni/' content from commit 72d99eef1)
    // use Searchable;
    use HasFactory;
    use Updater;

    protected $connection = 'progressione';

    // this will use the specified database connection
    public $timestamps = true;

    protected $casts = ['created_at' => 'datetime', 'updated_at' => 'datetime'];

<<<<<<< HEAD
>>>>>>> bcab6efe (first)
=======
>>>>>>> f3d4311a (Squashed 'laravel/Modules/Progressioni/' content from commit 72d99eef1)
    /**
     * Create a new factory instance for the model.
     *
     * @return Factory
     */
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
    protected static function newFactory()
    {
<<<<<<< HEAD
<<<<<<< HEAD
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
=======
=======
>>>>>>> dc18abbe (first)
    public $timestamps = true;

    /*
    public function images() {
        return $this->morphMany(Image::class, 'post');
    }
    */
<<<<<<< HEAD
>>>>>>> b7483fd0 (first)
=======
    public $timestamps = true;

    protected $dateFormat = 'Y-m-d';

    /*
    public function images()
    {
        return $this->morphMany(Image::class, 'post');
    }
    */
>>>>>>> e0005d7d (first)
=======
        return app(\Modules\Xot\Actions\Factory\GetFactoryAction::class)->execute(static::class);
    }
>>>>>>> 6907d18e (first)
=======
        return app(\Modules\Xot\Actions\Factory\GetFactoryAction::class)->execute(static::class);
    }
>>>>>>> c6af2eee (first)
=======
    protected static function newFactory(): Factory
    {
        // Utilizziamo il modello standard di Laravel senza dipendere da FactoryService
        $parts = explode('\\', static::class);
        $modelName = end($parts);
        
        // Gestione sicura della posizione dell'ultimo backslash
        $position = strrpos(static::class, '\\');
        if ($position === false) {
            $namespace = '';
        } else {
            $namespace = substr(static::class, 0, $position);
        }
        
        $factoryNamespace = $namespace . '\\Database\\Factories\\' . $modelName . 'Factory';
        
        if (class_exists($factoryNamespace)) {
            return app($factoryNamespace);
        }
        
        return Factory::factoryForModel(static::class);
    }
>>>>>>> 8e6e7d4c (first)
=======
=======
>>>>>>> bcab6efe (first)
=======
    /**
     * Create a new factory instance for the model.
     *
     * @return Factory
     */
>>>>>>> dc18abbe (first)
=======
>>>>>>> f3d4311a (Squashed 'laravel/Modules/Progressioni/' content from commit 72d99eef1)
    protected static function newFactory()
    {
        return app(\Modules\Xot\Actions\Factory\GetFactoryAction::class)->execute(static::class);
    }
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> 4658bb86 (first)
=======
>>>>>>> bcab6efe (first)
=======
namespace Modules\Sigma\Models;

use Illuminate\Database\Eloquent\Model;

abstract class BaseModel extends Model
{
    // use Traits\Scopes\CommonScope;
    // use Traits\Relationships\CommonRelationship;
    // use Traits\Mutators\CommonMutator;

    protected $connection = 'generale';

    // this will use the specified database connection
    public $timestamps = false;
>>>>>>> f862c51f (first)
=======
namespace Modules\Performance\Models;

use Illuminate\Database\Eloquent\Model;
// ---------- traits
use Modules\Xot\Traits\Updater;

abstract class BaseModel extends Model
{
    use Updater;

    protected $connection = 'performance';

    /** @return array<string, string> */
    public function casts(): array
    {
        return [
            // 'created_at' => 'datetime',
            // 'updated_at' => 'datetime',
        ];
    }

    /** @var bool */
    public $timestamps = true;
>>>>>>> 961ad402 (first)
=======
>>>>>>> dc18abbe (first)
=======
>>>>>>> f3d4311a (Squashed 'laravel/Modules/Progressioni/' content from commit 72d99eef1)
=======
        ];
    }
>>>>>>> e83070fd (.)
}
