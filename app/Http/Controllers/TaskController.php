<?php

namespace App\Http\Controllers;
use App\Models\Task;
use Illuminate\Http\Request;


class TaskController extends Controller
{
    public function index()
    {

    }

    public function create()
    {
        return view('tasks.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'description' => 'nullable',
            'deadline' => 'required|date',
            'priority' => 'required'
        ]);

        Task::create([
            'user_id' => auth()->id(),
            'title' => $validated['title'],
            'description' => $validated['description'],
            'deadline' => $validated['deadline'],
            'priority' => $validated['priority'],
            'status' => 'todo'
        ]);

        return redirect('/home')
            ->with('success', 'Taak toegevoegd!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {

        return view('tasks.tasks', compact('task'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        if ($task->user_id !== auth()->id()) {
            abort(403);
        }

        return view('tasks.edit', compact('task'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task)
    {
        if ($task->user_id !== auth()->id()) {
            abort(403);
        }

        $validated = $request->validate([
            'title' => 'required|max:255',
            'description' => 'nullable',
            'deadline' => 'required|date',
            'priority' => 'required',
            'status' => 'required'
        ]);

        $task->update($validated);

        return redirect()->route('home')
            ->with('success', 'Task updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->route('home');
    }
}
