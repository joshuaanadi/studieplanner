<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Login</title>

    <style>
        .LoginBody{
            font-family: Arial, sans-serif;
            background:#f4f4f4;
            display:flex;
            justify-content:center;
            align-items:center;
            height:100vh;
        }

        .LoginContainer{
            background:white;
            padding:30px;
            width:400px;
            border-radius:10px;
            box-shadow:0 0 10px rgba(0,0,0,.1);
        }

        .LoginEmail{
            width:100%;
            padding:10px;
            margin-bottom:15px;
            box-sizing:border-box;
        }
        .LoginPass{
            width:100%;
            padding:10px;
            margin-bottom:15px;
            box-sizing:border-box;
        }

        .SubmitLogin{
            width:100%;
            padding:12px;
            background:#2563eb;
            color:white;
            border:none;
            cursor:pointer;
        }

        .LoginError{
            color:red;
            margin-bottom:15px;
        }
    </style>
</head>
<body class="LoginBody">

<div class="LoginContainer">

    <h2>Inloggen</h2>

    @if ($errors->any())
        <div class="LoginError">
            {{ $errors->first() }}
        </div>
    @endif

    <form action="/login" method="POST">
        @csrf

        <label>Email</label>
        <input class="LoginEmail"
            type="email"
            name="email"
            value="{{ old('email') }}"
            required
        >

        <label>Wachtwoord</label>
        <input class="LoginPass"
            type="password"
            name="password"
            required
        >

        <button class="SubmitLogin" type="submit">
            Login
        </button>
    </form>

</div>

</body>
</html>
