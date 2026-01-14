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

        <div id="voteLimitModal">
            <div class="modal-content">
                <h2 style="color: white;">Limite atteinte ! ✋</h2>
                <p style="color: #ccc;">Tu as voté 5 fois. Crée un meme pour débloquer la suite !</p>
                <a href="{{ route('memes.create') }}" class="button" style="display:inline-block; margin-top:20px; background:#ff4757; color:white; padding:10px 20px; text-decoration:none; border-radius:5px;">Créer mon Meme</a>
            </div>
        </div>

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

    <a href="{{ route('memes.create') }}" class="button">créer ton meme</a>

<script>
document.addEventListener('DOMContentLoaded', () => {
    let slideIndex = 0;
    const slides = document.querySelectorAll(".mySlides");
    const hiddenInput = document.getElementById("selected_meme_id");
    const voteButtons = document.getElementById("voteButtons");
    const modal = document.getElementById("voteLimitModal");

    if (slides.length === 0) return;

    let voteCount = parseInt(localStorage.getItem('vote_count')) || 0;

    function showSlide(index) {
        slides.forEach(slide => {
            slide.style.display = "none";
            slide.classList.remove("active-slide");
        });

        const currentSlide = slides[index];
        if (currentSlide) {
            currentSlide.style.display = "block";
            currentSlide.classList.add("active-slide");
            const currentId = currentSlide.getAttribute("data-meme-id");
            if (hiddenInput) hiddenInput.value = currentId;
            addView(currentId);
        }
    }

    function checkVoteLimit() {
        if (voteCount >= 5) {
            if(voteButtons) voteButtons.style.display = 'none';
            if(modal) modal.style.display = 'flex';
            return true;
        }
        return false;
    }

    window.prevSlide = function() {
        if (checkVoteLimit()) return;
        
        voteCount++;
        localStorage.setItem('vote_count', voteCount);
        
        if (!checkVoteLimit()) {
            slideIndex = (slideIndex + 1) % slides.length;
            showSlide(slideIndex);
        }
    }

    window.likeAndNext = function() {
        if (checkVoteLimit()) return;

        likeCurrentMeme();
        
        voteCount++;
        localStorage.setItem('vote_count', voteCount);
        
        if (!checkVoteLimit()) {
            slideIndex = (slideIndex + 1) % slides.length;
            showSlide(slideIndex);
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

    if (!checkVoteLimit()) {
        showSlide(slideIndex);
    }
});
</script>
</body>
</html>
