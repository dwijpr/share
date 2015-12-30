<?php

namespace ShareApp\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;

use ShareApp\User;
use ShareApp\Task;

class TaskPolicy
{
    use HandlesAuthorization;

    public function destroy(User $user, Task $task){
        return $user->id === $task->user_id;
    }
}
