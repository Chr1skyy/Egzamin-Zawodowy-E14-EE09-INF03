function oblicz() {
    let goscie = Number(document.getElementById("goscie").value);
    let poprawiny = document.getElementById("poprawiny").checked;
    let koszt = goscie * 100;
    if (poprawiny) {
        koszt = koszt * 1.3;
    }
    let wynik = document.getElementById("wynik");
    wynik.innerHTML = "Koszt Twojego wesela to " + koszt + " złotych";
}
