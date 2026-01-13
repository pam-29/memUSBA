<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="https://i.postimg.cc/25tvsKK9/Icon.png">
    <link rel="stylesheet" href="styles/vote.css">
    <title>Vote</title>
</head>
<body>
    <h1>à toi de voter</h1>

    <input type="hidden" name="portrait_id" id="selected_meme_id" value="{{ $memes[0]->id }}">

    @foreach($memes as $meme)
    <div class="mySlides" data-meme-id="{{$meme->id}}">
        <h2>{{$meme->text}}</h2> 
        <img src="{{ $meme->portrait->source }}" alt="" class="image">
    </div>
    @endforeach

    <div>
        <a class="arrow" onclick="prevSlide()">&#10094;</a>
        <a class="arrow" onclick="likeAndNext()">&#10095;</a>
    </div>


<script>
document.addEventListener('DOMContentLoaded', () => {
    let slideIndex = 0;
    const slides = document.querySelectorAll(".mySlides");
    const hiddenInput = document.getElementById("selected_meme_id");

    if (slides.length === 0) return;

    // Affiche la première slide
    showSlide(slideIndex);

    // Flèche gauche = next sans like
    window.prevSlide = function() {
        slideIndex = (slideIndex + 1) % slides.length;
        showSlide(slideIndex);
    }

    // Flèche droite = like + next
    window.likeAndNext = function() {
        likeCurrentMeme();
        slideIndex = (slideIndex + 1) % slides.length;
        showSlide(slideIndex);
    }

    function showSlide(index) {
        slides.forEach(slide => {
            slide.style.display = "none";
            slide.classList.remove("active-slide");
        });

        const currentSlide = slides[index];
        currentSlide.style.display = "block";
        currentSlide.classList.add("active-slide");

        const currentId = currentSlide.getAttribute("data-meme-id");
        if (hiddenInput) hiddenInput.value = currentId;

        // ➕ +1 view
        addView(currentId);
    }

    function likeCurrentMeme() {
        const memeId = hiddenInput?.value;
        if (!memeId) return;

        fetch("{{ route('memes.like') }}", {
            method: "POST",
            headers: {
                "X-CSRF-TOKEN": "{{ csrf_token() }}",
                "Content-Type": "application/json",
                "Accept": "application/json"
            },
            body: JSON.stringify({ meme_id: memeId })
        }).catch(err => console.error("Like error:", err));
    }

    function addView(memeId) {
        if (!memeId) return;

        fetch("{{ route('memes.view') }}", {  // ← singulier
            method: "POST",
            headers: {
                "X-CSRF-TOKEN": "{{ csrf_token() }}",
                "Content-Type": "application/json",
                "Accept": "application/json"
            },
            body: JSON.stringify({ meme_id: memeId })
        })
        .then(res => res.json())
        .then(data => {
            if(!data.success) console.error("View not counted!");
        })
        .catch(err => console.error("View error:", err));
    }
});
</script>

</body>
</html>