function licznik() {
    let liczbaWejsc = localStorage.getItem("odwiedziny");
    if (liczbaWejsc == null) {
        liczbaWejsc = 0;
    }
    liczbaWejsc = Number(liczbaWejsc) + 1;
    localStorage.setItem("odwiedziny", liczbaWejsc);
    document.getElementById("licznikWejsc").innerHTML = "Liczba wejść na stronę: " + liczbaWejsc;
}
