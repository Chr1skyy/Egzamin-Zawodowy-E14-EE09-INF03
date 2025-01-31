function zmienStyl(color) {
  let size = document.getElementById("procent").value;
  let styl = document.getElementById("styl").value;
  let wynik = document.getElementById("wynik");
  wynik.style.color = color;
  wynik.style.fontSize = size + "%";
  wynik.style.fontStyle = styl;
}