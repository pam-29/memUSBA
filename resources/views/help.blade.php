<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="https://i.postimg.cc/25tvsKK9/Icon.png">
    <link rel="stylesheet" href="/styles/font.css">
    <link rel="stylesheet" href="/styles/help.css">
    <title>Aide</title>
</head>
<body>
    <div class="about-container">

        <a href="{{route('memes.create')}}" class="close">
            <img src="/close.svg" alt="icone pour fermer la page">
        </a>
        <div class="container">
            <h1>Qu'est-ce qu'un meme ?</h1>
            <p>Un meme est une image accompagnée d’un commentaire et à pour objectif de faire rire. En soit c’est une blague en fonction d’une image !</p>
        </div>
        
        <div class="container">
            <h2>Comment jouer ?</h2>
            <ul>
                <li>Créer le meme le plus drôle.</li>
                <li>Regarder les memes des autres et les liker (ou non).</li>
                <li>Voir quel meme arrive sur le podium !</li>
            </ul>
        </div>
        
        <div class="container">
            <h2>Crédits</h2>
            <p>Créateurs des MemUSBA : </p>
            <ul class="credit">
                <li>Amélie Savary--Tolstoï</li>
                <li>Jordan Cha</li>
                <li>Pamela Rakatoarijaona</li>
                <li>Sara Rejimand</li>
                <li>Elia Rossi</li>
                <li>Matthias Oudart</li>
            </ul>
        </div>
        
        <div class="logo">
            <div>
                <img src="/logommi.png" alt="logo mmi">
                <img src="/logomusba.png" alt="logo memUSBA">
            </div>
            <img src="/bacchanight.svg" alt="logo bacchanight" class="logo-bacc">
        </div>
    </div>
</body>
</html>