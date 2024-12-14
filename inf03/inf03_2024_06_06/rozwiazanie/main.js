function przejdzDoBloku(numerBloku) {
    const bloki = document.querySelectorAll('.blok');
    bloki.forEach((blok, index) => {
        blok.classList.add('ukryty')
        if (index === numerBloku - 1) {
            blok.classList.remove('ukryty')
        }
    })
}

function zatwierdz() {
    const haslo1 = document.getElementById('haslo1').value
    const haslo2 = document.getElementById('haslo2').value
    const imie = document.getElementById('imie').value
    const nazwisko = document.getElementById('nazwisko').value

    if (haslo1 !== haslo2) {
        alert('Podane hasła różnią się')
    }

    console.log("Witaj " + imie + " " + nazwisko)
}