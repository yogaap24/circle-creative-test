<?php

namespace Modules\Task\Models;

use Illuminate\Database\Eloquent\Model;
use Kalnoy\Nestedset\NodeTrait;
use Modules\User\Models\User;

class Task extends Model
{
    use NodeTrait;

    protected $fillable = ['title', 'description', 'creator_id', 'is_read'];

    public function users()
    {
        return $this->belongsToMany(User::class, 'task_user')->withTimestamps();
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'creator_id');
    }

    public static function unreadCount($userId)
    {
        return Task::where('is_read', false)
            ->whereHas('users', function ($query) use ($userId) {
                $query->where('user_id', $userId);
            })
            ->count();
    }
}
