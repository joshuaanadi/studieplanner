<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Registreren</title>

    <style>
        body{
            font-family: Arial, sans-serif;
            background:#f4f4f4;
            display:flex;
            justify-content:center;
            align-items:center;
            height:100vh;
        }

        .container{
            background:white;
            padding:30px;
            width:400px;
            border-radius:10px;
            box-shadow:0 0 10px rgba(0,0,0,.1);
        }

        input{
            width:100%;
            padding:10px;
            margin-top:5px;
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
            margin-bottom:10px;
        }
    </style>
</head>
<body>

<div class="container">

    <h2>Registreren</h2>

    @if ($errors->any())
        <div class="error">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="/register">
        @csrf

        <label>Naam</label>
        <input
                type="text"
                name="name"
                value="{{ old('name') }}"
        >

        <label>Email</label>
        <input
                type="email"
                name="email"
                value="{{ old('email') }}"
        >

        <label>Wachtwoord</label>
        <input
                type="password"
                name="password"
        >

        <label>Bevestig wachtwoord</label>
        <input
                type="password"
                name="password_confirmation"
        >

        <button type="submit">
            Registreren
        </button>

    </form>

</div>

</body>
</html>
