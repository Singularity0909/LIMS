<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use App\Models\User;

class UserPolicy
{
    use HandlesAuthorization;

    public function show(User $currentUser, User $user)
    {
        if ($currentUser->id == $user->id) return true;
        if (User::getRole($currentUser) == 'Superuser') return true;
        return User::getRole($user) == 'Reader' and User::getRole($currentUser) == 'Readers admin';
    }

    public function update(User $currentUser, User $user)
    {
        if ($currentUser->id == $user->id) return true;
        if (User::getRole($currentUser) == 'Superuser') return true;
        return User::getRole($user) == 'Reader' and User::getRole($currentUser) == 'Readers admin';
    }

    public function destroy(User $currentUser, User $user)
    {
        if (User::getRole($user) == 'Superuser') return false;
        if (User::getRole($currentUser) == 'Superuser') return true;
        return User::getRole($currentUser) == 'Readers admin' and User::getRole($user) == 'Reader';
    }
}
