<?php

declare(strict_types=1);

namespace Modules\Performance\Models\Policies;

use Modules\Xot\Contracts\UserContract;
use Modules\Xot\Models\Policies\XotBasePolicy;
use Modules\Performance\Models\StabiDirigente as MyModel; 

class StabiDirigentePolicy extends XotBasePolicy {

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

    public function index(?UserContract $userContract, MyModel $model): bool
    {
        return true;
    }

    public function edit(UserContract $userContract, MyModel $model): bool
    {
        return false;
    }

    public function update(UserContract $userContract, MyModel $model): bool
    {
        return false;
    }

    public function create(UserContract $userContract): bool
    {
        return false;
    }

    public function show(?UserContract $userContract, MyModel $model): bool
    {
        return true;
    }
    
    public function delete(?UserContract $userContract, MyModel $model): bool
    {
        return false;
    }

    public function view(?UserContract $userContract, MyModel $model): bool
    {
        return false;
    }

    public function compila(UserContract $userContract, MyModel $model): bool
    {
        return (bool) $model->getAttributeValue('ha_diritto');
        // return true;
    }

    public function individualePdf(UserContract $userContract, MyModel $model): bool
    {
        return $model->getAttributeValue('ha_diritto');
    }

    public function xlsIndividualeStabiRepar(UserContract $userContract, MyModel $model): bool
    {
        return true;
    }

    public function pdfIndividualeStabiRepar(UserContract $userContract, MyModel $model): bool
    {
        return true;
    }

    public function massMail(UserContract $userContract, MyModel $model): bool
    {
        return true;
    }

}
