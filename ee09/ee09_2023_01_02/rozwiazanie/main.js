let nr = 1
function zamiana(src, numer) {
    let glowne = document.getElementById('glowne')
    glowne.src = src
    nr = numer

}

function prev() {
    let aktualne = document.getElementById('glowne')
    nr--
    if (nr == 0) nr = 5
    if (nr == 1) aktualne.src = 'img/1.jpg'
    if (nr == 2) aktualne.src = 'img/2.jpg'
    if (nr == 3) aktualne.src = 'img/3.jpg'
    if (nr == 4) aktualne.src = 'img/4.jpg'
    if (nr == 5) aktualne.src = 'img/5.jpg'
}

function next() {
    let aktualne = document.getElementById('glowne')
    nr++
    if (nr == 6) nr = 1
    if (nr == 1) aktualne.src = 'img/1.jpg'
    if (nr == 2) aktualne.src = 'img/2.jpg'
    if (nr == 3) aktualne.src = 'img/3.jpg'
    if (nr == 4) aktualne.src = 'img/4.jpg'
    if (nr == 5) aktualne.src = 'img/5.jpg'
}