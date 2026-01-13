<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('styles/dashboard.css') }}">
    <title>Admin - Modération</title>
</head>
<body>

<div class="header">
    <h1>Memes restants : {{ $memes->count() }}</h1>
</div>

<div class="container">
    <div class="list">
        <h3>En attente :</h3>
        @foreach($memes as $m)
            <div style="border-bottom: 1px solid #ccc; padding: 5px;">
                <strong>#{{ $m->id }}</strong> - {{ Str::limit($m->text, 30) }}
            </div>
        @endforeach
    </div>

    <div class="focus">
        @if($memes->count() > 0)
            @php $current = $memes->first(); @endphp
            <div class="meme">
                <h2>Texte : {{ $current->text }}</h2>
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
            <h2 style="color: #666;">Bravo ! Plus rien à modérer.</h2>
        @endif
    </div>
</div>

</body>
</html>