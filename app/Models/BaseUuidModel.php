<?php

declare(strict_types=1);

<<<<<<< HEAD
<<<<<<< HEAD
namespace Modules\Lang\Models;

// //use Laravel\Scout\Searchable;
// ---------- traits
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\Lang\Models\Traits\LinkedTrait;
use Modules\Xot\Actions\Factory\GetFactoryAction;
use Modules\Xot\Traits\Updater;

/**
 * Class BaseModelLang.
 *
 * @property string|null $post_type
 */
abstract class BaseModelLang extends Model
{
    use HasFactory;

    // use Searchable;
    use LinkedTrait;
=======
=======
>>>>>>> bdeae81f (first)
namespace Modules\User\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\Factory;
// //use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Xot\Actions\Factory\GetFactoryAction;
use Modules\Xot\Models\XotBaseUuidModel;
use Modules\Xot\Traits\Updater;

/**
 * Class BaseUuidModel.
 */
abstract class BaseUuidModel extends XotBaseUuidModel
{
    // use Searchable;
    // //use Cachable;
    use HasFactory;
    use HasUuids;
<<<<<<< HEAD
>>>>>>> e83070fd (.)
=======
>>>>>>> bdeae81f (first)
    use Updater;

    /**
     * Indicates whether attributes are snake cased on arrays.
     *
<<<<<<< HEAD
<<<<<<< HEAD
     * @see  https://laravel-news.com/6-eloquent-secrets
=======
     * @see https://laravel-news.com/6-eloquent-secrets
>>>>>>> e83070fd (.)
=======
     * @see https://laravel-news.com/6-eloquent-secrets
>>>>>>> bdeae81f (first)
     *
     * @var bool
     */
    public static $snakeAttributes = true;

    /** @var bool */
<<<<<<< HEAD
<<<<<<< HEAD
    public $incrementing = true;
=======
=======
>>>>>>> bdeae81f (first)
    public $incrementing = false;

    /** @var string */
    protected $keyType = 'string';

    /** @var string */
    protected $primaryKey = 'id';
<<<<<<< HEAD
>>>>>>> e83070fd (.)
=======
>>>>>>> bdeae81f (first)

    /** @var bool */
    public $timestamps = true;

    /** @var int */
    protected $perPage = 30;

    /** @var string */
<<<<<<< HEAD
<<<<<<< HEAD
    protected $connection = 'lang';

    /** @var list<string> */
    protected $fillable = ['id'];

    /** @var string */
    protected $primaryKey = 'id';

    /** @var string */
    protected $keyType = 'string';
=======
=======
>>>>>>> bdeae81f (first)
    protected $connection = 'user';

    /** @var list<string> */
    protected $appends = [];
<<<<<<< HEAD
>>>>>>> e83070fd (.)
=======
>>>>>>> bdeae81f (first)

    /** @var list<string> */
    protected $hidden = [
        // 'password'
    ];

<<<<<<< HEAD
<<<<<<< HEAD
    // -----------
    /*
    protected $id;
    protected $post;
    protected $lang;
    */
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
=======
=======
>>>>>>> bdeae81f (first)
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

    /** @return array<string, string> */
<<<<<<< HEAD
>>>>>>> e83070fd (.)
=======
>>>>>>> bdeae81f (first)
    protected function casts(): array
    {
        return [
            'id' => 'string',
<<<<<<< HEAD
<<<<<<< HEAD
            'uuid' => 'string', 'published_at' => 'datetime', 'created_at' => 'datetime', 'updated_at' => 'datetime'];
=======
=======
>>>>>>> bdeae81f (first)
            'published_at' => 'datetime',

            'verified_at' => 'datetime',

            'created_at' => 'datetime',
            'updated_at' => 'datetime',
            'deleted_at' => 'datetime',

            'updated_by' => 'string',
            'created_by' => 'string',
            'deleted_by' => 'string',
        ];
<<<<<<< HEAD
>>>>>>> e83070fd (.)
=======
>>>>>>> bdeae81f (first)
    }
}
