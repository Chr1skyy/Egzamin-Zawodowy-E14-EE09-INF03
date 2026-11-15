function zmienSekcje(blok, sekcja) {
    document.getElementById("blokBaza").style.backgroundColor = "#FFAEA5";
    document.getElementById("blokOpisy").style.backgroundColor = "#FFAEA5";
    document.getElementById("blokGaleria").style.backgroundColor = "#FFAEA5";
    document.getElementById("baza").style.display = "none";
    document.getElementById("opisy").style.display = "none";
    document.getElementById("galeria").style.display = "none";

    document.getElementById(blok).style.backgroundColor = "MistyRose";
    document.getElementById(sekcja).style.display = "block";
}
