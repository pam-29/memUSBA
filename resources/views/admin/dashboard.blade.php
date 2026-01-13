<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Modération</title>
    <style>
        body { background-color: #5d2da8; color: white; font-family: sans-serif; padding: 20px; }
        .container { display: flex; gap: 20px; }
        .list { flex: 1; background: white; color: black; padding: 15px; border-radius: 5px; max-height: 80vh; overflow-y: auto; }
        .focus { flex: 1; background: #eee; color: black; padding: 20px; border-radius: 5px; text-align: center; }
        .focus img { max-width: 100%; height: auto; border: 2px solid #000; }
        .btn { padding: 15px 30px; border: none; cursor: pointer; color: white; font-weight: bold; margin: 10px; }
        .btn-ban { background: #1a0b2e; }
        .btn-ok { background: #28a745; }
        .header { display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px; }
    </style>
</head>
<body>

<div class="header">
    <h1>MEMES À VALIDER ({{ $memes->count() }})</h1>
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
            <h2>Texte : {{ $current->text }}</h2>
            <img src="{{ $current->portrait->source }}">
            
            <div style="margin-top: 20px; display: flex; justify-content: center;">
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