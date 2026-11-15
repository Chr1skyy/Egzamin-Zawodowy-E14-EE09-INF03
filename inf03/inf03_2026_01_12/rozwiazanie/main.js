function dodajWzor() {
    let sciezka = document.getElementById("plikWzoru").value;
    let nazwaPliku = sciezka.substr(sciezka.lastIndexOf("\\") + 1);
    let kolor = document.getElementById("kolor").value;
    let cena = document.getElementById("cena").value;
    alert("Wzór: " + nazwaPliku + ", kolor " + kolor + " w cenie " + cena + " zł");

    let obraz = document.createElement("img");
    obraz.src = "img/" + nazwaPliku;
    obraz.alt = nazwaPliku;
    obraz.className = "miniatury";
    document.getElementById("galeria").appendChild(obraz);
}
