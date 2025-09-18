<?php

declare(strict_types=1);

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
}
