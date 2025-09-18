<?php

declare(strict_types=1);

namespace Modules\IndennitaCondizioniLavoro\Models\Policies;

use Illuminate\Auth\Access\Response;
use Modules\IndennitaCondizioniLavoro\Models\CondizioniLavoroAdm as MyModel;
use Modules\User\Models\User;
use Modules\Xot\Contracts\UserContract;
use Modules\Xot\Models\Policies\XotBasePolicy;

class CondizioniLavoroAdmPolicy extends XotBasePolicy
{
    /**
     * Determine whether the user can view the model.
     *
     * @return Response|bool
     */
    public function compila(UserContract $user, MyModel $condizioniLavoro): bool
    {
        return true;
    }

    /**
     * Determine whether the user can view any models.
     *
     * @return Response|bool
     */
    public function viewAny(UserContract $user): bool
    {
        return false;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @return Response|bool
     */
    public function view(UserContract $user, MyModel $condizioniLavoro): bool
    {
        return false;
    }

    /**
     * Determine whether the user can create models.
     *
     * @return Response|bool
     */
    public function create(UserContract $user): bool
    {
        return false;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @return Response|bool
     */
    public function update(UserContract $user, MyModel $condizioniLavoro): bool
    {
        return false; // puo' far modifica solo superadmin
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @return Response|bool
     */
    public function delete(UserContract $user, MyModel $condizioniLavoro): bool
    {
        return false;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @return Response|bool
     */
    public function restore(UserContract $user, MyModel $condizioniLavoro): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @return Response|bool
     */
    public function forceDelete(UserContract $user, MyModel $condizioniLavoro): bool
    {
        return false;
    }
}
