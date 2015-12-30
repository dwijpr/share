<?php

namespace ShareApp\Repositories;

use ShareApp\User;
use ShareApp\Task;

class TaskRepository{

    public function forUser(User $user){
        return Task::where('user_id', $user->id)
            ->orderBy('created_at', 'asc')
            ->get();
    }
}
