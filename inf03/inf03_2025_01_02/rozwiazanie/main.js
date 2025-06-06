function oblicz() {
    let szerokosc = +document.getElementById("szerokosc").value;
    let dlugosc = +document.getElementById("dlugosc").value;
    const wynik = document.getElementById("wynik");
    const typLaminowane = document.getElementById("laminowane");
    const typWinylowe = document.getElementById("winylowe");
    const typDeska = document.getElementById("deska");
    if (szerokosc == '' || dlugosc == '') {
        wynik.innerHTML = "Wprowadź poprawne dane";
    } else {
        let pole = dlugosc * szerokosc;
        let cena = 0
        if (typLaminowane.checked) {
            cena = 12 * pole;
        }
        if (typWinylowe.checked) {
            cena = 14 * pole;
        }
        if (typDeska.checked) {
            cena = 18 * pole;
        }
        wynik.innerHTML = `Pole powierzchni pomieszczenia: ${pole}, koszt montażu ${cena}`;
    }
}