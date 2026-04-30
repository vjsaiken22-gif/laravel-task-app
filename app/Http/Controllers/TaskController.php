<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::where('user_id', Auth::id())
                    ->latest()
                    ->get();

        return view('tasks', compact('tasks'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255'
        ]);

        Task::create([
            'title' => $request->title,
            'user_id' => Auth::id(),
        ]);

        return redirect()->back();
    }

    public function update($id)
    {
        $task = Task::where('user_id', Auth::id())
                    ->findOrFail($id);

        $task->is_done = !$task->is_done;
        $task->save();

        return redirect()->back();
    }

    public function destroy($id)
    {
        $task = Task::where('user_id', Auth::id())
                    ->findOrFail($id);

        $task->delete();

        return redirect()->back();
    }
}
