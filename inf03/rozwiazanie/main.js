let gracz = 'kolko'

const sekcjaLewa = document.querySelector('#lewa')
const sekcjaPrawa = document.querySelector('#prawa')

function zaznaczPole(pole) {
    if (!pole.src.includes("nic.png")) return;
    if (gracz == 'kolko') {
        pole.src = 'o.png'
        sekcjaLewa.style.visibility = 'hidden'
        sekcjaPrawa.style.visibility = 'visible'
        gracz = 'krzyzyk'
    } else {
        pole.src = 'x.png'
        sekcjaLewa.style.visibility = 'visible'
        sekcjaPrawa.style.visibility = 'hidden'
        gracz = 'kolko'
    }
}