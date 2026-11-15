let numerZdjecia = 1;

function poprzednieZdjecie() {
    numerZdjecia--;
    if (numerZdjecia < 1) {
        numerZdjecia = 7;
    }
    document.getElementById("aktywne_zdjecie").src = "img/" + numerZdjecia + ".jpg";
}

function nastepneZdjecie() {
    numerZdjecia++;
    if (numerZdjecia > 7) {
        numerZdjecia = 1;
    }
    document.getElementById("aktywne_zdjecie").src = "img/" + numerZdjecia + ".jpg";
}
