function przelicz() {
    const wynik = document.getElementById("wynik");
    let liczbaDziesietna = +document.getElementById("liczbaDziesietna").value;
    let liczbaBinarna = "";
    let j = 1;
    while (liczbaDziesietna != 0) {
        liczbaBinarna = (liczbaDziesietna % 2) + liczbaBinarna;
        liczbaDziesietna = Math.floor(liczbaDziesietna / 2);
        if (j == 4) {
            j = 1;
            liczbaBinarna = " " + liczbaBinarna;
        }
        j++;
    }
    wynik.innerHTML = liczbaBinarna + "<sub>2</sub>";
}