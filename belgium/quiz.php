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
    <div class="container">
        <div class="titre">
            <h1>BELGIQUE</h1>
        </div>
        <div class="row">
            <div class="col-sm">
                <div class="carte">
                    <!-- carte 700px -->
                    <div class="carte700">
                        <?php require('php/carte-belgique-700.php'); ?>
                    </div>
                    <!-- carte 500px -->
                    <div class="carte500">
                        <?php require('php/carte-belgique-500.php'); ?>
                    </div>
                    <!-- carte 300px -->
                    <div class="carte300">
                        <?php require('php/carte-belgique-300.php'); ?>
                    </div>
                </div>
            </div>
            <!-- liste provinces -->
            <div class="col-sm">
                <div class="liste">
                   <h3>POROVINCES</h3>
                    <ul>
                        <li id="list-a"><p>Hainaut</p></li>
                        <li id="list-b"><p>Namur</p></li>
                        <li id="list-c"><p>Luxemburg</p></li>
                        <li id="list-d"><p>Liege</p></li>
                        <li id="list-e"><p>lumburd</p></li>
                        <li id="list-f"><p>Anvers</p></li>
                        <li id="list-g"><p>Flandre occidental</p></li>
                        <li id="list-h"><p>Flandre oriental</p></li>
                        <li id="list-i"><p>Brabant wallon</p></li>
                        <li id="list-j"><p>Braband flamand</p></li>
                        <li id="list-k"><p>Bruxelles</p></li>
                    </ul> 
                </div>
            </div>
        </div>
        
    </div>
    <div class="description"></div>
<!-- BOOTSTRAP JS -->
<script src='https://code.jquery.com/jquery-3.3.1.slim.min.js' integrity='sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo' crossorigin='anonymous'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js' integrity='sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut' crossorigin='anonymous'></script>
<script src='https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js' integrity='sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k' crossorigin='anonymous'></script>
<script>

// JS
let container = document.querySelector('.container'); // select .container
let provincesImg = document.querySelectorAll('.carte g'); // select g
let provincesList = document.querySelectorAll('.liste li'); // select ul
let description = $(".description"); // selection div tooltip

provincesImg.forEach(function(path){ // POUR CHAQUE "g" 
    path.addEventListener('mouseenter', function(e) { // AU MOMENT OU LE CURSEUR ENTRE DANS LA ZONE


        description.addClass('active'); // ajouter class "active" à la div tooltip
        description.html($(this).attr('id')); // écrit dans la div tooltip ce qu'il y a das l'id du path


        let id = this.id.replace('province-','') // REMPLACER L'ID PAR RIEN
        container.querySelectorAll('.is-active').forEach(function (item){
            item.classList.remove('is-active')
            console.log(id)
        })
        document.querySelector('#list-' + id).classList.add('is-active'); // RAJOUTE LA CLASS "is-active" 
        document.querySelector('#province-' + id).classList.add('is-active'); // RAJOUTE LA CLASS "is-active"
    })
})

$(document).on('mousemove', function(e){ // position tooltip
    description.css({
        left:  e.pageX,
        top:   e.pageY - 70
    });
});

let test = 'ok'
// console.log('​provincesImg', provincesImg);
// console.log('​provinceList', provincesList);





</script>
</body>
</html>