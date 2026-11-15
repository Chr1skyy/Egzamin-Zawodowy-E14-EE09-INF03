function zamowienie() {
    let ksztalt = Number(document.getElementById("ksztalt").value);
    let r = document.getElementById("r").value;
    let g = document.getElementById("g").value;
    let b = document.getElementById("b").value;
    let wynik = document.getElementById("wynik");
    if (ksztalt == 1) {
        wynik.innerHTML = "Twoje zamówienie to cukierek cytryna";
    } else if (ksztalt == 2) {
        wynik.innerHTML = "Twoje zamówienie to cukierek liść";
    } else if (ksztalt == 3) {
        wynik.innerHTML = "Twoje zamówienie to cukierek banan";
    } else {
        wynik.innerHTML = "Twoje zamówienie to cukierek inny";
    }
    document.getElementById("kolor").style.backgroundColor = "rgb(" + r + ", " + g + ", " + b + ")";
}
