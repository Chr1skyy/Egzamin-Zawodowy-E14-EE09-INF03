function oblicz() {
    let javascript = document.getElementById("javascript").checked;
    let react = document.getElementById("react").checked;
    let liczbaRat = Number(document.getElementById("raty").value);
    let miasto = document.getElementById("miasto").value;
    let cena = 0;
    if (javascript) {
        cena = cena + 3000;
    }
    if (react) {
        cena = cena + 5000;
    }
    let rata = cena / liczbaRat;
    let wynik = document.getElementById("wynik");
    wynik.innerHTML = "Kurs odbędzie się w " + miasto + ". Koszt całkowity: " + cena + " zł. Płacisz " + liczbaRat + " rat po " + rata + " zł";
}
