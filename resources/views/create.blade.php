<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('styles/create.css') }}">
    <link rel="icon" type="image/png" href="https://i.postimg.cc/25tvsKK9/Icon.png">
    <title>Choisis ton tableau</title>
</head>
<body>

<h1>Choisis ton tableau</h1>

<form action="{{ route('memes.store') }}" method="POST">
    @csrf

    <input type="hidden" name="portrait_id" id="selected_portrait_id" value="{{ $portraits[0]->id }}">
    
    <div class="slider-container">
        <a class="prev" onclick="plusSlides(-1)">&#10094;</a>

        @foreach($portraits as $index => $portrait)
            <div class="mySlides fade {{ $index == 0 ? 'active' : '' }}" data-portrait-id="{{ $portrait->id }}">
                <img src="{{ $portrait->source }}" class="slider-image">
            </div>
        @endforeach

        <a class="next" onclick="plusSlides(1)">&#10095;</a>
    </div>

    <div class="input-container">
        <div>
            <label for="text">Crée ton meme</label>
            <textarea name="text" id="text" placeholder="Écris ton commentaire..."></textarea>
            <p id="wordError"  class="error"></p>
        </div>
        
        <button type="submit">VALIDER</button>
    </div>
</form>

    <a href="{{ route('memes.galerie') }}" class="button-vote">
        voter sans créer
    </a>


<script>
    //slider
    let slideIndex = 1;
    showSlides(slideIndex);

    function plusSlides(n) {
        showSlides(slideIndex += n);
    }

    function showSlides(n) {
    let slides = document.getElementsByClassName("mySlides");
    let hiddenInput = document.getElementById("selected_portrait_id");
    
    if (n > slides.length) { slideIndex = 1 }    
    if (n < 1) { slideIndex = slides.length }

    for (let i = 0; i < slides.length; i++) {
        slides[i].classList.remove("active-slide");
        slides[i].style.display = "none";
    }

    let currentSlide = slides[slideIndex - 1];
    currentSlide.style.display = "block";
    currentSlide.classList.add("active-slide");

    let currentId = currentSlide.getAttribute("data-portrait-id");
    hiddenInput.value = currentId;

    //moderation
    document.addEventListener('DOMContentLoaded', function() {
    const bannedWords = ['hitler','nazi','kkk','heilhitler','white power','supremacie blanche','negro','nègre','negre','bougnoule','chinetoque','youpin','feuj','pd','pédé','pedé','tapette','tafiole','travelo','tranny','connard','connasse','salope','pute','enculé','batard','bâtard','filsdepute','fdp','ntm','tg','tagueule','viol','violeur','meurtre','assassiner','tuer','égorger','terroriste','djihad','jihad','islamiste','antisémite','antisemite','salejuif','sale arabe','salenoir','salegay','salepédé','lynchage','génocide','genocide','kys','kill yourself','nigga','bite', 'zizi', 'suicide', 'paf', 'cul','homo','zezette']; 
    
    const form = document.querySelector('form');
    const textarea = document.getElementById('text');
    const errorMsg = document.getElementById('wordError');

    form.addEventListener('submit', function(event) {
        const originalText = textarea.value.toLowerCase();
        const compressedText = originalText.replace(/\s+/g, '');         
        let wordFound = null;

        for (let word of bannedWords) {
            const lowerWord = word.toLowerCase();
            
            if (originalText.includes(lowerWord) || compressedText.includes(lowerWord)) {
                wordFound = word;
                break;
            }
        }

        if (wordFound) {
            event.preventDefault();
            errorMsg.innerHTML = `Le mot <strong>${wordFound}</strong> est interdit.`;
            errorMsg.style.display = 'block';
            textarea.style.borderColor = 'red';
        }
    });

    textarea.addEventListener('input', function() {
        errorMsg.style.display = 'none';
        textarea.style.borderColor = '';
    });
});
}
</script>
</body>
</html>