<?php

namespace Modules\User\Models;

use App\Models\User as ModelsUser;
use Modules\Task\Models\Task;

class User extends ModelsUser
{
    public function tasks()
    {
        return $this->belongsToMany(Task::class, 'task_user')->withTimestamps();
    }
}
