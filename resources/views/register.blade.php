<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Registreren</title>

    <style>
        .RegBody{
            font-family: Arial, sans-serif;
            background:#f4f4f4;
            display:flex;
            justify-content:center;
            align-items:center;
            height:100vh;
        }

        .RegContainer{
            background:white;
            padding:30px;
            width:400px;
            border-radius:10px;
            box-shadow:0 0 10px rgba(0,0,0,.1);
        }

        .RegName{
            width:100%;
            padding:10px;
            margin-top:5px;
            margin-bottom:15px;
        }
        .RegEmail{
            width:100%;
            padding:10px;
            margin-top:5px;
            margin-bottom:15px;
        }
        .RegPass{
            width:100%;
            padding:10px;
            margin-top:5px;
            margin-bottom:15px;
        }
        .RegConfirm{
            width:100%;
            padding:10px;
            margin-top:5px;
            margin-bottom:15px;
        }

        .SubmitReg{
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
<body class="RegBody">

<div class="RegContainer">

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
        <input class="RegName"
                type="text"
                name="name"
                value="{{ old('name') }}"
        >

        <label>Email</label>
        <input class="RegEmail"
                type="email"
                name="email"
                value="{{ old('email') }}"
        >

        <label>Wachtwoord</label>
        <input class="RegPass"
                type="password"
                name="password"
        >

        <label>Bevestig wachtwoord</label>
        <input class="RegConfirm"
                type="password"
                name="password_confirmation"
        >

        <button class="SubmitReg" type="submit">
            Registreren
        </button>

    </form>

</div>

</body>
</html>
