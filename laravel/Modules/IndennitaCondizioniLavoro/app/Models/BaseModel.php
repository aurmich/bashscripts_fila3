<?php

declare(strict_types=1);

namespace Modules\IndennitaCondizioniLavoro\Models;

use Illuminate\Database\Eloquent\Model;
// use Laravel\Scout\Searchable;
// ---------- traits
use Modules\Xot\Traits\Updater;

abstract class BaseModel extends Model
{
    use Updater;

    // use Searchable;
    protected $connection = 'indennita_condizioni_lavoro';

    // this will use the specified database connection
    protected $fillable = ['id'];

    protected $casts = ['published_at' => 'datetime', 'created_at' => 'datetime', 'updated_at' => 'datetime'];

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
}
