<?php

declare(strict_types=1);

<<<<<<< HEAD
namespace Modules\Progressioni\Models\Policies;

use Illuminate\Database\Eloquent\Model;
use Modules\Xot\Contracts\UserContract;
use Modules\Xot\Models\Policies\XotBasePolicy;

class CriteriOptionPolicy extends XotBasePolicy
{
    public function populateFromLastYear(UserContract $userContract, Model $model): bool
    {
        return true;
    }
}
=======
namespace Modules\Performance\Models\Policies;

use Modules\Xot\Models\Policies\XotBasePolicy;

class CriteriOptionPolicy extends XotBasePolicy {}
>>>>>>> 961ad402 (first)
