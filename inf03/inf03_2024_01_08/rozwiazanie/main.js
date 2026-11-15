function odkryj() {
    let krotkie = document.getElementById("krotkie").checked;
    let srednie = document.getElementById("srednie").checked;
    let poldlugie = document.getElementById("poldlugie").checked;
    let dlugie = document.getElementById("dlugie").checked;
    let cena = 0;
    if (krotkie) {
        cena = 15;
    } else if (srednie) {
        cena = 20;
    } else if (poldlugie) {
        cena = 30;
    } else if (dlugie) {
        cena = 40;
    }
    let wynik = document.getElementById("wynik");
    wynik.innerHTML = "cena promocyjna: " + cena;
}
