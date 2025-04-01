<?php

declare(strict_types=1);

namespace Modules\Performance\Models\Policies;

use Illuminate\Database\Eloquent\Model;
use Modules\Xot\Contracts\UserContract;
use Modules\Xot\Models\Policies\XotBasePolicy;

class IndividualePoPolicy extends XotBasePolicy
{
    public function viewAny(?UserContract $userContract): bool
    {
        return true;
    }

    public function index(?UserContract $userContract, Model $model): bool
    {
        return false;
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
        return $model->getAttributeValue('posfun') >= 100;
    }

    public function individualePdf(UserContract $userContract, Model $model): bool
    {
        return $model->getAttributeValue('posfun') >= 100;
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
