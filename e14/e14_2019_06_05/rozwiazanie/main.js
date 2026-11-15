function przeslij() {
    let regulamin = document.getElementById("check").checked;
    let wynik = document.getElementById("wynik");
    if (regulamin) {
        let imie = document.getElementById("imie").value.toUpperCase();
        let nazwisko = document.getElementById("nazwisko").value.toUpperCase();
        let usluga = document.getElementById("usluga").value;
        wynik.innerHTML = imie + " " + nazwisko + "<br>Treść Twojej sprawy: " + usluga + "<br>Na podany e-mail zostanie wysłana oferta.";
        wynik.style.color = "black";
    } else {
        wynik.innerHTML = "Musisz zapoznać się z regulaminem";
        wynik.style.color = "red";
    }
}
