<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/create.css">
    <title>Document</title>
</head>
<body>
    <h1>Choisis ton tableau</h1>
    
    <!-- Slideshow -->

     <div class="relative max-w-4xl mx-auto overflow-hidden shadow-xl rounded-lg">
    
        @foreach($portraits as $index => $portrait)
            <div class="mySlides {{ $index == 0 ? 'block' : 'hidden' }} fade">
                <div class="absolute top-0 left-0 bg-black/50 text-white p-2">
                    {{ $index + 1 }} / {{ $portraits->count() }}
                </div>
                <img src="{{ $portrait->source }}" class="w-full h-[500px] object-cover">
            </div>
        @endforeach

        <button class="absolute top-1/2 left-0 -translate-y-1/2 px-4 py-2 bg-black/30 hover:bg-black/60 text-white text-2xl" onclick="plusSlides(-1)">&#10094;</button>
        <button class="absolute top-1/2 right-0 -translate-y-1/2 px-4 py-2 bg-black/30 hover:bg-black/60 text-white text-2xl" onclick="plusSlides(1)">&#10095;</button>
    </div>


    <label for="name">Ecris ton commentaire</label>
    <input type="text" id="name">
    <a href="{{ route('memes.galerie') }}" class="button"> VALIDER </a>
    <a href="{{ route('memes.galerie') }}" class="button"> VOTER SANS CRÉER </a>

</body>

<script>
let slideIndex = 1;

function plusSlides(n) {
    showSlides(slideIndex += n);
}

function showSlides(n) {
    let i;
    let slides = document.getElementsByClassName("mySlides");
    
    if (n > slides.length) { slideIndex = 1 }
    
    if (n < 1) { slideIndex = slides.length }
    
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }
    
    slides[slideIndex - 1].style.display = "block";
}
</script>
</html>