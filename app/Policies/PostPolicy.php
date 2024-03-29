<?php

namespace App\Policies;

use App\Models\Post;
use App\Models\Role;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param \App\Models\User $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        return $user->hasRole(Role::SUPER_ADMIN) || $user->hasPermission('post.index');

    }

    /**
     * Determine whether the user can view the model.
     *
     * @param \App\Models\User $user
     * @param \App\Models\Post $post
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Post $post)
    {
        return $post->status === Post::VISIBILITY_PUBLIC || $user->id === $post->user_id || $user->hasPermission('post.view') || $user->hasRole(Role::SUPER_ADMIN);
    }

    /**
     * Determine whether the user can create models.
     *
     * @param \App\Models\User $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return $user->hasRole(Role::ADMIN) || $user->hasPermission('post.create');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param \App\Models\User $user
     * @param \App\Models\Post $post
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Post $post)
    {
        return $user->hasRole(Role::SUPER_ADMIN) || ($user->id === $post->user_id && $user->hasPermission('post.update'));
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param \App\Models\User $user
     * @param \App\Models\Post $post
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Post $post)
    {
        return $user->hasRole(Role::SUPER_ADMIN) || ($user->id === $post->user_id && $user->hasPermission('post.delete'));
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param \App\Models\User $user
     * @param \App\Models\Post $post
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Post $post)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param \App\Models\User $user
     * @param \App\Models\Post $post
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Post $post)
    {

    }
}
