let map = document.querySelector('#map'); // SELECTION DE LA DIV "MAP"
let provincesImg = document.querySelectorAll('.map__carte g'); // SELECTION DE TOUT LES "G"
let provincesList = document.querySelectorAll('.map__provinces li'); // SELECTION DE TOUT LES "UL"
console.log('​provincesImg', provincesImg);
console.log('​provinceList', provincesList);

provincesImg.forEach(function(path){ // POUR CHAQUE "g" 
    path.addEventListener('mouseenter', function(e) { // AU MOMENT OU LE CURSEUR ENTRE DANS LA ZONE
        let id = this.id.replace('province-','') // REMPLACER L'ID PAR RIEN
        map.querySelectorAll('.is-active').forEach(function (item){
            item.classList.remove('is-active')
        })
        document.querySelector('#list-' + id).classList.add('is-active'); // RAJOUTE LA CLASS "is-active" 
        document.querySelector('#province-' + id).classList.add('is-active'); // RAJOUTE LA CLASS "is-active"
    })
})