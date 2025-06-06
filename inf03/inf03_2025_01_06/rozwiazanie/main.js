function przelicz() {
    const wynik = document.getElementById("wynik");
    let liczbaDziesietna = +document.getElementById("liczbaDziesietna").value;
    let liczbaBinarna = "";
    while (liczbaDziesietna != 0) {
        liczbaBinarna = (liczbaDziesietna % 2) + liczbaBinarna;
        liczbaDziesietna = Math.floor(liczbaDziesietna / 2);
    }
	
	let liczbaBinarna2 = "";
    let j = 0;
    for (let i = liczbaBinarna.length - 1; i >= 0; i--) {
        liczbaBinarna2 = liczbaBinarna[i] + liczbaBinarna2;
        j++;
        if (j % 4 == 0 && i != 0) {
            liczbaBinarna2 = " " + liczbaBinarna2;
        }
    }

    wynik.innerHTML = liczbaBinarna2 + "<sub>2</sub>";
}