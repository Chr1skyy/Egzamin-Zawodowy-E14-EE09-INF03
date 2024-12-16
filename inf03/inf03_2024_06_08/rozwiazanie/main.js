function pokazBlok(blok) {
    const bloki = ["blok1", "blok2", "blok3"]
    bloki.forEach(id => {
        document.getElementById(id).style.display = "none"
    })
    const wybranyBlok = document.getElementById(blok)
    wybranyBlok.style.display = "block";
}

let width = 4
function zaaktualizujPasek() {
    const pasek = document.getElementById("pasek")
    width += 12
    if (width > 100) {
        width = 100
    }
    pasek.style.width = width + "%"
}

document.querySelectorAll('input').forEach(input => {
    input.addEventListener('blur', zaaktualizujPasek)
})

function zatwierdz() {
    const imie = document.getElementById('imie').value
    const nazwisko = document.getElementById('nazwisko').value
    const dataUrodzenia = document.getElementById('dataUrodzenia').value
    const ulica = document.getElementById('ulica').value
    const numer = document.getElementById('numer').value
    const miasto = document.getElementById('miasto').value
    const numerTelefonu = document.getElementById('numerTelefonu').value
    const rodoAccepted = document.getElementById('rodo').checked

    console.log(imie + ", " + nazwisko + ", " + dataUrodzenia + ", " + ulica + ", " + numer + ", " + miasto + ", " + numerTelefonu + ", " + rodoAccepted);
}