<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('styles/create.css') }}">
    <title>Choisis ton tableau</title>
</head>
<body>

<h1>Choisis ton tableau</h1>

<form action="{{ route('memes.store') }}" method="POST">
    @csrf

    <div class="galerie">
        @foreach ($portraits as $portrait)
            <label class="tableau">
                <input 
                    type="radio" 
                    name="portrait_id" 
                    value="{{ $portrait->id }}" 
                    required
                >

                <img 
                    src="{{ $portrait->source }}" 
                    alt="Tableau"
                    style="max-width:250px;"
                >
            </label>
        @endforeach
    </div>

    <label for="text">Écris ton commentaire</label>
    <input type="text" name="text" id="text" required>

    <button type="submit">VALIDER</button>
</form>

<a href="{{ route('memes.galerie') }}" class="button">
    VOTER SANS CRÉER
</a>

</body>
</html>