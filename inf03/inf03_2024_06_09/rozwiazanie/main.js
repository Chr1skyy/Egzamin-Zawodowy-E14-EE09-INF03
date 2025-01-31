let aktualneZdjecie = 1;

function poprzednieZdjecie() {
    aktualneZdjecie -= 1;
    if (aktualneZdjecie < 1) aktualneZdjecie = 7
    const aktywneZdjecie = document.getElementById('aktywne_zdjecie');
    aktywneZdjecie.src = aktualneZdjecie + ".jpg"
}

function nastepneZdjecie() {
    aktualneZdjecie += 1;
    if (aktualneZdjecie > 7) aktualneZdjecie = 1
    const aktywneZdjecie = document.getElementById('aktywne_zdjecie');
    aktywneZdjecie.src = aktualneZdjecie + ".jpg"
}