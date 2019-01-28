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
        <div class="quiz-container">
            <h1>Suis-je un bon belge?</h1>
            <div class="question box">
                <div class="quiz-quiz-provinces">
                    <img src="assets/img/namur-700.svg" alt="">
                </div>
                <p><span>1.</span> Quelle est cette province?</p>
            </div>
            <ul class="answers">
                <li class="answer box">
                    <p><span>a</span> un</p>
                </li>
                <li class="answer box">
                    <p><span>b</span> deux</p>
                </li>
                <li class="answer box">
                    <p><span>c</span> trois</p>
                </li>
                <li class="answer box">
                    <p><span>d</span> quatre</p>
                </li>
            </ul>
            <button class="box">Envoyer<span>&#x203A;</span></button>
        </div>
    </div>
</div>


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
  
  $("button").click(function() {
    if($(".active").length) {
      if($(".active").index() === 1) {
        alert("Well done!");
      } else {
        alert("Wrong answer!");
      }
    } else {
      alert("Please select an answer!");
    }
  });
});
</script>
</body>
</html>