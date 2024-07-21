<?php

namespace Modules\Task\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        $tasks = Task::all();

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
        ]);

        // Attach users to the task
        if ($request->has('users')) {
            $task->users()->attach($request->users);
        }

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
}
