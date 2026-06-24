<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Task</title>

    <style>
        body{
            font-family:Arial;
            background:#f4f6f9;
            display:flex;
            justify-content:center;
            align-items:center;
            min-height:100vh;
        }

        .container{
            width:500px;
            background:white;
            padding:30px;
            border-radius:10px;
            box-shadow:0 0 10px rgba(0,0,0,.1);
        }

        input,
        textarea,
        select{
            width:100%;
            padding:10px;
            margin-bottom:15px;
        }

        button{
            width:100%;
            padding:12px;
            background:#2563eb;
            color:white;
            border:none;
        }
    </style>
</head>
<body>

<div class="container">

    <h1>Edit Task</h1>

    <form action="/tasks/{{ $task->id }}" method="POST">

        @csrf
        @method('PUT')

        <label>Title</label>
        <input
            type="text"
            name="title"
            value="{{ $task->title }}"
        >

        <label>Description</label>
        <textarea name="description">{{ $task->description }}</textarea>

        <label>Deadline</label>
        <input
            type="date"
            name="deadline"
            value="{{ $task->deadline }}"
        >

        <label>Priority</label>

        <select name="priority">

            <option value="low"
                {{ $task->priority == 'low' ? 'selected' : '' }}>
                Low
            </option>

            <option value="medium"
                {{ $task->priority == 'medium' ? 'selected' : '' }}>
                Medium
            </option>

            <option value="high"
                {{ $task->priority == 'high' ? 'selected' : '' }}>
                High
            </option>

        </select>

        <label>Status</label>

        <select name="status">

            <option value="todo"
                {{ $task->status == 'todo' ? 'selected' : '' }}>
                To Do
            </option>

            <option value="in_progress"
                {{ $task->status == 'in_progress' ? 'selected' : '' }}>
                In Progress
            </option>

            <option value="completed"
                {{ $task->status == 'completed' ? 'selected' : '' }}>
                Completed
            </option>

        </select>

        <button type="submit">
            Update
        </button>

    </form>

</div>

</body>
</html>
