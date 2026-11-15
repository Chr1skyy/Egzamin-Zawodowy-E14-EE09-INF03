function pokazUczestnika() {
    document.getElementById("uczestnikBtn").style.backgroundColor = "DodgerBlue";
    document.getElementById("rezerwacjaBtn").style.backgroundColor = "SkyBlue";
    document.getElementById("imie").disabled = false;
    document.getElementById("nazwisko").disabled = false;
    document.getElementById("liczbaOsob").disabled = true;
    document.getElementById("miejsceWylotu").disabled = true;
    document.getElementById("sniadania").disabled = true;
    document.getElementById("sniadaniaObiadokolacje").disabled = true;
    document.getElementById("AllInclusive").disabled = true;
}

function pokazRezerwacje() {
    document.getElementById("uczestnikBtn").style.backgroundColor = "SkyBlue";
    document.getElementById("rezerwacjaBtn").style.backgroundColor = "DodgerBlue";
    document.getElementById("imie").disabled = true;
    document.getElementById("nazwisko").disabled = true;
    document.getElementById("liczbaOsob").disabled = false;
    document.getElementById("miejsceWylotu").disabled = false;
    document.getElementById("sniadania").disabled = false;
    document.getElementById("sniadaniaObiadokolacje").disabled = false;
    document.getElementById("AllInclusive").disabled = false;
}

let obrazy = ["img/1.jpg", "img/2.jpg", "img/3.jpg"];
let miejsca = ["Barcelona", "Rzym", "Londyn"];
let numerWycieczki = 0;

function poprzedniaWycieczka() {
    numerWycieczki--;
    if (numerWycieczki < 0) {
        numerWycieczki = 2;
    }
    document.getElementById("zdjecieMiejsca").src = obrazy[numerWycieczki];
    document.getElementById("miejsceWycieczki").innerHTML = miejsca[numerWycieczki];
}

function nastepnaWycieczka() {
    numerWycieczki++;
    if (numerWycieczki > 2) {
        numerWycieczki = 0;
    }
    document.getElementById("zdjecieMiejsca").src = obrazy[numerWycieczki];
    document.getElementById("miejsceWycieczki").innerHTML = miejsca[numerWycieczki];
}
