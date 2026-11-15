function oblicz() {
    let peeling = document.getElementById("peeling").checked;
    let maska = document.getElementById("maska").checked;
    let masaz = document.getElementById("masaz").checked;
    let makijaz = document.getElementById("makijaz").checked;
    let cena = 0;
    if (peeling) {
        cena = cena + 45;
    }
    if (maska) {
        cena = cena + 30;
    }
    if (masaz) {
        cena = cena + 20;
    }
    if (makijaz) {
        cena = cena + 50;
    }
    let wynik = document.getElementById("wynik");
    wynik.innerHTML = "Cena zabiegów: " + cena;
}
