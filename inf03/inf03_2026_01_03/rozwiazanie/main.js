function wybierzFigure(plik) {
    document.getElementById("figura").src = plik;
}

function oblicz() {
    let bokA = Number(document.getElementById("bokA").value);
    let bokB = Number(document.getElementById("bokB").value);
    let figura = document.getElementById("figura");
    let pole;
    if (figura.src.includes("1d.bmp")) {
        pole = bokA * bokB / 2;
    } else {
        pole = bokA * bokB;
    }
    let wynik = document.getElementById("wynik");
    wynik.innerHTML = pole;
}
