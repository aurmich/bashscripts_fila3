<?php

declare(strict_types=1);

namespace Modules\IndennitaCondizioniLavoro\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;
use Modules\IndennitaCondizioniLavoro\Models\CondizioniLavoro;
use Modules\User\Models\User;
use Modules\Xot\Contracts\UserContract;

class CodizioniLavoroPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @return bool
     */
    public function viewAny(UserContract $user): bool
    {
        return false;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @return bool
     */
    public function view(UserContract $user, CondizioniLavoro $condizioniLavoro): bool
    {
        return false;
    }

    /**
     * Determine whether the user can create models.
     *
     * @return bool
     */
    public function create(UserContract $user): bool
    {
        return false;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @return bool
     */
    public function update(UserContract $user, CondizioniLavoro $condizioniLavoro): bool
    {
        return false;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @return bool
     */
    public function delete(UserContract $user, CondizioniLavoro $condizioniLavoro): bool
    {
        return false;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @return bool
     */
    public function restore(UserContract $user, CondizioniLavoro $condizioniLavoro): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @return bool
     */
    public function forceDelete(UserContract $user, CondizioniLavoro $condizioniLavoro): bool
    {
        return false;
    }
}
