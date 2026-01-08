<div class="container" style="max-width: 800px; margin: 0 auto; padding: 20px;">
    <h1>Galerie des Memes</h1>
    <a href="{{ route('memes.create') }}">← Créer un nouveau meme</a>
    <hr>

    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
        @foreach($memes as $meme)
            <div style="position: relative; border: 2px solid #000; background: #eee;">
                <img src="{{ $meme->portrait->source }}" style="width: 100%; display: block;">
                
                <div style="position: absolute; top: 10%; left: 0; width: 100%; text-align: center;">
                    <h2 style="color: white; 
                            text-transform: uppercase; 
                            font-family: Impact, sans-serif; 
                            font-size: 24px;
                            -webkit-text-stroke: 1px black; 
                            text-shadow: 2px 2px 0 #000;
                            margin: 0;
                            padding: 0 10px;">
                        {{ $meme->text }}
                    </h2>
                </div>
            </div>
        @endforeach
    </div>
</div>