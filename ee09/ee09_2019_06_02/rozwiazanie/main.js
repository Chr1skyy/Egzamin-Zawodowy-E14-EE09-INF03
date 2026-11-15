function oblicz() {
    let rodzajPaliwa = Number(document.getElementById("paliwo").value);
    let iloscLitrow = Number(document.getElementById("ilosc").value);
    let cena;
    if (rodzajPaliwa == 1) {
        cena = 4;
    } else if (rodzajPaliwa == 2) {
        cena = 3.5;
    } else {
        cena = 0;
    }
    let wynik = document.getElementById("wynik");
    wynik.innerHTML = "koszt paliwa: " + cena * iloscLitrow + " zł";
}
