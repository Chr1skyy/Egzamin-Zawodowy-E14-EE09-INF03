let numerZdjecia = 1;

function zamiana(numer) {
    numerZdjecia = numer;
    document.getElementById("glowne").src = "img/" + numerZdjecia + ".jpg";
}

function poprzednie() {
    numerZdjecia--;
    if (numerZdjecia < 1) {
        numerZdjecia = 5;
    }
    document.getElementById("glowne").src = "img/" + numerZdjecia + ".jpg";
}

function nastepne() {
    numerZdjecia++;
    if (numerZdjecia > 5) {
        numerZdjecia = 1;
    }
    document.getElementById("glowne").src = "img/" + numerZdjecia + ".jpg";
}
