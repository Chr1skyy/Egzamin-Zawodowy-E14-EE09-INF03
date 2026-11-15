function zamow() {
    let ksztalt = Number(document.getElementById("ksztalt").value);
    let r = document.getElementById("r").value;
    let g = document.getElementById("g").value;
    let b = document.getElementById("b").value;
    let wynik = document.getElementById("wynik");
    if (ksztalt == 1) {
        wynik.innerHTML = "Zamówiłeś żelka: miś";
    } else if (ksztalt == 2) {
        wynik.innerHTML = "Zamówiłeś żelka: żabka";
    } else if (ksztalt == 3) {
        wynik.innerHTML = "Zamówiłeś żelka: serce";
    } else {
        wynik.innerHTML = "Zamówiłeś żelka: inny kształt";
    }
    document.getElementById("kolor").style.backgroundColor = "rgb(" + r + ", " + g + ", " + b + ")";
}
