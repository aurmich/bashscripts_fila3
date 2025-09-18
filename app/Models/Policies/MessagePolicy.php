<?php

declare(strict_types=1);

<<<<<<< HEAD
<<<<<<< HEAD
namespace Modules\IndennitaResponsabilita\Models\Policies;

use Illuminate\Auth\Access\Response;
use Modules\IndennitaResponsabilita\Models\Message as Post;
use Modules\User\Models\User;
=======
namespace Modules\Progressioni\Models\Policies;

use Illuminate\Database\Eloquent\Model;
>>>>>>> bcab6efe (first)
=======
namespace Modules\Progressioni\Models\Policies;

use Illuminate\Database\Eloquent\Model;
>>>>>>> f3d4311a (Squashed 'laravel/Modules/Progressioni/' content from commit 72d99eef1)
use Modules\Xot\Contracts\UserContract;
use Modules\Xot\Models\Policies\XotBasePolicy;

class MessagePolicy extends XotBasePolicy
{
<<<<<<< HEAD
<<<<<<< HEAD
    /**
     * Determine whether the user can view the model.
     *
     * @return Response|bool
     */
    public function compila(UserContract $user, Post $post): bool
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
    public function view(UserContract $user, Post $post): bool
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
    public function update(UserContract $user, Post $post): bool
    {
        return true;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @return Response|bool
     */
    public function delete(UserContract $user, Post $post): bool
    {
        return false;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @return Response|bool
     */
    public function restore(UserContract $user, Post $post): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @return Response|bool
     */
    public function forceDelete(UserContract $user, Post $post): bool
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
=======
>>>>>>> f3d4311a (Squashed 'laravel/Modules/Progressioni/' content from commit 72d99eef1)
}
