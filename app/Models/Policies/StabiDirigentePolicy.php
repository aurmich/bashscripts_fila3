<?php

declare(strict_types=1);

<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
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
=======
=======
>>>>>>> f3d4311a (Squashed 'laravel/Modules/Progressioni/' content from commit 72d99eef1)
namespace Modules\Progressioni\Models\Policies;

// //use Modules\Xot\Traits\XotBasePolicyTrait; //DEPRECATED
use Illuminate\Database\Eloquent\Model;
<<<<<<< HEAD
>>>>>>> bcab6efe (first)
=======
>>>>>>> f3d4311a (Squashed 'laravel/Modules/Progressioni/' content from commit 72d99eef1)
use Modules\Xot\Contracts\UserContract;
use Modules\Xot\Models\Policies\XotBasePolicy;

class StabiDirigentePolicy extends XotBasePolicy
{
<<<<<<< HEAD
<<<<<<< HEAD
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
=======
    public function syncStabi(UserContract $userContract, Model $model): bool
>>>>>>> bcab6efe (first)
=======
    public function syncStabi(UserContract $userContract, Model $model): bool
>>>>>>> f3d4311a (Squashed 'laravel/Modules/Progressioni/' content from commit 72d99eef1)
    {
        return true;
    }

<<<<<<< HEAD
<<<<<<< HEAD
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
=======
=======
>>>>>>> f3d4311a (Squashed 'laravel/Modules/Progressioni/' content from commit 72d99eef1)
    public function populateFromLastYear(UserContract $userContract, Model $model): bool
    {
        return true;
    }
<<<<<<< HEAD
>>>>>>> bcab6efe (first)
}
=======
namespace Modules\Performance\Models\Policies;

use Modules\Xot\Models\Policies\XotBasePolicy;

class StabiDirigentePolicy extends XotBasePolicy {}
>>>>>>> 961ad402 (first)
=======
}
>>>>>>> f3d4311a (Squashed 'laravel/Modules/Progressioni/' content from commit 72d99eef1)
