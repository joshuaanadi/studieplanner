<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Study Planner Dashboard</title>

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

        /* Navbar */

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

        /* Container */

        .container{
            width:90%;
            margin:30px auto;
        }

        .welcome{
            margin-bottom:30px;
        }

        .welcome h2{
            color:#333;
        }

        /* Stats */

        .stats{
            display:grid;
            grid-template-columns:repeat(auto-fit,minmax(250px,1fr));
            gap:20px;
            margin-bottom:40px;
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

        /* Tasks */

        .tasks-section{
            background:white;
            padding:25px;
            border-radius:12px;
            box-shadow:0 2px 10px rgba(0,0,0,.08);
        }

        .tasks-header{
            display:flex;
            justify-content:space-between;
            align-items:center;
            margin-bottom:20px;
        }

        .add-btn{
            background:#22c55e;
            color:white;
            border:none;
            padding:10px 18px;
            border-radius:6px;
            cursor:pointer;
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
            font-size:14px;
        }

        .todo{
            background:#fee2e2;
        }

        .progress{
            background:#fef3c7;
        }

        .done{
            background:#dcfce7;
        }

        .action-btn{
            padding:6px 12px;
            border:none;
            border-radius:5px;
            cursor:pointer;
        }

        .edit{
            background:#3b82f6;
            color:white;
        }

        .delete{
            background:#ef4444;
            color:white;
        }
    </style>
</head>
<body>

<nav class="navbar">
    <h1>Study Planner</h1>

    <form action="/logout" method="POST">
        @csrf
        <button class="logout-btn">
            Logout
        </button>
    </form>
</nav>

<div class="container">

    <div class="welcome">
        <h2>Welcome, {{ Auth::user()->name }}</h2>
        <p>Manage your study tasks and deadlines.</p>
    </div>

    <div class="stats">

        <div class="card">
            <h3>Open Tasks</h3>
            <p>5</p>
        </div>

        <div class="card">
            <h3>Completed Tasks</h3>
            <p>12</p>
        </div>

        <div class="card">
            <h3>Upcoming Deadlines</h3>
            <p>3</p>
        </div>

    </div>

    <div class="tasks-section">

        <div class="tasks-header">
            <h2>My Tasks</h2>

            <button class="add-btn">
                + Add Task
            </button>
        </div>

        <table>

            <thead>
            <tr>
                <th>Title</th>
                <th>Deadline</th>
                <th>Priority</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
            </thead>

            <tbody>

            <tr>
                <td>Laravel Assignment</td>
                <td>20-06-2026</td>
                <td>High</td>
                <td>
                            <span class="status progress">
                                In Progress
                            </span>
                </td>
                <td>
                    <button class="action-btn edit">Edit</button>
                    <button class="action-btn delete">Delete</button>
                </td>
            </tr>

            <tr>
                <td>Database Design</td>
                <td>22-06-2026</td>
                <td>Medium</td>
                <td>
                            <span class="status todo">
                                To Do
                            </span>
                </td>
                <td>
                    <button class="action-btn edit">Edit</button>
                    <button class="action-btn delete">Delete</button>
                </td>
            </tr>

            <tr>
                <td>Testing Report</td>
                <td>18-06-2026</td>
                <td>High</td>
                <td>
                            <span class="status done">
                                Completed
                            </span>
                </td>
                <td>
                    <button class="action-btn edit">Edit</button>
                    <button class="action-btn delete">Delete</button>
                </td>
            </tr>

            </tbody>

        </table>

    </div>

</div>

</body>
</html>
