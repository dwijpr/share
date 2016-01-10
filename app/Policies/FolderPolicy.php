<?php

namespace ShareApp\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;

use ShareApp\User;
use ShareApp\Folder;

class FolderPolicy
{
    use HandlesAuthorization;

    public function all(User $user, Folder $folder){
        return $user->id === $folder->user_id;
    }
}
