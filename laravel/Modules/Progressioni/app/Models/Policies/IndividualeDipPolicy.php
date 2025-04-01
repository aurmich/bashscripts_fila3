<?php

declare(strict_types=1);

namespace Modules\Performance\Models\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Database\Eloquent\Model;
use Modules\Xot\Contracts\UserContract;
use Modules\Xot\Models\Policies\XotBasePolicy;

class IndividualeDipPolicy extends XotBasePolicy
{
    // use HandlesAuthorization;

    /*
    public function before($user, $ability) {
        if (isset($user->perm) && $user->perm->perm_type >= 3) {
            //3=controllori , 5=superadmin
            return true;
        }
    }

    //*/
    public function viewAny(?UserContract $userContract): bool
    {
        return true;
    }

    public function index(?UserContract $userContract, Model $model): bool
    {
        return true;
    }

    public function edit(UserContract $userContract, Model $model): bool
    {
        return false;
    }

    public function update(UserContract $userContract, Model $model): bool
    {
        return false;
    }

    public function show(?UserContract $userContract, Model $model): bool
    {
        return true;
    }

    public function compila(UserContract $userContract, Model $model): bool
    {
        return (bool) $model->getAttributeValue('ha_diritto');
        // return true;
    }

    public function individualePdf(UserContract $userContract, Model $model): bool
    {
        return $model->getAttributeValue('ha_diritto');
    }

    public function xlsIndividualeStabiRepar(UserContract $userContract, Model $model): bool
    {
        return true;
    }

    public function pdfIndividualeStabiRepar(UserContract $userContract, Model $model): bool
    {
        return true;
    }

    public function massMail(UserContract $userContract, Model $model): bool
    {
        return true;
    }
}
