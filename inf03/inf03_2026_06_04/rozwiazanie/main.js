function zmienSekcje(wybranaSekcja) {
    const uczestnikBtn = document.querySelector('#uczestnikBtn')
    const rezerwacjaBtn = document.querySelector('#rezerwacjaBtn')
    const poleImie = document.querySelector('#imie')
    const poleNazwisko = document.querySelector('#nazwisko')
    const poleLiczbaOsob = document.querySelector('#liczbaOsob')
    const poleMiejsceWylotu = document.querySelector('#miejsceWylotu')
    const polaWyzywienie = document.querySelectorAll('input[name="wyzywienie"]')
    if (wybranaSekcja == 'uczestnik') {
        uczestnikBtn.style.backgroundColor = 'dodgerblue'
        rezerwacjaBtn.style.backgroundColor = 'skyblue'
        poleImie.disabled = false
        poleNazwisko.disabled = false
        poleLiczbaOsob.disabled = true
        poleMiejsceWylotu.disabled = true
        polaWyzywienie.forEach(radio => radio.disabled = true)
    } else {
        uczestnikBtn.style.backgroundColor = 'skyblue'
        rezerwacjaBtn.style.backgroundColor = 'dodgerblue'
        poleImie.disabled = true
        poleNazwisko.disabled = true
        poleLiczbaOsob.disabled = false
        poleMiejsceWylotu.disabled = false
        polaWyzywienie.forEach(radio => radio.disabled = false)
    }
}

const wycieczki = [
    { obraz: "img/1.jpg", miejsce: "Barcelona" },
    { obraz: "img/2.jpg", miejsce: "Rzym" },
    { obraz: "img/3.jpg", miejsce: "Londyn" }
];
let numerWycieczki = 0

function poprzedniaWycieczka() {
    const zdjecieMiejsca = document.querySelector('#zdjecieMiejsca')
    const miejsceWycieczki = document.querySelector('#miejsceWycieczki')
    numerWycieczki--
    if (numerWycieczki < 0) numerWycieczki = 2
    zdjecieMiejsca.src = wycieczki[numerWycieczki].obraz
    miejsceWycieczki.innerHTML = wycieczki[numerWycieczki].miejsce
}

function nastepnaWycieczka() {
    const zdjecieMiejsca = document.querySelector('#zdjecieMiejsca')
    const miejsceWycieczki = document.querySelector('#miejsceWycieczki')
    numerWycieczki++
    if (numerWycieczki > 2) numerWycieczki = 0
    zdjecieMiejsca.src = wycieczki[numerWycieczki].obraz
    miejsceWycieczki.innerHTML = wycieczki[numerWycieczki].miejsce
}