<?php

namespace App\Policies;

use App\Models\User;

class BrandPolicy
{
    public function delete(User $user)
    {
        return $user->id_role == 4 || $user->id_role == 1;
    }

    public function create(User $user)
    {
        return $user->id_role == 4 || $user->id_role == 1;
    }

    public function edit(User $user)
    {
        return $user->id_role == 4 || $user->id_role == 1;
    }
}
