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

    <h1>Ton meme a été enregistré !</h1>

    <div class="meme-preview">
        <img src="{{ $meme->portrait->source }}" alt="Portrait utilisé">
        <p class="info"> 
            {{ $meme->portrait->painting_name }},
            <i>{{ $meme->portrait->artist_name }}</i>, 
            {{ $meme->portrait->year }}
        </p>
    </div>

    <p>Si tu veux voter pour le meilleur meme, clique sur le bouton ci dessous !</p>


    <a href="{{ route('memes.vote') }}" class="btn-vote">
        ALLER VOTER
    </a>
</body>
</html>