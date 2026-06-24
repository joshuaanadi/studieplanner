<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Taak Toevoegen</title>

    <style>
        body{
            font-family: Arial, sans-serif;
            background:#f4f4f4;
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

        h1{
            margin-bottom:20px;
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
            border:none;
            background:#2563eb;
            color:white;
            cursor:pointer;
        }

        .error{
            color:red;
            margin-bottom:15px;
        }
    </style>
</head>
<body>

<div class="container">

    <h1>Nieuwe Taak</h1>

    @if($errors->any())
        <div class="error">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="/tasks" method="POST">
        @csrf

        <label>Titel</label>
        <input type="text" name="title">

        <label>Beschrijving</label>
        <textarea name="description"></textarea>

        <label>Deadline</label>
        <input type="date" name="deadline">

        <label>Prioriteit</label>
        <select name="priority">
            <option value="low">Laag</option>
            <option value="medium">Gemiddeld</option>
            <option value="high">Hoog</option>
        </select>

        <button type="submit">
            Taak toevoegen
        </button>

    </form>

</div>

</body>
</html>
