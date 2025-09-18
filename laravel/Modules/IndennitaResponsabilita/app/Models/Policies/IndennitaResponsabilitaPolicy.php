<?php

declare(strict_types=1);

namespace Modules\IndennitaResponsabilita\Models\Policies;

use Illuminate\Auth\Access\Response;
use Modules\IndennitaResponsabilita\Models\IndennitaResponsabilita as Post;
use Modules\User\Models\User;
use Modules\Xot\Contracts\UserContract;
use Modules\Xot\Models\Policies\XotBasePolicy;

class IndennitaResponsabilitaPolicy extends XotBasePolicy
{
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
        return true;
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
        return false; // puo' far modifica solo superadmin
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
}
