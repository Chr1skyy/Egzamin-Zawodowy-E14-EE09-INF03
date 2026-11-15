function kolorBg(kolor) {
    document.getElementById("prawy").style.backgroundColor = kolor;
}

function kolorFont() {
    let kolor = document.getElementById("kolorC").value;
    document.getElementById("prawy").style.color = kolor;
}

function rozmiarFont() {
    let rozmiar = document.getElementById("rozmiar").value;
    document.getElementById("prawy").style.fontSize = rozmiar + "%";
}

function ramka() {
    let obraz = document.getElementById("obraz");
    if (document.getElementById("ramka").checked) {
        obraz.style.border = "1px solid white";
    } else {
        obraz.style.border = "none";
    }
}

function punktor(typ) {
    document.getElementById("lista").style.listStyleType = typ;
}
