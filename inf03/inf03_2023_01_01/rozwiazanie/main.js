function policzFarba() {
    let powierzchnia = Number(document.getElementById("powierzchnia").value);
    let liczbaPuszek = Math.ceil(powierzchnia / 4);
    let wynik = document.getElementById("wynik");
    wynik.innerHTML = "Liczba potrzebnych puszek: " + liczbaPuszek;
}
