<?php

namespace Modules\Task\Models;

use Illuminate\Database\Eloquent\Model;
use Kalnoy\Nestedset\NodeTrait;
use Modules\User\Models\User;

class Task extends Model
{
    use NodeTrait;

    protected $fillable = ['title', 'description', 'creator_id'];

    public function users()
    {
        return $this->belongsToMany(User::class, 'task_user')->withTimestamps();
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'creator_id');
    }
}