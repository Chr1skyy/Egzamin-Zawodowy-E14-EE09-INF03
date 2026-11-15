function generuj() {
    let wyraz = Number(document.getElementById("a").value);
    let roznica = Number(document.getElementById("r").value);
    let liczbaWyrazow = Number(document.getElementById("n").value);
    let tekst = "Ciąg arytmetyczny zawiera wyrazy: " + wyraz;
    for (let i = 2; i <= liczbaWyrazow; i++) {
        wyraz = wyraz + roznica;
        tekst = tekst + ", " + wyraz;
    }
    let wynik = document.getElementById("wynik");
    wynik.innerHTML = tekst;
}
