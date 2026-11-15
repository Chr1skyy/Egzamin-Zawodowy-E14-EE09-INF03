function zmienImg(plik) {
    document.getElementById("zmiana").src = plik;
}

function polubZmien() {
    let ikona = document.getElementById("polub");
    if (ikona.src.includes("icon-off")) {
        ikona.src = "img/icon-on.png";
    } else {
        ikona.src = "img/icon-off.png";
    }
}
