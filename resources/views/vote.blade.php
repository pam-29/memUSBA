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

        <div id="limitMessage" style="display: none;">
            <h2>
                créer un meme pour continuer à voter
            </h2>
        </div>

        <div class="vote" id="voteButtons">
            <a onclick="likeAndNext()" style="cursor: pointer;" class="arrow"> 
                <img src="/dislike.svg" alt="icone je n'aime pas">
            </a>

            <p style="font-size: 30px;">/</p>
            
            <a onclick="prevSlide()" style="cursor: pointer;" class="arrow">
                <img src="/like.svg" alt="icone j'aime">
            </a>
        </div>
    @else
        <div style="text-align: center; padding: 50px;">
            <p>Il n'y a pas encore de memes à voter !</p>
        </div>
    @endif

    <a href="{{ route('memes.create') }}" class="create-meme-button button small" id="btnCreateMeme" style="display: block;">créer ton meme</a>

<script>
document.addEventListener('DOMContentLoaded', () => {
    let slideIndex = 0;
    const slides = document.querySelectorAll(".mySlides");
    const hiddenInput = document.getElementById("selected_meme_id");
    const voteButtons = document.getElementById("voteButtons");
    const btnCreateMeme = document.getElementById("btnCreateMeme");

    if (slides.length === 0) return;

    let voteCount = parseInt(localStorage.getItem('vote_count')) || 0;

    function checkLimitAndHide() {
        if (voteCount >= 5) {
            slides.forEach(s => s.style.display = 'none');
            if (limitMessage) limitMessage.style.display = 'flex';
            if (voteButtons) voteButtons.style.display = 'none';
            if (btnCreateMeme) {
                btnCreateMeme.classList.remove('small');
                btnCreateMeme.classList.add('large');
            }
            return true;
        } else {
            if (btnCreateMeme) {
                btnCreateMeme.style.display = 'block'; 
                btnCreateMeme.classList.add('small');
                btnCreateMeme.classList.remove('large');
            }
        }
        if (limitMessage) limitMessage.style.display = 'none';
        return false;
    }

    window.prevSlide = function() {
        if (!checkLimitAndHide()) {
            voteCount++;
            localStorage.setItem('vote_count', voteCount);
            slideIndex = (slideIndex + 1) % slides.length;
            showSlide(slideIndex);
        }
    }

    window.likeAndNext = function() {
        if (!checkLimitAndHide()) {
            likeCurrentMeme();
            voteCount++;
            localStorage.setItem('vote_count', voteCount);
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



        // Font shrink
    function shrinkTextToFit(slide) {
            const h2 = slide.querySelector('h2');
            if (!h2) return;

            h2.style.fontSize = "24px"; 
            let fontSize = 24;

            while (h2.scrollHeight > h2.offsetHeight && fontSize > 10) {
                fontSize--;
                h2.style.fontSize = fontSize + "px";
            }
        }

    function showSlide(index) {
            slides.forEach(slide => slide.style.display = "none");
            const currentSlide = slides[index];
            
            if (currentSlide) {
                currentSlide.style.display = "block"; 
                
                shrinkTextToFit(currentSlide);

                const currentId = currentSlide.getAttribute("data-meme-id");
                if (hiddenInput) hiddenInput.value = currentId;
                addView(currentId);
            }
        }
    showSlide(slideIndex);
    checkLimitAndHide();

});


</script>
</body>
</html>
