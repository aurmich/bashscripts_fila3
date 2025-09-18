<?php

declare(strict_types=1);

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
}
