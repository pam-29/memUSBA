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
        <div class="mySlides" data-meme-id="{{$meme->id}}" style="display: none;">
            <h2>{{$meme->text}}</h2> 
            <img src="{{ $meme->portrait->source }}" alt="" class="image">
        </div>
        @endforeach

        <div class="vote" id="voteButtons">
            <a onclick="likeAndNext()" style="cursor: pointer;">
                <div class="arrow">
                    &#10094;
                    <p>❤️</p>
                </div>
            </a>
            <p style="font-size: 30px;">/</p>
            <a onclick="prevSlide()" style="cursor: pointer;">
                <div class="arrow">
                    <p>💔</p>    
                    &#10095;
                </div>
            </a>
        </div>
    @else
        <div style="text-align: center; padding: 50px;">
            <p>Il n'y a pas encore de memes à voter !</p>
        </div>
    @endif

    <a href="{{ route('memes.create') }}" class="button">créer ton meme pour voter plus</a>

<script>
document.addEventListener('DOMContentLoaded', () => {
    let slideIndex = 0;
    const slides = document.querySelectorAll(".mySlides");
    const hiddenInput = document.getElementById("selected_meme_id");
    const voteButtons = document.getElementById("voteButtons");

    if (slides.length === 0) return;

    let voteCount = parseInt(localStorage.getItem('vote_count')) || 0;

    function checkLimitAndHide() {
        if (voteCount >= 5) {
            if (voteButtons) voteButtons.style.display = 'none';
            return true;
        }
        return false;
    }

    function showSlide(index) {
        slides.forEach(slide => slide.style.display = "none");
        const currentSlide = slides[index];
        if (currentSlide) {
            currentSlide.style.display = "block";
            const currentId = currentSlide.getAttribute("data-meme-id");
            if (hiddenInput) hiddenInput.value = currentId;
            addView(currentId);
        }
    }

    window.prevSlide = function() {
        if (voteCount < 5) {
            voteCount++;
            localStorage.setItem('vote_count', voteCount);
            
            if (!checkLimitAndHide()) {
                slideIndex = (slideIndex + 1) % slides.length;
                showSlide(slideIndex);
            }
        }
    }

    window.likeAndNext = function() {
        if (voteCount < 5) {
            likeCurrentMeme();
            voteCount++;
            localStorage.setItem('vote_count', voteCount);
            
            if (!checkLimitAndHide()) {
                slideIndex = (slideIndex + 1) % slides.length;
                showSlide(slideIndex);
            }
        }
    }

    function likeCurrentMeme() {
        const memeId = hiddenInput?.value;
        if (!memeId) return;
        fetch("{{ route('memes.like') }}", {
            method: "POST",
            headers: {
                "X-CSRF-TOKEN": "{{ csrf_token() }}",
                "Content-Type": "application/json"
            },
            body: JSON.stringify({ meme_id: memeId })
        });
    }

    function addView(memeId) {
        fetch("{{ route('memes.view') }}", {
            method: "POST",
            headers: {
                "X-CSRF-TOKEN": "{{ csrf_token() }}",
                "Content-Type": "application/json"
            },
            body: JSON.stringify({ meme_id: memeId })
        });
    }

    showSlide(slideIndex);
    checkLimitAndHide();
});
</script>
</body>
</html>
