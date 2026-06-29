<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Task Details</title>

    <style>
        body{
            font-family: Arial, sans-serif;
            background:#f4f6f9;
            display:flex;
            justify-content:center;
            align-items:center;
            min-height:100vh;
        }

        .container{
            width:600px;
            background:white;
            padding:30px;
            border-radius:10px;
            box-shadow:0 0 10px rgba(0,0,0,.1);
        }

        h1{
            margin-bottom:20px;
        }

        .info{
            margin-bottom:20px;
        }

        .info strong{
            display:inline-block;
            width:120px;
        }

        .TaskHome{
            text-decoration:none;
            color:white;
            background:#2563eb;
            padding:10px 18px;
            border-radius:5px;
        }
    </style>
</head>
<body>

<div class="container">

    <h1>Task Details</h1>

    <div class="info">
        <strong>Title:</strong>
        {{ $task->title }}
    </div>

    <div class="info">
        <strong>Description:</strong>
        {{ $task->description }}
    </div>

    <div class="info">
        <strong>Deadline:</strong>
        {{ $task->deadline }}
    </div>

    <div class="info">
        <strong>Priority:</strong>
        {{ ucfirst($task->priority) }}
    </div>

    <div class="info">
        <strong>Status:</strong>
        {{ ucfirst(str_replace('_', ' ', $task->status)) }}
    </div>

    <a href="/home" class="TaskHome">
        Back to Home
    </a>

</div>

</body>
</html>
