<?php

namespace App\Policies;

use App\Models\User;

class AdminPolicy
{
    public function admin(User $user)
    {
        // Logic to determine if the user has admin privileges
        return $user->isAdmin();
    }
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }
}
