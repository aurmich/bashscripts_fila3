<?php

declare(strict_types=1);

<<<<<<< HEAD
namespace Modules\IndennitaCondizioniLavoro\Models\Policies;

use Illuminate\Auth\Access\Response;
use Modules\IndennitaCondizioniLavoro\Models\CondizioniLavoro;
=======
namespace Modules\IndennitaResponsabilita\Models\Policies;

use Illuminate\Auth\Access\Response;
use Modules\IndennitaResponsabilita\Models\IndennitaResponsabilita as Post;
>>>>>>> e0005d7d (first)
use Modules\User\Models\User;
use Modules\Xot\Contracts\UserContract;
use Modules\Xot\Models\Policies\XotBasePolicy;

class StabiDirigentePolicy extends XotBasePolicy
{
    /**
     * Determine whether the user can view the model.
     *
     * @return Response|bool
     */
<<<<<<< HEAD
    public function compila(UserContract $user, CondizioniLavoro $condizioniLavoro): bool
=======
    public function compila(UserContract $user, Post $post): bool
>>>>>>> e0005d7d (first)
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
<<<<<<< HEAD
    public function view(UserContract $user, CondizioniLavoro $condizioniLavoro): bool
=======
    public function view(UserContract $user, Post $post): bool
>>>>>>> e0005d7d (first)
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
<<<<<<< HEAD
    public function update(UserContract $user, CondizioniLavoro $condizioniLavoro): bool
=======
    public function update(UserContract $user, Post $post): bool
>>>>>>> e0005d7d (first)
    {
        return true;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @return Response|bool
     */
<<<<<<< HEAD
    public function delete(UserContract $user, CondizioniLavoro $condizioniLavoro): bool
=======
    public function delete(UserContract $user, Post $post): bool
>>>>>>> e0005d7d (first)
    {
        return false;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @return Response|bool
     */
<<<<<<< HEAD
    public function restore(UserContract $user, CondizioniLavoro $condizioniLavoro): bool
=======
    public function restore(UserContract $user, Post $post): bool
>>>>>>> e0005d7d (first)
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @return Response|bool
     */
<<<<<<< HEAD
    public function forceDelete(UserContract $user, CondizioniLavoro $condizioniLavoro): bool
=======
    public function forceDelete(UserContract $user, Post $post): bool
>>>>>>> e0005d7d (first)
    {
        return false;
    }
}
