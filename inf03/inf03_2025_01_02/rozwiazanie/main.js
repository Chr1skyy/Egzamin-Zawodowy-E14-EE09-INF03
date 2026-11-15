function oblicz() {
    let szerokosc = document.getElementById("szerokosc").value;
    let dlugosc = document.getElementById("dlugosc").value;
    let wynik = document.getElementById("wynik");
    if (szerokosc == "" || dlugosc == "") {
        wynik.innerHTML = "Wprowadź poprawne dane.";
    } else {
        let pole = Number(szerokosc) * Number(dlugosc);
        let koszt = 0;
        if (document.getElementById("laminowane").checked) {
            koszt = pole * 12;
        } else if (document.getElementById("winylowe").checked) {
            koszt = pole * 14;
        } else if (document.getElementById("deska").checked) {
            koszt = pole * 18;
        }
        wynik.innerHTML = "Pole powierzchni pomieszczenia: " + pole + ", koszt montażu " + koszt;
    }
}
