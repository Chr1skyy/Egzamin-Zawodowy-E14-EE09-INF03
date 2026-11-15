function pokazBlok2() {
    document.getElementById("blok1").style.visibility = "hidden";
    document.getElementById("blok2").style.visibility = "visible";
}

function pokazBlok3() {
    document.getElementById("blok2").style.visibility = "hidden";
    document.getElementById("blok3").style.visibility = "visible";
}

function zatwierdz() {
    let haslo1 = document.getElementById("haslo1").value;
    let haslo2 = document.getElementById("haslo2").value;
    let imie = document.getElementById("imie").value;
    let nazwisko = document.getElementById("nazwisko").value;
    if (haslo1 != haslo2) {
        alert("Podane hasła różnią się");
    }
    console.log("Witaj " + imie + " " + nazwisko);
}
