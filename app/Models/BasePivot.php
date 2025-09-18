<?php

declare(strict_types=1);

<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
namespace Modules\Notify\Models;
=======
namespace Modules\User\Models;
>>>>>>> 0d55b583 (first)
=======
namespace Modules\Incentivi\Models;
>>>>>>> 15ea09e2 (first)
=======
namespace Modules\User\Models;
>>>>>>> e83070fd (.)

use Illuminate\Database\Eloquent\Relations\Pivot;
// //use Laravel\Scout\Searchable;
use Modules\Xot\Traits\Updater;

/**
 * Class BasePivot.
 */
abstract class BasePivot extends Pivot
{
    use Updater;

    /**
     * Indicates whether attributes are snake cased on arrays.
     *
     * @see https://laravel-news.com/6-eloquent-secrets
     *
     * @var bool
     */
    public static $snakeAttributes = true;

    /** @var bool */
    public $incrementing = true;

    /** @var int */
    protected $perPage = 30;

<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
    // use Searchable;
    /** @var string */
    protected $connection = 'notify';

    // this will use the specified database connection
=======
    /** @var string */
    protected $connection = 'user';
>>>>>>> 0d55b583 (first)
=======
    // use Searchable;

    /** @var string */
    protected $connection = 'incentivi';
>>>>>>> 15ea09e2 (first)
=======
    /** @var string */
    protected $connection = 'user';
>>>>>>> e83070fd (.)

    /** @var list<string> */
    protected $appends = [];

<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> e83070fd (.)
    /**
     * Undocumented variable.
     */
    /** @var string */
    protected $primaryKey = 'id';

    /** @var string */
    protected $keyType = 'string';

    /** @return array<string, string> */
<<<<<<< HEAD
<<<<<<< HEAD
=======
    /** @return array<string, string> */
>>>>>>> 15ea09e2 (first)
    public function casts(): array
    {
        return [
            'id' => 'string', // must be string else primary key of related model will be typed as int
<<<<<<< HEAD
            'uuid' => 'string',

=======
=======
>>>>>>> e83070fd (.)
    protected function casts(): array
    {
        return [
            'id' => 'string', // must be string else primary key of related model will be typed as int
<<<<<<< HEAD
>>>>>>> 0d55b583 (first)
=======
>>>>>>> 15ea09e2 (first)
=======
>>>>>>> e83070fd (.)
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
            'deleted_at' => 'datetime',

            'updated_by' => 'string',
            'created_by' => 'string',
            'deleted_by' => 'string',
        ];
    }
<<<<<<< HEAD
<<<<<<< HEAD
=======

    /**
     * Undocumented variable.
     */
    /** @var string */
    protected $primaryKey = 'id';
>>>>>>> 15ea09e2 (first)
=======
namespace Modules\IndennitaCondizioniLavoro\Models;

// use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

// use Laravel\Scout\Searchable;
// ---------- traits
// use Modules\Xot\Traits\Updater;

abstract class BasePivot extends Pivot
{
    protected $connection = 'indennita_condizioni_lavoro'; // this will use the specified database connection
>>>>>>> b7483fd0 (first)
=======
>>>>>>> e83070fd (.)
}
