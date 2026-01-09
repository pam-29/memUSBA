<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/home.css">
    <link rel="icon" type="image/png" href="https://i.postimg.cc/25tvsKK9/Icon.png">
    <title>MemUSBA</title>
</head>
<body>

<div class="wrapper">
		<span>😂</span>
        <span>🤪</span>
        <span>🤡</span>
        <span>👻</span>
        <span>😹</span>
        <span>👾</span>
        <span>🤖</span>
        <span>🥸</span>
</div>


    <h1>
        Bienvenue sur MemUSBA !
    </h1>

    <div class="container">
        <p>Viens créer ton propre meme et atteindre le podium</p>

        <a href="{{ route('memes.create') }}" class="button"> 
            COMMENCER
        </a>
    </div>

    <div class="container">
        <p>ou viens voter le meme des autres pour t’inspirer</p>
    
        <a href="{{ route('memes.galerie') }}" class="button">
            VOTER SANS CRÉER
        </a>
    </div>

</body>
</html> 