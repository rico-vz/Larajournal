<?php

namespace App\Policies;

use App\Models\JournalPost;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class JournalPostPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\JournalPost  $journalPost
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, JournalPost $journalPost)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        // If the user is an admin or a writer, they can create a journal post
        return $user->is_admin || $user->is_writer ? Response::allow() : Response::deny('You are not allowed to create a post.');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\JournalPost  $journalPost
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, JournalPost $journalPost)
    {
        return $user->id === $journalPost->author_id || $user->is_admin ? Response::allow() : Response::deny('You do not own this post.');
    }

    public function edit(User $user, JournalPost $journalPost)
    {
        return $user->id === $journalPost->author_id || $user->is_admin ? Response::allow() : Response::deny('You do not own this post.');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\JournalPost  $journalPost
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, JournalPost $journalPost)
    {
        return $user->id === $journalPost->author_id || $user->is_admin ? Response::allow() : Response::deny('You do not own this post.');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\JournalPost  $journalPost
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, JournalPost $journalPost)
    {
        // 
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\JournalPost  $journalPost
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, JournalPost $journalPost)
    {
        // 
    }
}