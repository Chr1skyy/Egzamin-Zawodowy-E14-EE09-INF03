function oblicz() {
  let jestemZZielonejGory = document.getElementById("zielonaGora").checked;
  let km = document.getElementById("km").value;
  let wynik = document.getElementById("wynik");
  let koszt = 0;
  if (jestemZZielonejGory) {
    wynik.innerHTML = "Dowieziemy Twoją pizzę za darmo";
  } else {
    koszt = km * 2;
    wynik.innerHTML = "Dowóz bedzie Cię kosztował " + koszt + " złotych";
  }
}