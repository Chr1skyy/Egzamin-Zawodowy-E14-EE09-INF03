function sprawdz() {
    let piling = document.getElementById("piling").checked;
    let maska = document.getElementById("maska").checked;
    let masaz = document.getElementById("masaz").checked;
    let regulacja = document.getElementById("regulacja").checked;
    let cena = 0;
    if (piling) {
        cena = cena + 45;
    }
    if (maska) {
        cena = cena + 30;
    }
    if (masaz) {
        cena = cena + 20;
    }
    if (regulacja) {
        cena = cena + 5;
    }
    let wynik = document.getElementById("wynik");
    wynik.innerHTML = "Cena zabiegów: " + cena;
}
