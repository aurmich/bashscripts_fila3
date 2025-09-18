<?php

declare(strict_types=1);

<<<<<<< HEAD
namespace Modules\Rating\Models;

use Illuminate\Database\Eloquent\Model;
=======
namespace Modules\Xot\Models;

// use Laravel\Scout\Searchable;
// ---------- traits
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\Xot\Actions\Factory\GetFactoryAction;
>>>>>>> 59bc4fe7 (first)
use Modules\Xot\Traits\Updater;

/**
 * Class BaseModel.
 */
abstract class BaseModel extends Model
{
<<<<<<< HEAD
=======
    use HasFactory;

    // use Searchable;
    // //use Cachable;
>>>>>>> 59bc4fe7 (first)
    use Updater;

    /**
     * Indicates whether attributes are snake cased on arrays.
     *
<<<<<<< HEAD
     * @see  https://laravel-news.com/6-eloquent-secrets
=======
     * @see https://laravel-news.com/6-eloquent-secrets
>>>>>>> 59bc4fe7 (first)
     *
     * @var bool
     */
    public static $snakeAttributes = true;

<<<<<<< HEAD
    /** @var bool */
    public $incrementing = true;

    /** @var bool */
    public $timestamps = true;

    /** @var int */
    protected $perPage = 30;

    /** @var string */
    protected $connection = 'rating';
=======
    public $incrementing = true;

    public $timestamps = true;

    protected $perPage = 30;

    protected $connection = 'xot';
>>>>>>> 59bc4fe7 (first)

    /** @var list<string> */
    protected $fillable = ['id'];

<<<<<<< HEAD
    /** @var string */
    protected $primaryKey = 'id';

    /** @var string */
=======
    protected $primaryKey = 'id';

>>>>>>> 59bc4fe7 (first)
    protected $keyType = 'string';

    /** @var list<string> */
    protected $hidden = [
        // 'password'
    ];

<<<<<<< HEAD
    /** @return array<string, string> */
    public function casts(): array
    {
        return [
            'id' => 'string',
            'uuid' => 'string',
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
            'published_at' => 'datetime',
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
            'deleted_at' => 'datetime',

            'updated_by' => 'string',
            'created_by' => 'string',
            'deleted_by' => 'string',
>>>>>>> 59bc4fe7 (first)
        ];
    }
}
