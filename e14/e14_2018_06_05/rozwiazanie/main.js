function oblicz() {
  let goscie = document.getElementById("goscie").value;
  let poprawiny = document.getElementById("poprawiny").checked;
  let wynik = document.getElementById("wynik");
  let koszt = 0;
  if (poprawiny) {
    koszt = goscie * 100;
    koszt = koszt * 1.3;
  } else {
    koszt = goscie * 100;
  }
  wynik.innerHTML = "Koszt Twojego wesela to " + koszt + " złotych ";
}