function licznik() {
    let liczbaWejsc = localStorage.getItem("odwiedziny");

    if (liczbaWejsc === null) {
        liczbaWejsc = 0;
    } else {
        liczbaWejsc = parseInt(liczbaWejsc);
    }

    liczbaWejsc++
    localStorage.setItem("odwiedziny", liczbaWejsc)

    const licznikWejsc = document.querySelector("#licznikWejsc")
    if (licznikWejsc) {
        licznikWejsc.innerHTML = `Liczba wejść na stronę: ${liczbaWejsc}`
    }
}

document.addEventListener("DOMContentLoaded", licznik())