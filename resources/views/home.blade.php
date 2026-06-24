<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Study Planner - Home</title>

    <style>
        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
            font-family:Arial, Helvetica, sans-serif;
        }

        body{
            background:#f4f6f9;
        }

        .navbar{
            background:#2563eb;
            color:white;
            padding:20px 40px;
            display:flex;
            justify-content:space-between;
            align-items:center;
        }

        .navbar h1{
            font-size:24px;
        }

        .logout-btn{
            background:white;
            color:#2563eb;
            border:none;
            padding:10px 20px;
            border-radius:6px;
            cursor:pointer;
            font-weight:bold;
        }

        .container{
            width:90%;
            max-width:1200px;
            margin:30px auto;
        }

        .welcome{
            margin-bottom:30px;
        }

        .welcome h2{
            color:#333;
            margin-bottom:5px;
        }

        .stats{
            display:grid;
            grid-template-columns:repeat(auto-fit,minmax(250px,1fr));
            gap:20px;
            margin-bottom:30px;
        }

        .card{
            background:white;
            padding:25px;
            border-radius:12px;
            box-shadow:0 2px 10px rgba(0,0,0,.08);
        }

        .card h3{
            color:#666;
            margin-bottom:10px;
        }

        .card p{
            font-size:32px;
            font-weight:bold;
            color:#2563eb;
        }

        .actions{
            margin-bottom:20px;
        }

        .add-btn{
            display:inline-block;
            text-decoration:none;
            background:#22c55e;
            color:white;
            padding:12px 20px;
            border-radius:6px;
        }

        .tasks-section{
            background:white;
            padding:25px;
            border-radius:12px;
            box-shadow:0 2px 10px rgba(0,0,0,.08);
        }

        table{
            width:100%;
            border-collapse:collapse;
        }

        th,
        td{
            padding:15px;
            text-align:left;
            border-bottom:1px solid #ddd;
        }

        th{
            background:#f8f8f8;
        }

        .status{
            padding:5px 10px;
            border-radius:20px;
            font-size:13px;
        }

        .todo{
            background:#fee2e2;
        }

        .in-progress{
            background:#fef3c7;
        }

        .completed{
            background:#dcfce7;
        }

        .empty{
            text-align:center;
            padding:30px;
            color:#777;
        }

        .priority-high{
            color:red;
            font-weight:bold;
        }

        .priority-medium{
            color:orange;
            font-weight:bold;
        }

        .priority-low{
            color:green;
            font-weight:bold;
        }
    </style>
</head>
<body>

<nav class="navbar">

    <h1>Study Planner</h1>

    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button class="logout-btn">
            Logout
        </button>
    </form>

</nav>

<div class="container">

    <div class="welcome">
        <h2>Welcome, {{ auth()->user()->name }}</h2>
        <p>Manage your school tasks and deadlines.</p>
    </div>

    <div class="stats">

        <div class="card">
            <h3>Open Tasks</h3>
            <p>{{ $openTasks }}</p>
        </div>

        <div class="card">
            <h3>Completed Tasks</h3>
            <p>{{ $completedTasks }}</p>
        </div>

        <div class="card">
            <h3>Total Tasks</h3>
            <p>{{ $tasks->count() }}</p>
        </div>

    </div>

    <div class="actions">

        <a href="/tasks/create" class="add-btn">
            + Add New Task
        </a>

    </div>

    <div class="tasks-section">

        <h2 style="margin-bottom:20px;">
            My Tasks
        </h2>

        <table>

            <thead>
            <tr>
                <th>Title</th>
                <th>Description</th>
                <th>Deadline</th>
                <th>Priority</th>
                <th>Status</th>
            </tr>
            </thead>

            <tbody>

            @forelse($tasks as $task)

                <tr>

                    <td>{{ $task->title }}</td>

                    <td>{{ $task->description }}</td>

                    <td>{{ $task->deadline }}</td>

                    <td class="priority-{{ $task->priority }}">
                        {{ ucfirst($task->priority) }}
                    </td>

                    <td>

                        @if($task->status === 'todo')
                            <span class="status todo">
                                To Do
                            </span>

                        @elseif($task->status === 'in_progress')
                            <span class="status in-progress">
                                In Progress
                            </span>

                        @else
                            <span class="status completed">
                                Completed
                            </span>
                        @endif

                    </td>
                    <td>
                        <a href="/tasks/{{ $task->id }}/edit">
                            Edit
                        </a>
                    </td>

                </tr>

            @empty

                <tr>
                    <td colspan="5" class="empty">
                        No tasks found. Create your first task!
                    </td>
                </tr>

            @endforelse

            </tbody>

        </table>

    </div>

</div>

</body>
</html>
