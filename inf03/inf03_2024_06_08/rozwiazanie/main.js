let szerokoscPaska = 4;

function pokazBlok(blok) {
    document.getElementById("blok1").style.display = "none";
    document.getElementById("blok2").style.display = "none";
    document.getElementById("blok3").style.display = "none";
    document.getElementById(blok).style.display = "block";
}

function aktualizujPasek() {
    szerokoscPaska = szerokoscPaska + 12;
    if (szerokoscPaska > 100) {
        szerokoscPaska = 100;
    }
    document.getElementById("pasek").style.width = szerokoscPaska + "%";
}

function zatwierdz() {
    let imie = document.getElementById("imie").value;
    let nazwisko = document.getElementById("nazwisko").value;
    let dataUrodzenia = document.getElementById("dataUrodzenia").value;
    let ulica = document.getElementById("ulica").value;
    let numer = document.getElementById("numer").value;
    let miasto = document.getElementById("miasto").value;
    let numerTelefonu = document.getElementById("numerTelefonu").value;
    let rodo = document.getElementById("rodo").checked;
    console.log(imie + ", " + nazwisko + ", " + dataUrodzenia + ", " + ulica + ", " + numer + ", " + miasto + ", " + numerTelefonu + ", " + rodo);
}
