<?php

namespace App\Policies;

use App\Models\User;

class UserPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    public function view($user, $otherUser)
{
    // Check if the user is viewing their own data
    if ($user->id === $otherUser->id) {
        return true;
    }

    // Check if the current user is an admin
    if ($user->hasRole('admin')) {
        return true;
    }

    // Exclude admin user from the list
    if ($otherUser->hasRole('admin')) {
        return false;
    }

    return false; // Deny access by default
}
}
