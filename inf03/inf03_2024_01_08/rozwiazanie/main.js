function odkryj() {
    let krotkie = document.getElementById("krotkie").checked;
    let srednie = document.getElementById("srednie").checked;
    let poldlugie = document.getElementById("poldlugie").checked;
    let dlugie = document.getElementById("dlugie").checked;
    let wynik = document.getElementById("wynik");
    let cena = 0;
    if (krotkie) cena = 15;
    if (srednie) cena = 20;
    if (poldlugie) cena = 30;
    if (dlugie) cena = 40;
    wynik.innerHTML = "cena promocyjna: " + cena;
}