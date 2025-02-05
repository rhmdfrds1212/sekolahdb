<?php

namespace App\Policies;

use App\Models\Eskul;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class EskulPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Eskul $eskul)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->role === 'A';
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Eskul $eskul): bool
    {
        return $user->role === 'A';
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Eskul $eskul): bool
    {
        return $user->role === 'A';
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Eskul $eskul)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Eskul $eskul)
    {
        //
    }
}
