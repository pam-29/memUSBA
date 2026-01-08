<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/galerie.css">
    <title>MemUSBA</title>
</head>

<body>
    <div class="container">
        <h1>Galerie des Memes</h1>
        <a href="{{ route('memes.create') }}" class="button" >← Créer un nouveau meme</a>


        <div class="grid">
            @foreach($memes as $meme)
                <div class="GridPosition">
                    <div>
                        <h2>
                            {{ $meme->text }}
                        </h2>
                    </div>
                    <img src="{{ $meme->portrait->source }}">
                </div>
            @endforeach
        </div>
    </div>
</body>
</html> 