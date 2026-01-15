<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/styles/dashboard.css">
    <title>Admin - Modération</title>
</head>
<body>

<div class="header">
    <p>Dernière mise à jour: <span id="refresh"></span></p>
    <h1>Memes restants : {{ $memes->count() }}</h1>
</div>

<div class="container">
    <div class="list">
        <h3>En attente :</h3>
        <div class="grid">
                @foreach($memes as $m)
                <div>
                    <div>
                        <strong>#{{ $m->id }} - {{ Str::limit($m->text, 30) }}</strong>
                    </div>
                    <img src="{{ $m->portrait->source }}" alt="">
                </div>
                    
                
                @endforeach
        </div>
        
    </div>

    <div class="focus">
        @if($memes->count() > 0)
            @php $current = $memes->first(); @endphp
            <div class="meme">
                <h2 style="word-break: break-word;
    hyphens: auto;">Texte : {{ $current->text }}</h2>
                <img src="{{ $current->portrait->source }}">
            </div>
            
            <div class="btn-container">
                <form action="{{ route('admin.delete', $current->id) }}" method="POST">
                    @csrf @method('DELETE')
                    <button type="submit" class="btn btn-ban">BAN</button>
                </form>

                <form action="{{ route('admin.validate', $current->id) }}" method="POST">
                    @csrf @method('PATCH')
                    <button type="submit" class="btn btn-ok">VALIDER</button>
                </form>
            </div>
        @else
            <h2 style="color: #fff;">Bravo ! Plus rien à modérer.</h2>
        @endif
    </div>
</div>

    <script>
        document.getElementById('refresh').innerText = new Date().toLocaleTimeString();
        setTimeout(() => location.reload(), 120000);
    </script>
</body>
</html>