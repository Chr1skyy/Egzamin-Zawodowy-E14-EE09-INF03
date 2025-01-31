function oblicz() {
    const wynik = document.getElementById('wynik')
    const powierzchnia = +document.getElementById('powierzchnia').value
    wynik.innerHTML = "Liczba jednolitrowych puszek farby potrzebnych do pomalowania wynosi: " + Math.ceil(powierzchnia / 4)
}