<?php

namespace ShareApp\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;

use ShareApp\User;
use ShareApp\File;

class FilePolicy
{
    use HandlesAuthorization;

    public function all(User $user, File $file){
        return $user->id === $file->folder->user_id;
    }
}
