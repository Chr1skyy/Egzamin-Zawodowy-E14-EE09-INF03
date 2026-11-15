function przelicz() {
    let liczba = Number(document.getElementById("liczbaDziesietna").value);
    let liczbaBinarna = "";
    do {
        liczbaBinarna = (liczba % 2) + liczbaBinarna;
        liczba = Math.floor(liczba / 2);
    } while (liczba != 0);

    let zeSpacjami = "";
    let licznikCyfr = 0;
    for (let i = liczbaBinarna.length - 1; i >= 0; i--) {
        if (licznikCyfr == 4) {
            zeSpacjami = " " + zeSpacjami;
            licznikCyfr = 0;
        }
        zeSpacjami = liczbaBinarna[i] + zeSpacjami;
        licznikCyfr++;
    }

    let wynik = document.getElementById("wynik");
    wynik.innerHTML = zeSpacjami + "<sub>(2)</sub>";
}
