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

    <h1>Top 10 des memes</h1>
    <p class="timer">Dernière mise à jour: <span id="refresh"></span></p>

    <div class="platform">
        <!-- Bronze = 3e -->
        <div class="bronze">
            <h2 class="rank">3</h2>
            @if(isset($memes[2]))
            <div class="meme" >
            <h2 style="word-break: break-word;
    hyphens: auto;">{{ $memes[2]->text }}</h2>
            <img src="{{ $memes[2]->portrait->source }}" alt="3rd meme" class="portrait">
            <p>Likes: {{ $memes[2]->likes }}</p>
            @endif         
            </div>
        </div>

        <!-- Gold = 1er -->
        <div class="gold">
            <h2 class="rank">1</h2>
            @if(isset($memes[0]))
            <div class="meme">
            <h2 style="word-break: break-word;
    hyphens: auto;">{{ $memes[0]->text }}</h2>                
            <img src="{{ $memes[0]->portrait->source }}" alt="1st meme" class="portrait">
            <p>Likes: {{ $memes[0]->likes }}</p>
            @endif
            </div>
        </div>

        <!-- Silver = 2e -->
        <div class="silver">
            <h2 class="rank">2</h2>
            @if(isset($memes[1]))
            <div class="meme">
            <h2 style="word-break: break-word;
    hyphens: auto;">{{ $memes[1]->text }}</h2>            
            <img src="{{ $memes[1]->portrait->source }}" alt="2nd meme" class="portrait">
            <p>Likes: {{ $memes[1]->likes }}</p>
            @endif                
            </div>
        </div>

    </div>
    <div class="leaderboard-others">
            @if($memes->count() > 3)
            @foreach($memes->slice(3, 7) as $index => $meme)
                <div class="meme-row">
                    <p class="meme-text">{{ $meme->text }}</p>
                    <img src="{{ $meme->portrait->source }}" alt="Meme" class="small-portrait">
                </div>
            @endforeach
            @endif
        
    </div>

    <script>
        document.getElementById('refresh').innerText = new Date().toLocaleTimeString();
        setTimeout(() => location.reload(), 120000);

    // Font shrink
    document.addEventListener('DOMContentLoaded', () => {

    function applyLeaderboardShrink() {
        const memes = document.querySelectorAll(".meme");
        const MAX_HEIGHT = 50;

        memes.forEach(meme => {
            const h2 = meme.querySelector('h2');
            if (!h2) return;

            h2.style.fontSize = "24px";
            let fontSize = 24;

            while (h2.scrollHeight > MAX_HEIGHT && fontSize > 16) {
                fontSize--;
                h2.style.fontSize = fontSize + "px";
            }
        });
    }

        function applyRowShrink() {
        const memes = document.querySelectorAll(".meme-row");
        const MAX_HEIGHT = 50;

        memes.forEach(meme => {
            const p = meme.querySelector('p');
            if (!p) return;

            p.style.fontSize = "18px";
            let fontSize = 18;

            while (p.scrollHeight > MAX_HEIGHT && fontSize > 14) {
                fontSize--;
                p.style.fontSize = fontSize + "px";
            }
        });
    }
    applyLeaderboardShrink();
    applyRowShrink();
});



    </script>
</body>
</html>