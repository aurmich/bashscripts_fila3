<?php

declare(strict_types=1);

namespace Modules\Performance\Models\Policies;

use Modules\Xot\Contracts\UserContract;
use Modules\Xot\Models\Policies\XotBasePolicy;
use Modules\Performance\Models\Individuale as MyModel;

class IndividualePolicy extends XotBasePolicy
{
    public function viewAny(?UserContract $user): bool
    {
        if(get_class($this)=='Modules\Performance\Models\Policies\IndividualePolicy'){
            return auth()->user()->isSuperAdmin();
        }
        return true;
    }

    public function index(?UserContract $user, MyModel $model): bool
    {
        return false;
    }

    public function edit(UserContract $user, MyModel $model): bool
    {
        return false;
    }

    public function update(UserContract $user, MyModel $model): bool
    {
        return false;
    }
    
    public function create(UserContract $userContract): bool
    {
        return false;
    }

    public function show(?UserContract $user, MyModel $model): bool
    {
        return false;
    }

    public function view(UserContract $user, MyModel $model): bool
    {
        return $user->isSuperAdmin();
    }

    public function destroy(?UserContract $user, MyModel $model): bool
    {
        return false;
    }

    public function delete(?UserContract $user, MyModel $model): bool
    {
        return false;
    }

    public function compila(UserContract $user, MyModel $model): bool
    {
        //return $model->getAttributeValue('posfun') >= 100;
        return (bool) $model->getAttributeValue('ha_diritto');
    }

    public function individualePdf(UserContract $user, MyModel $model): bool
    {
        //return $model->getAttributeValue('posfun') >= 100;
        return (bool) $model->getAttributeValue('ha_diritto');
    }

    public function xlsIndividualeStabiRepar(UserContract $user, MyModel $model): bool
    {
        return true;
    }

    public function pdfIndividualeStabiRepar(UserContract $user, MyModel $model): bool
    {
        return true;
    }

    public function massMail(UserContract $user, MyModel $model): bool
    {
        return true;
    }
}
