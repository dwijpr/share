<?php

namespace ShareApp\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;

use ShareApp\User;
use ShareApp\Number;

class NumberPolicy
{
    use HandlesAuthorization;

    public function all(User $user, Number $number){
        return $user->id === $number->user_id;
    }
}
