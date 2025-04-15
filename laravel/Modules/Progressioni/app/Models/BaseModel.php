<?php

declare(strict_types=1);

namespace Modules\Progressioni\Models;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use Laravel\Scout\Searchable;
// ---------- traits
use Modules\Xot\Traits\Updater;

abstract class BaseModel extends Model
{
    // use Searchable;
    use HasFactory;
    use Updater;

    protected $connection = 'progressione';

    // this will use the specified database connection
    public $timestamps = true;

    protected $casts = ['created_at' => 'datetime', 'updated_at' => 'datetime'];

    /**
     * Create a new factory instance for the model.
     *
     * @return Factory
     */
    protected static function newFactory()
    {
        return app(\Modules\Xot\Actions\Factory\GetFactoryAction::class)->execute(static::class);
    }
}
