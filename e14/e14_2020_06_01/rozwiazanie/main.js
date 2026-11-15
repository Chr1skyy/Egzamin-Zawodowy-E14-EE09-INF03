function oblicz() {
    let powierzchnia = Number(document.getElementById("powierzchnia").value);
    let liczbaPuszek = Math.ceil(powierzchnia / 4);
    let wynik = document.getElementById("wynik");
    wynik.innerHTML = "Liczba jednolitrowych puszek farby potrzebnych do pomalowania wynosi: " + liczbaPuszek;
}
