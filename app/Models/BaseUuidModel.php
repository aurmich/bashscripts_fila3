<?php

declare(strict_types=1);

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
>>>>>>> e83070fd (.)
    use Updater;

    /**
     * Indicates whether attributes are snake cased on arrays.
     *
<<<<<<< HEAD
     * @see  https://laravel-news.com/6-eloquent-secrets
=======
     * @see https://laravel-news.com/6-eloquent-secrets
>>>>>>> e83070fd (.)
     *
     * @var bool
     */
    public static $snakeAttributes = true;

    /** @var bool */
<<<<<<< HEAD
    public $incrementing = true;
=======
    public $incrementing = false;

    /** @var string */
    protected $keyType = 'string';

    /** @var string */
    protected $primaryKey = 'id';
>>>>>>> e83070fd (.)

    /** @var bool */
    public $timestamps = true;

    /** @var int */
    protected $perPage = 30;

    /** @var string */
<<<<<<< HEAD
    protected $connection = 'lang';

    /** @var list<string> */
    protected $fillable = ['id'];

    /** @var string */
    protected $primaryKey = 'id';

    /** @var string */
    protected $keyType = 'string';
=======
    protected $connection = 'user';

    /** @var list<string> */
    protected $appends = [];
>>>>>>> e83070fd (.)

    /** @var list<string> */
    protected $hidden = [
        // 'password'
    ];

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
>>>>>>> e83070fd (.)
    protected function casts(): array
    {
        return [
            'id' => 'string',
<<<<<<< HEAD
            'uuid' => 'string', 'published_at' => 'datetime', 'created_at' => 'datetime', 'updated_at' => 'datetime'];
=======
            'published_at' => 'datetime',

            'verified_at' => 'datetime',

            'created_at' => 'datetime',
            'updated_at' => 'datetime',
            'deleted_at' => 'datetime',

            'updated_by' => 'string',
            'created_by' => 'string',
            'deleted_by' => 'string',
        ];
>>>>>>> e83070fd (.)
    }
}
