<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;


class HomeController extends Controller
{
    public function index()
    {
        $tasks = Task::where('user_id', auth()->id())
            ->latest()
            ->get();

        $openTasks = Task::where('user_id', auth()->id())
            ->where('status', 'todo')
            ->count();

        $completedTasks = Task::where('user_id', auth()->id())
            ->where('status', 'completed')
            ->count();

        return view('home', compact(
            'tasks',
            'openTasks',
            'completedTasks'
        ));
    }
}
