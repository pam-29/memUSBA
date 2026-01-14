<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="https://i.postimg.cc/25tvsKK9/Icon.png">
    <link rel="stylesheet" href="/styles/vote.css">
    <link rel="stylesheet" href="/styles/font.css">
    <title>Vote</title>
</head>
<body>
    <h1>à toi de voter</h1>

    @if($memes->count() > 0)
        <input type="hidden" name="portrait_id" id="selected_meme_id" value="{{ $memes[0]->id }}">

        @foreach($memes as $meme)
        <div class="mySlides" data-meme-id="{{$meme->id}}">
            <h2>{{$meme->text}}</h2> 
            <img src="{{ $meme->portrait->source }}" alt="" class="image">
        </div>
        @endforeach

        <div class="vote">
            <a onclick="likeAndNext()">
                <div class="arrow">
                    &#10094;
                    <p>❤️</p>
                </div>
            </a>

            <p style="font-size: 30px;">/</p>

            <a onclick="prevSlide()">
                <div class="arrow">
                    <p>💔</p>    
                    &#10095;
                </div>
            </a>
        </div>
    @else
        <div style="text-align: center; padding: 50px;">
            <p>Il n'y a pas encore de memes à voter !</p>
            <p>Sois le premier à en créer un.</p>
        </div>
    @endif

    <a href="{{ route('memes.create') }}" class="button">créer ton meme</a>

<script>
document.addEventListener('DOMContentLoaded', () => {
    let slideIndex = 0;
    const slides = document.querySelectorAll(".mySlides");
    const hiddenInput = document.getElementById("selected_meme_id");
    const voteButtons = document.getElementById("voteButtons");
    const modal = document.getElementById("voteLimitModal");

    if (slides.length === 0) return;

    // compteur de like

    let voteCount = parseInt(localStorage.getItem('voteCount')) || 0;

    function checkVoteLimit() {
        if (voteCount >= (5)) {
            voteButtons.style.display = "none";
            modal.style.display = "flex";   // mettre la pop up ici
        }
    }

    checkVoteLimit();

    window.prevSlide = function() {
        incrementVote();
        slideIndex = (slideIndex + 1) % slides.length;
        showSlide(slideIndex);
    }

    window.likeAndNext = function() {
        incrementVote();
        likeCurrentMeme();
        slideIndex = (slideIndex + 1) % slides.length;
        showSlide(slideIndex);
    }

    function incrementVote
    {
        voteCount++;
        localStorage.setItem('vote_count', voteCount);
        checkVoteLimit();
    }

    // -----------------

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
        fetch("{{ route('memes.view') }}", {
            method: "POST",
            headers: {
                "X-CSRF-TOKEN": "{{ csrf_token() }}",
                "Content-Type": "application/json",
                "Accept": "application/json"
            },
            body: JSON.stringify({ meme_id: memeId })
        }).catch(err => console.error("View error:", err));
    }
});
</script>

</body>
</html>