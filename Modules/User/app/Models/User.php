<?php

namespace Modules\User\Models;

use App\Models\User as ModelsUser;
use Illuminate\Notifications\Notifiable;
use Modules\Task\Models\Task;

class User extends ModelsUser
{
    use Notifiable;
    
    public function tasks()
    {
        return $this->belongsToMany(Task::class, 'task_user')->withTimestamps();
    }
}
