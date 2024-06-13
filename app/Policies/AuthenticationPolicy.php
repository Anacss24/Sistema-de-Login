<?php

namespace App\Policies;

use App\Models\User;

class AuthenticationPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        
    }

    public function delete(User $user){
        return $user->id ===21;
    }
}
