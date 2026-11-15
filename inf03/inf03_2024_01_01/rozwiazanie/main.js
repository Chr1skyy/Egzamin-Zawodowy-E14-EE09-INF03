function formularz() {
    let regulamin = document.getElementById("check").checked;
    let wynik = document.getElementById("wynik");
    if (regulamin) {
        let imie = document.getElementById("imie").value.toUpperCase();
        let nazwisko = document.getElementById("nazwisko").value.toUpperCase();
        let zgloszenie = document.getElementById("zgloszenie").value;
        wynik.innerHTML = imie + " " + nazwisko + "<br>Treść Twojej sprawy: " + zgloszenie;
        wynik.style.color = "navy";
    } else {
        wynik.innerHTML = "Musisz zapoznać się z regulaminem";
        wynik.style.color = "red";
    }
}
