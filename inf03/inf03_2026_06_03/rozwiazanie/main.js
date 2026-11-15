function podmienObraz(plik) {
    document.querySelector(".obraz").src = "img/" + plik;
}

function otworzOkno() {
    let obrazGlowny = document.querySelector(".obraz");
    let obrazOkno = document.querySelector(".obrazOkno");
    obrazOkno.src = obrazGlowny.src;
    document.querySelector(".okno").style.display = "block";
}

function zamknijOkno() {
    document.querySelector(".okno").style.display = "none";
}
