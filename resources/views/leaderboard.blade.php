<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('styles/leaderboard.css') }}">
    <link rel="icon" type="image/png" href="https://i.postimg.cc/25tvsKK9/Icon.png">
    <title>Leaderboard</title>

    <style>
    .portrait{
        width: 150px;
        height: 150px;
        object-fit: cover;
        border-radius: 10px;
    }
    </style>
</head>
<body>
    <h1>Top memes</h1>

    <div class="platform">
        <!-- Bronze = 3e -->
        <div class="bronze">
            <h1>3</h1>
            @if(isset($memes[2]))
            <img src="{{ $memes[2]->portrait->source }}" alt="3rd meme" class="portrait">
            <p>{{ $memes[2]->text }}</p>
            <p>Likes: {{ $memes[2]->likes }}</p>
            @endif
        </div>

        <!-- Gold = 1er -->
        <div class="gold">
            <h1>1</h1>
            @if(isset($memes[0]))
            <img src="{{ $memes[0]->portrait->source }}" alt="1st meme" class="portrait">
            <p>{{ $memes[0]->text }}</p>
            <p>Likes: {{ $memes[0]->likes }}</p>
            @endif
        </div>

        <!-- Silver = 2e -->
        <div class="silver">
            <h1>2</h1>
            @if(isset($memes[1]))
            <img src="{{ $memes[1]->portrait->source }}" alt="2nd meme" class="portrait">
            <p>{{ $memes[1]->text }}</p>
            <p>Likes: {{ $memes[1]->likes }}</p>
            @endif
        </div>
    </div>
</body>
</html>
