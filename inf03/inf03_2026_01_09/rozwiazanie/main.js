function pokazWzory() {
    let wzory = document.getElementById("wzory");
    for (let i = 1; i <= 10; i++) {
        let obraz = document.createElement("img");
        obraz.src = "img/" + i + ".jpg";
        obraz.className = "wzory";
        obraz.title = i;
        wzory.appendChild(obraz);
    }
}

function zmienSekcje(przycisk, sekcja) {
    document.getElementById("przyciskKolor").style.backgroundColor = "Crimson";
    document.getElementById("przyciskKsztalt").style.backgroundColor = "Crimson";
    document.getElementById("przyciskWzor").style.backgroundColor = "Crimson";
    document.getElementById("sekcjaKolor").style.display = "none";
    document.getElementById("sekcjaKsztalt").style.display = "none";
    document.getElementById("sekcjaWzor").style.display = "none";

    document.getElementById(przycisk).style.backgroundColor = "Salmon";
    document.getElementById(sekcja).style.display = "block";
}
