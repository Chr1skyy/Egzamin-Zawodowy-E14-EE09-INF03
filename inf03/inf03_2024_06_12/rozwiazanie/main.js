function zastosujEfekt() {
    let obraz = document.getElementById("obraz1");
    if (document.getElementById("blur").checked) {
        obraz.style.filter = "blur(6px)";
    } else if (document.getElementById("sepia").checked) {
        obraz.style.filter = "sepia(100%)";
    } else if (document.getElementById("negatyw").checked) {
        obraz.style.filter = "invert(100%)";
    }
}

function kolor() {
    document.getElementById("obraz2").style.filter = "grayscale(0%)";
}

function czarnoBialy() {
    document.getElementById("obraz2").style.filter = "grayscale(100%)";
}

function zastosujPrzezroczystosc() {
    let wartosc = document.getElementById("przezroczystosc").value;
    document.getElementById("obraz3").style.filter = "opacity(" + wartosc + "%)";
}

function zastosujJasnosc() {
    let wartosc = document.getElementById("jasnosc").value;
    document.getElementById("obraz4").style.filter = "brightness(" + wartosc + "%)";
}
