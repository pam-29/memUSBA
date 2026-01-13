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
        <a class="arrow" onclick="plusSlides(1)">&#10094;</a>
        <a class="arrow" onclick="plusSlides(1)">&#10095;</a>
    </div>

<script>
    let slideIndex = 1;
    showSlides(slideIndex);

    function plusSlides(n) {
        showSlides(slideIndex += n); 
    }

    function showSlides(n) {
        let slides = document.getElementsByClassName("mySlides");
        let hiddenInput = document.getElementById("selected_meme_id");

        if (n > slides.length) { 
            slideIndex = 1; 
        }    

        for (let i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
            slides[i].classList.remove("active-slide");
        }

        let currentSlide = slides[slideIndex - 1];
        if (currentSlide) {
            currentSlide.style.display = "block";
            currentSlide.classList.add("active-slide");

            let currentId = currentSlide.getAttribute("data-meme-id");
            if (hiddenInput) {
                hiddenInput.value = currentId;
            }
        }
    }
</script>
</body>
</html>