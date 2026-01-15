<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meme Enregistré</title>
    <link rel="stylesheet" href="/styles/font.css">
    <link rel="stylesheet" href="/styles/confirmation.css">
</head>
<body>
    <div class="grid-overlay"></div>

    <h1>Ton meme a été<br>enregistré !</h1>

    <div class="meme-preview">
        <img src="{{ $meme->portrait->source }}" alt="Portrait utilisé">
    </div>

    <div class="info-text">
        <p>
            Le tableau que tu as utilisé pour créer ton meme s’appelle 
            <strong>{{ $meme->portrait->painting_name }}</strong> et a été fait par 
            <strong>{{ $meme->portrait->artist_name }}</strong> en 
            <strong>{{ $meme->portrait->year }}</strong>.
        </p>
        <p>Si tu veux voter pour le meilleur meme, clique sur le bouton ci-dessous !</p>
    </div>

    <a href="{{ route('memes.vote') }}" class="btn-vote">
        ALLER VOTER
    </a>
</body>
</html>