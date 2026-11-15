function oblicz() {
    let zZielonejGory = document.getElementById("zielonaGora").checked;
    let km = Number(document.getElementById("km").value);
    let wynik = document.getElementById("wynik");
    if (zZielonejGory) {
        wynik.innerHTML = "Dowieziemy Twoją pizzę za darmo";
    } else {
        let koszt = km * 2;
        wynik.innerHTML = "Dowóz będzie Cię kosztował " + koszt + " złotych";
    }
}
