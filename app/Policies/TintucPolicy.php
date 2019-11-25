<?php

namespace App\Policies;

use App\User;
use App\TinTuc;
use Illuminate\Auth\Access\HandlesAuthorization;

class TintucPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the tinTuc.
     *
     * @param  \App\User  $user
     * @param  \App\TinTuc  $tinTuc
     * @return mixed
     */
    public function view(User $user, TinTuc $tinTuc)
    {
        //
    }

    /**
     * Determine whether the user can create tinTucs.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the tinTuc.
     *
     * @param  \App\User  $user
     * @param  \App\TinTuc  $tinTuc
     * @return mixed
     */
    public function update(User $user, TinTuc $tinTuc)
    {
        //
    }

    /**
     * Determine whether the user can delete the tinTuc.
     *
     * @param  \App\User  $user
     * @param  \App\TinTuc  $tinTuc
     * @return mixed
     */
    public function delete(User $user, TinTuc $tinTuc)
    {
        //
    }
}
