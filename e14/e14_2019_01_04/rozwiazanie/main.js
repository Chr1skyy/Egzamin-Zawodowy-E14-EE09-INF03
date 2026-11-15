function zamow() {
    let numer = Number(document.getElementById("numer").value);
    let waga = Number(document.getElementById("waga").value);
    let cena;
    if (numer == 1) {
        cena = 5;
    } else if (numer == 2) {
        cena = 7;
    } else if (numer == 3) {
        cena = 6;
    } else {
        cena = 0;
    }
    let wynik = document.getElementById("wynik");
    wynik.innerHTML = "Koszt zamówienia wynosi: " + waga * cena + " zł";
}
