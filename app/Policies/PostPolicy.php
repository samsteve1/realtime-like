<?php

namespace App\Policies;

use App\{Post, User};
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
    use HandlesAuthorization;

    public function like(User $user, Post $post)
    {
        return $user->id !== $post->user->id;
    }
}
