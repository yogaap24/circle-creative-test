<?php

namespace Modules\Task\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Modules\Task\Models\Task;

class TaskPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    public function view(User $user, Task $task)
    {
        return $user->id === $task->creator_id || $task->users->contains($user);
    }

    public function update(User $user, Task $task)
    {
        return $user->isAdmin(); // Hanya admin yang dapat mengedit
    }

    public function delete(User $user, Task $task)
    {
        return $user->isAdmin(); // Hanya admin yang dapat menghapus
    }
}
