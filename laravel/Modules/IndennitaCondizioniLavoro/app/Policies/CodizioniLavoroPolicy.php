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
<<<<<<< HEAD
     * @return bool
=======
     * @return Response|bool
>>>>>>> 55edff60 (.)
     */
    public function viewAny(UserContract $user): bool
    {
        return false;
    }

    /**
     * Determine whether the user can view the model.
     *
<<<<<<< HEAD
     * @return bool
=======
     * @return Response|bool
>>>>>>> 55edff60 (.)
     */
    public function view(UserContract $user, CondizioniLavoro $condizioniLavoro): bool
    {
        return false;
    }

    /**
     * Determine whether the user can create models.
     *
<<<<<<< HEAD
     * @return bool
=======
     * @return Response|bool
>>>>>>> 55edff60 (.)
     */
    public function create(UserContract $user): bool
    {
        return false;
    }

    /**
     * Determine whether the user can update the model.
     *
<<<<<<< HEAD
     * @return bool
=======
     * @return Response|bool
>>>>>>> 55edff60 (.)
     */
    public function update(UserContract $user, CondizioniLavoro $condizioniLavoro): bool
    {
        return false;
    }

    /**
     * Determine whether the user can delete the model.
     *
<<<<<<< HEAD
     * @return bool
=======
     * @return Response|bool
>>>>>>> 55edff60 (.)
     */
    public function delete(UserContract $user, CondizioniLavoro $condizioniLavoro): bool
    {
        return false;
    }

    /**
     * Determine whether the user can restore the model.
     *
<<<<<<< HEAD
     * @return bool
=======
     * @return Response|bool
>>>>>>> 55edff60 (.)
     */
    public function restore(UserContract $user, CondizioniLavoro $condizioniLavoro): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
<<<<<<< HEAD
     * @return bool
=======
     * @return Response|bool
>>>>>>> 55edff60 (.)
     */
    public function forceDelete(UserContract $user, CondizioniLavoro $condizioniLavoro): bool
    {
        return false;
    }
}
