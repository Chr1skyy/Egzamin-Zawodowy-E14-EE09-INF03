let gracz = 'kolko'

const sekcjaLewa = document.querySelector('#lewa')
const sekcjaPrawa = document.querySelector('#prawa')

function zaznaczPole(pole) {
    if (!pole.src.includes("img/nic.png")) return;
    if (gracz == 'kolko') {
        pole.src = 'img/o.png'
        sekcjaLewa.style.visibility = 'hidden'
        sekcjaPrawa.style.visibility = 'visible'
        gracz = 'krzyzyk'
    } else {
        pole.src = 'img/x.png'
        sekcjaLewa.style.visibility = 'visible'
        sekcjaPrawa.style.visibility = 'hidden'
        gracz = 'kolko'
    }
}