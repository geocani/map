<!DOCTYPE html>
<html lang='fr'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <meta http-equiv='X-UA-Compatible' content='ie=edge'>
    <!-- GOOGLE FONT -->
    <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <!-- BOOTSTRAP -->
    <link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css' integrity='sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS' crossorigin='anonymous'>
    <!-- CUSTOM CSS -->
    <link rel='stylesheet' href='assets/css/style-belgium.css'>
    <title>TITRE</title>
</head>
<body>
<style>

</style>


<div class="container">
    <div class="row">

        <div class="start-quiz-provinces">
            <p>
                <button class="btn btn-primary" type="button" id="start">
                    ENVOYER
                </button>
            </p>
        </div>

        <div class="q1">
            <div class="quiz-container">
            <h1>Suis-je un bon belge?</h1>
            <div class="question box">
                <div class="quiz-quiz-provinces">
                        <img src="assets/img/hainaut-700.svg" alt="">
                </div>
                <p><span>1.</span> Quelle est cette province?1</p>
            </div>
            <ul class="answers">
                <li class="answer box" id="hainaut">
                <p><span>a</span> un</p>
                </li>
                <li class="answer box" id="ma">
                <p><span>b</span> deux</p>
                </li>
                <li class="answer box" id="ma">
                <p><span>c</span> trois</p>
                </li>
                <li class="answer box" id="ma">
                <p><span>d</span> quatre</p>
                </li>
            </ul>
            <button class="box" id="envoyer">Envoyer1<span>&#x203A;</span></button>
            </div>
        </div>

        <div class="q2">
            <div class="quiz-container">
            <h1>Suis-je un bon belge?</h1>
            <div class="question box">
                <div class="quiz-quiz-provinces">
                        <img src="assets/img/anvers-700.svg" alt="">
                </div>
                <p><span>1.</span> Quelle est cette province?2</p>
            </div>
            <ul class="answers">
                <li class="answer box" id="anvers">
                <p><span>a</span> un</p>
                </li>
                <li class="answer box" id="ma">
                <p><span>b</span> deux</p>
                </li>
                <li class="answer box" id="ma">
                <p><span>c</span> trois</p>
                </li>
                <li class="answer box" id="ma">
                <p><span>d</span> quatre</p>
                </li>
            </ul>
            <button class="envoyer2 box" id="envoyer2">Envoyer2<span>&#x203A;</span></button>
            </div>
        </div>



        <div class="q3">
            <div class="quiz-container">
            <h1>Suis-je un bon belge?</h1>
            <div class="question box">
                <div class="quiz-quiz-provinces">
                        <img src="assets/img/liege-700.svg" alt="">
                </div>
                <p><span>1.</span> Quelle est cette province?3</p>
            </div>
            <ul class="answers">
                <li class="answer box" id="liege">
                <p><span>a</span> un</p>
                </li>
                <li class="answer box" id="ma">
                <p><span>b</span> deux</p>
                </li>
                <li class="answer box" id="ma">
                <p><span>c</span> trois</p>
                </li>
                <li class="answer box" id="ma">
                <p><span>d</span> quatre</p>
                </li>
            </ul>
            <button class="box" id="envoyer3">Envoyer3<span>&#x203A;</span></button>
            </div>
        </div>

        <div class="q4">
            <div class="quiz-container">
            <h1>Suis-je un bon belge?</h1>
            <div class="question box">
                <div class="quiz-quiz-provinces">
                        <img src="assets/img/namur-700.svg" alt="">
                </div>
                <p><span>1.</span> Quelle est cette province?4</p>
            </div>
            <ul class="answers">
                <li class="answer box" id="namur">
                <p><span>a</span> un</p>
                </li>
                <li class="answer box" id="ma">
                <p><span>b</span> deux</p>
                </li>
                <li class="answer box" id="ma">
                <p><span>c</span> trois</p>
                </li>
                <li class="answer box" id="ma">
                <p><span>d</span> quatre</p>
                </li>
            </ul>
            <button class="box" id="envoyer4">Envoyer3<span>&#x203A;</span></button>
            </div>
        </div>


    </div>
</div>



        


<?php
    // Si start
        // affiche q1
            //si ok
                // comptabilise
                // passe q2
            //si non
                // passe q2
?>

<!-- BOOTSTRAP JS -->
<script src='https://code.jquery.com/jquery-3.3.1.slim.min.js' integrity='sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo' crossorigin='anonymous'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js' integrity='sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut' crossorigin='anonymous'></script>
<script src='https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js' integrity='sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k' crossorigin='anonymous'></script>
<script>
$(document).ready(function(){
    var checkmark = "<span class='checkmark'>&#x2713;</span>";
  
  $(".answer").click(function() {
    $(this).siblings(".answer").removeClass("active").children("span").remove();
    $(this).addClass("active").append(checkmark);
  });












    $( "#start" ).click(function() {
        let score = 0;
        $('.start-quiz-provinces').css("display", "none")
        $('.q1').css("display", "block")
        $('#envoyer').click(function(){
            let rep1 = $('.active').attr('id')
            console.log(rep1)
            if(rep1 == "hainaut"){
                score++
                console.log(score)
                $('.q1').css("display", "none")
                $('.q2').css("display", "block")
            }else{
                console.log(score)
                // $('.q1').css("display", "none")
                // $('.q2').css("display", "block")
            }
        });
        $('.envoyer2').click(function(){
            let rep2 = $('.active').attr('id')

            console.log(rep2)
            if(rep2 == "anvers"){
                score++
                console.log(score)
                
                $('.q2').css("display", "none")
                $('.q3').css("display", "block")
            }else{
                console.log(score)
                // $('.q2').css("display", "none")
                // $('.q3').css("display", "block")
            }
        });
        $('#envoyer3').click(function(){
            let rep3 = $('.active').attr('id')
            if(rep3 == "mareponse3"){
                score++
                console.log(score)
                $('.q3').css("display", "none")
                $('.q4').css("display", "block")
            }else{
                console.log(score)
                $('.q3').css("display", "none")
                $('.q4').css("display", "block")
            }
        });
    });
  
});
</script>
</body>
</html>

<?php
    // Si start
        // affiche q1
            //si ok
                // comptabilise
                // passe q2
            //si non
                // passe q2
?>