<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Order;

class OrderPolicy
{
    public function edit(User $user)
    {
        return $user->id == 1 || $user->id == 4 || $user->id == 2;
    }
}
