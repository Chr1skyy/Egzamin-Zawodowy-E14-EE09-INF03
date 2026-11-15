let idZamowienia = 0;

function zaznaczBraki() {
    for (let i = 1; i <= 4; i++) {
        let komorka = document.getElementById("p" + i);
        let ilosc = Number(komorka.innerHTML);
        if (ilosc == 0) {
            komorka.style.backgroundColor = "red";
        } else if (ilosc >= 1 && ilosc <= 5) {
            komorka.style.backgroundColor = "yellow";
        } else {
            komorka.style.backgroundColor = "Honeydew";
        }
    }
}

function aktualizuj(id) {
    let nowaIlosc = prompt("Podaj nową ilość:");
    document.getElementById(id).innerHTML = nowaIlosc;
    zaznaczBraki();
}

function zamow(produkt) {
    idZamowienia++;
    alert("Zamówienie nr: " + idZamowienia + " Produkt: " + produkt);
}

zaznaczBraki();
