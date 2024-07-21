<?php

namespace Modules\Task\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Notifications\TaskAssigned;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use Modules\Task\Models\Task;
use Modules\User\Models\User;

class TaskController extends Controller
{
    use AuthorizesRequests;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Mendapatkan ID pengguna yang sedang login
        $userId = Auth::id();

        // Mendapatkan semua task yang dibuat oleh pengguna (admin) atau di-assign ke pengguna
        $tasks = Task::where('creator_id', $userId)
            ->orWhereHas('users', function ($query) use ($userId) {
                $query->where('user_id', $userId);
            })
            ->get();

        return view('task::index', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::where('role', 'user')->get();
        return view('task::create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $task = Task::create([
            'title' => $request->title,
            'description' => $request->description,
            'creator_id' => Auth::id(),
            'is_read' => 0,
        ]);

        // Attach users to the task
        if ($request->has('users')) {
            $task->users()->attach($request->users);
        }

        $user = User::findOrFail($request->users[0]);
        Notification::send($user, new TaskAssigned($task));

        return redirect()->route('tasks.index');
    }

    /**
     * Show the specified resource.
     */
    public function show($id)
    {
        $task = Task::findOrFail($id);

        $this->authorize('view', $task);

        return view('task::show', compact('task'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $task = Task::findOrFail($id);
        return view('task::edit', compact('task'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id): RedirectResponse
    {
        $task = Task::findOrFail($id);
        $task->update($request->all());
        return redirect()->route('tasks.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $task = Task::findOrFail($id);
        $task->delete();
        return redirect()->route('tasks.index');
    }

    /**
     * Mark the task as read
     */
    public function markAsRead()
    {
        $tasks = Task::where('is_read', false)
            ->whereHas('users', function ($query) {
                $query->where('user_id', Auth::id());
            })
            ->get();

        foreach ($tasks as $task) {
            $task->update(['is_read' => 1]);
        }

        return redirect()->route('tasks.index');
    }
}
