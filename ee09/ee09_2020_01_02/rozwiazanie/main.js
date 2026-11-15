function oblicz() {
    let droga = Number(document.getElementById("dystans").value);
    let spalanie = Number(document.getElementById("spalanie").value);
    let paliwo = droga * spalanie / 100;
    let wynik = document.getElementById("wynik");
    wynik.innerHTML = "Potrzebujesz: " + paliwo + " litrów paliwa";
}
