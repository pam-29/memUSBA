<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Connexion</title>
    <style>
        body { background-color: #5d2da8; font-family: sans-serif; display: flex; justify-content: center; align-items: center; height: 100vh; margin: 0; }
        .login-box { background: white; padding: 40px; text-align: center; border-radius: 8px; }
        input { display: block; width: 100%; margin: 20px 0; padding: 10px; box-sizing: border-box; }
        button { background: #1a0b2e; color: white; border: none; padding: 10px 20px; cursor: pointer; width: 100%; }
    </style>
</head>
<body>
    <div class="login-box">
        <h1>ADMINISTRATION</h1>
        @if(session('error')) <p style="color: red;">{{ session('error') }}</p> @endif
        <form action="{{ route('admin.auth') }}" method="POST">
            @csrf
            <input type="password" name="password" placeholder="Mot de passe" required>
            <button type="submit">OK</button>
        </form>
    </div>
</body>
</html>