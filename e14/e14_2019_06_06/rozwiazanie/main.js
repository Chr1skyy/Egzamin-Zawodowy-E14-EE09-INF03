function przeslij() {
    let imie = document.getElementById("imie").value;
    let nazwisko = document.getElementById("nazwisko").value;
    let email = document.getElementById("email").value.toLowerCase();
    let usluga = document.getElementById("lista").value;
    let wynik = document.getElementById("wynik");
    wynik.innerHTML = imie + " " + nazwisko + "<br>" + email + "<br>Usługa: " + usluga;
}
