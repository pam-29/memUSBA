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
            <label for="text">Écris ton commentaire</label>
            <textarea name="text" id="text" placeholder="Moi quand je me réveille le matin."></textarea>
        </div>
        
        <button type="submit">VALIDER</button>
    </div>
</form>

    <a href="{{ route('memes.galerie') }}" class="button-vote">
        voter sans créer
    </a>


<script>
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
}
</script>
</body>
</html>