<?php

namespace App\Policies;

use App\Models\User;

class StoragePolicy
{
    public function edit(User $user)
    {
        return $user->id_role == 4 || $user->id_role == 1 || $user->id_role == 2;
    }

    public function create(User $user)
    {
        return $user->id_role == 4 || $user->id_role == 1 || $user->id_role == 2;
    }

    public function delete(User $user)
    {
        return $user->id_role == 4 || $user->id_role == 1 || $user->id_role == 2;
    }
}
