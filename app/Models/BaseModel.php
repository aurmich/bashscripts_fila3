<?php

declare(strict_types=1);

namespace Modules\IndennitaResponsabilita\Models;

use Illuminate\Database\Eloquent\Model;
// use Laravel\Scout\Searchable;
// ---------- traits
use Modules\Xot\Traits\Updater;

abstract class BaseModel extends Model
{
    use Updater;

    // use Searchable;
    protected $connection = 'indennita_responsabilita';

    protected $fillable = ['id'];

    protected $casts = ['published_at' => 'datetime', 'created_at' => 'datetime', 'updated_at' => 'datetime'];

    protected $primaryKey = 'id';

    public $incrementing = true;

    protected $hidden = [
        // 'password'
    ];

    public $timestamps = true;

    protected $dateFormat = 'Y-m-d';

    /*
    public function images()
    {
        return $this->morphMany(Image::class, 'post');
    }
    */
}
