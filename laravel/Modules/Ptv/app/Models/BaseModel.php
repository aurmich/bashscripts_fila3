<?php

declare(strict_types=1);

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

    protected $primaryKey = 'id';

    public $incrementing = true;

    protected $hidden = [
        // 'password'
    ];

    public $timestamps = true;

    /*
    public function images() {
        return $this->morphMany(Image::class, 'post');
    }
    */
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
