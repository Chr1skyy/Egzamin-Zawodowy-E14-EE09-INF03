function aktualizujPole() {
    let suwak = document.getElementById("suwak");
    let wzrost = document.getElementById("wzrost");
    wzrost.value = suwak.value;
}

function obliczRozmiarRamy() {
    let wzrost = Number(document.getElementById("wzrost").value);
    let wspolczynnik = 0;
    if (document.getElementById("gorski").checked) {
        wspolczynnik = 0.26;
    } else if (document.getElementById("szosa").checked) {
        wspolczynnik = 0.3;
    } else if (document.getElementById("trekking").checked) {
        wspolczynnik = 0.28;
    }
    let rozmiar = Math.round(wzrost * wspolczynnik / 2.54);
    let wynik = document.getElementById("wynik");
    wynik.innerHTML = "Zalecany rozmiar ramy to: " + rozmiar + " cali";
}

function aktualnaData() {
    let dzisiaj = new Date();
    let dzien = dzisiaj.getDate();
    let miesiac = dzisiaj.getMonth() + 1;
    let rok = dzisiaj.getFullYear();
    if (dzien < 10) {
        dzien = "0" + dzien;
    }
    if (miesiac < 10) {
        miesiac = "0" + miesiac;
    }
    document.getElementById("komorkaDaty").innerHTML = dzien + "." + miesiac + "." + rok;
}
