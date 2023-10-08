<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ActivityLogPolicy
{

    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function isSuperAdmin(User $user)
    {
        return $user->level == 'superadmin';
    }
}
