<?php

namespace App\Policies;

use App\Models\User;

class UserPolicy
{
    public function edit(User $user)
    {
        return $user->id == 4;
    }

    public function create(User $user)
    {
        return $user->id_role == 4;
    }
}
