<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('styles/login.css') }}">
    <title>Admin - Connexion</title>
</head>
<body>
    <div class="login-box">
        <h1>Connexion</h1>
        @if(session('error')) <p style="color: red;">{{ session('error') }}</p> @endif
        <form action="{{ route('admin.auth') }}" method="POST">
            @csrf
            <input type="password" name="password" placeholder="Mot de passe" required>
            <button type="submit">OK</button>
        </form>
    </div>
</body>
</html>