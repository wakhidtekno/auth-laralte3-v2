<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{

    use HandlesAuthorization;

    public function viewAny(User  $user)
    {
        return $user->level !== 'user';
    }
    public function view(User  $user)
    {
        return $user->level !== 'user';
    }
    public function create(User  $user)
    {
        return $user->level !== 'user';
    }

    public function update(User  $user)
    {
        return $user->level !== 'user';
    }

    public function delete(User  $user)
    {
        return $user->level !== 'user';
    }
}
