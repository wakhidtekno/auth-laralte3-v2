<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class InstansiPolicy
{
    use HandlesAuthorization;

    public function update(User  $user)
    {
        return $user->level == 'superadmin';
    }
}
