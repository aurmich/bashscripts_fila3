<?php

declare(strict_types=1);

namespace Modules\Sigma\Models\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use Modules\Sigma\Models\Repart as Post;
use Modules\Xot\Contracts\UserContract;

// use Modules\Xot\Traits\XotBasePolicyTrait; //DEPRECATED

class RepartPolicy
{
    // use HandlesAuthorization; e' dentro XotBasePolicyTrait
    // use XotBasePolicyTrait; //DEPRECATED

    public function before($user, $ability)
    {
        if (! isset($user->perm)) {
            return;
        }
        if ($user->perm->perm_type < 5) {
            return;
        }

        // superadmin
        return true;
    }

    /**
     * Determine whether the user can view any DocDummyPluralModel.
     *
     * @return mixed
     */
    public function index(UserContract $user, Post $post): bool
    {
        return true;
    }

    /**
     * Determine whether the user can edit the DocDummyModel.
     *
     * @return mixed
     */
    public function edit(UserContract $user, Post $post): bool
    {
        return $post->created_by === $user->handle;
    }

    public function indexEdit(UserContract $user, Post $post): bool
    {
        return $post->created_by === $user->handle;
    }

    /**
     * Determine whether the user can update the DocDummyModel.
     *
     * @return mixed
     */
    public function update(UserContract $user, Post $post): bool
    {
        return $post->created_by === $user->handle;
    }

    public function destroy(UserContract $user, Post $post): bool
    {
        return $post->created_by === $user->handle;
    }

    /**
     * Determine whether the user can delete the DocDummyModel.
     *
     * @return mixed
     */
    public function delete(UserContract $user, Post $post): bool
    {
        return $post->created_by === $user->handle;
    }

    /**
     * Determine whether the user can restore the DocDummyModel.
     *
     * @return mixed
     */
    public function restore(UserContract $user, Post $post): bool
    {
        return $post->created_by === $user->handle;
    }
}
