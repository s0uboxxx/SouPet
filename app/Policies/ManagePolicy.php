<?php

namespace App\Policies;

use App\Models\User;

class ManagePolicy
{
    /**
     * Create a new policy instance.
     */
    public function delete(User $user, $manages)
    {
        if ($manages === 'storage') {
            return false;
        }

        if ($manages === 'order') {
            return false;
        }

        if ($user->id_role === 4 && $manages === 'user') {
            return true;
        } 

        if (($user->id_role === 4 || $user->id_role === 1) && $manages === 'brand') {
            return true;
        }

        if (($user->id_role === 4 || $user->id_role === 1) && $manages === 'category') {
            return true;
        }

        if (($user->id_role === 4 || $user->id_role === 1) && $manages === 'product') {
            return true;
        }

        return false;
    }

    public function create(User $user, $manages)
    {
        if ($manages === 'storage') {
            return false;
        }

        if ($manages === 'order') {
            return false;
        }

        if ($user->id_role === 4 && $manages === 'user') {
            return true;
        } 

        if (($user->id_role === 4 || $user->id_role === 1) && $manages === 'brand') {
            return true;
        }

        if (($user->id_role === 4 || $user->id_role === 1) && $manages === 'category') {
            return true;
        }

        if (($user->id_role === 4 || $user->id_role === 1) && $manages === 'product') {
            return true;
        }

        return false;
    }

    public function update(User $user, $manages)
    {
        if ($user->id_role === 4 && $manages === 'user') {
            return true;
        } 

        if (($user->id_role === 4 || $user->id_role === 1) && $manages === 'brand') {
            return true;
        }

        if (($user->id_role === 4 || $user->id_role === 1) && $manages === 'category') {
            return true;
        }

        if (($user->id_role === 4 || $user->id_role === 1) && $manages === 'product') {
            return true;
        }

        return false;
    }
}
