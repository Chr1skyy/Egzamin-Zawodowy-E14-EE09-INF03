function zmienStyl(kolor) {
    let rozmiar = document.getElementById("procent").value;
    let styl = document.getElementById("styl").value;
    let paragraf = document.getElementById("wynik");
    paragraf.style.color = kolor;
    paragraf.style.fontSize = rozmiar + "%";
    paragraf.style.fontStyle = styl;
}
