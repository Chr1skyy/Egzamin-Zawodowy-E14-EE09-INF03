function wybor(ozdoba) {
    let wynik = document.getElementById("wynik");
    if (ozdoba == "choinka") {
        wynik.innerHTML = "Wybrałeś choinkę. Cena 10 zł";
    } else if (ozdoba == "mikolaj") {
        wynik.innerHTML = "Wybrałeś mikołaja. Cena 12 zł";
    } else if (ozdoba == "renifer") {
        wynik.innerHTML = "Wybrałeś renifera. Cena 8 zł";
    }
}
