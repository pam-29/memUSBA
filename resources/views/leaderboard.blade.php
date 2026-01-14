<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/styles/leaderboard.css">
    <link rel="icon" type="image/png" href="https://i.postimg.cc/25tvsKK9/Icon.png">
    <link rel="stylesheet" href="/styles/font.css">
    <title>Leaderboard</title>
</head>

<body>
    <h1>Top memes</h1>

    <div class="platform">
        <!-- Bronze = 3e -->
        <div class="bronze">
            <h1>3</h1>
            @if(isset($memes[2]))
            <div class="meme">
            <p>{{ $memes[2]->text }}</p>
            <img src="{{ $memes[2]->portrait->source }}" alt="3rd meme" class="portrait">
            <p>Likes: {{ $memes[2]->likes }}</p>
            @endif         
            </div>
            

        </div>

        <!-- Gold = 1er -->
        <div class="gold">
            <h1>1</h1>
            @if(isset($memes[0]))
            <div class="meme">
            <p>{{ $memes[0]->text }}</p>                
            <img src="{{ $memes[0]->portrait->source }}" alt="1st meme" class="portrait">
            <p>Likes: {{ $memes[0]->likes }}</p>
            @endif
            </div>


        </div>

        <!-- Silver = 2e -->
        <div class="silver">
            <h1>2</h1>
            @if(isset($memes[1]))
            <div class="meme">
            <p>{{ $memes[1]->text }}</p>            
            <img src="{{ $memes[1]->portrait->source }}" alt="2nd meme" class="portrait">
            <p>Likes: {{ $memes[1]->likes }}</p>
            @endif                
            </div>


        </div>
    </div>


    <script>
        setTimeout(() => location.reload(), 120000);
    </script>
</body>
</html>
