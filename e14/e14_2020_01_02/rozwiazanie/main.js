function zamow() {
	let ksztalt = document.getElementById("ksztalt").value;
	let r = document.getElementById("r").value;
	let g = document.getElementById("g").value;
	let b = document.getElementById("b").value;
	let wynik = document.getElementById("wynik");
	let kolor = document.getElementById("kolor");
	if (ksztalt == 1) wynik.innerHTML = "Zamówiłeś żelka: miś";
	if (ksztalt == 2) wynik.innerHTML = "Zamówiłeś żelka: żabka";
	if (ksztalt == 3) wynik.innerHTML = "Zamówiłeś żelka: inny kształt";
	kolor.style = "background: rgb(" + r + ", " + g + ", " + b + ");";
}