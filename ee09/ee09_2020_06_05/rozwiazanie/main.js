function odkryj() {
    let krotkie = document.getElementById("krotkie").checked;
    let srednie = document.getElementById("srednie").checked;
    let poldlugie = document.getElementById("poldlugie").checked;
    let dlugie = document.getElementById("dlugie").checked;
    let cena = 0;
    if (krotkie) {
        cena = 25;
    } else if (srednie) {
        cena = 30;
    } else if (poldlugie) {
        cena = 40;
    } else if (dlugie) {
        cena = 50;
    }
    let wynik = document.getElementById("wynik");
    wynik.innerHTML = "Cena strzyżenia: " + cena;
}
