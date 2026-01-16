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
    <p>Dernière mise à jour: <span id="refresh"></span></p>

    <h1>Top memes</h1>
    <div class="platform">
        <!-- Bronze = 3e -->
        <div class="bronze">
            <h1>3</h1>
            @if(isset($memes[2]))
            <div class="meme">
            <p style="word-break: break-word;
    hyphens: auto;">{{ $memes[2]->text }}</p>
            <img src="{{ $memes[2]->portrait->source }}" alt="3rd meme" class="portrait">
            <p>Likes: {{ $memes[2]->likes }}</p>
            </div>
            @endif  
        </div>

        <!-- Gold = 1er -->
        <div class="gold">
            <h1>1</h1>
            @if(isset($memes[0]))
            <div class="meme">
            <p style="word-break: break-word;
    hyphens: auto;">{{ $memes[0]->text }}</p>                
            <img src="{{ $memes[0]->portrait->source }}" alt="1st meme" class="portrait">
            <p>Likes: {{ $memes[0]->likes }}</p>
            </div>
            @endif
        </div>

        <!-- Silver = 2e -->
        <div class="silver">
            <h1>2</h1>
            @if(isset($memes[1]))
            <div class="meme">
            <p style="word-break: break-word;
    hyphens: auto;">{{ $memes[1]->text }}</p>            
            <img src="{{ $memes[1]->portrait->source }}" alt="2nd meme" class="portrait">
            <p>Likes: {{ $memes[1]->likes }}</p>
            </div>
            @endif 
        </div>
    </div>


    <div class="leaderboard-others">
    @foreach($memes->slice(3, 7) as $index => $meme)
        <div class="meme-row">
            <span class="rank">{{ $index + 1 }}</span>
            <img src="{{ $meme->portrait->source }}" alt="Meme {{ $index + 1 }}" class="small-portrait">
            <p class="meme-text">{{ $meme->text }}</p>
            <p class="likes">Likes: {{ $meme->likes }}</p>
        </div>
    @endforeach
</div>

    <script>
        document.getElementById('refresh').innerText = new Date().toLocaleTimeString();
        setTimeout(() => location.reload(), 120000);
    </script>
</body>
</html>
