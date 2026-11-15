function dodajDoKoszyka() {
    let sciezka = document.getElementById("plik").value;
    let nazwaPliku = sciezka.substr(sciezka.lastIndexOf("\\") + 1);
    let liczbaKopii = Number(document.getElementById("liczbaKopii").value);
    let cena = 0;
    if (document.getElementById("blyszczacy").checked) {
        cena = liczbaKopii * 1.5;
    } else if (document.getElementById("matowy").checked) {
        cena = liczbaKopii * 2;
    }

    let obraz = document.createElement("img");
    obraz.src = "img/" + nazwaPliku;
    let akapitKopie = document.createElement("p");
    akapitKopie.innerHTML = "Liczba kopii: " + liczbaKopii;
    let akapitCena = document.createElement("p");
    akapitCena.innerHTML = "Cena: " + cena;

    let koszyk = document.getElementById("koszyk");
    koszyk.appendChild(obraz);
    koszyk.appendChild(akapitKopie);
    koszyk.appendChild(akapitCena);
}
