function zamow() {
  let wynik = document.getElementById("wynik");
  let numer = parseInt(document.getElementById("numer").value);
  let waga = parseInt(document.getElementById("waga").value);
  let koszt = 0;
  switch (numer) {
    case (1):
      koszt = waga * 5;
      break;
    case (2):
      koszt = waga * 6;
      break;
    case (3):
      koszt = waga * 7;
      break;
    default:
      break;
  }
  wynik.innerHTML = "Koszt zamówienia wynosi: " + koszt + " zł"
}