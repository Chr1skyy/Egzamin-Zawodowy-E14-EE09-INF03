function zamowienie() {
	let ksztalt = document.getElementById("ksztalt").value;
	let r = document.getElementById("r").value;
	let g = document.getElementById("g").value;
	let b = document.getElementById("b").value;
	let wynik = document.getElementById("wynik");
	let kolor = document.getElementById("kolor");
	if(ksztalt == 1) wynik.innerHTML = "Twoje zamówienie to cukierek cytryna";
	if(ksztalt == 2) wynik.innerHTML = "Twoje zamówienie to cukierek liść";
	if(ksztalt == 3) wynik.innerHTML = "Twoje zamówienie to cukierek banan";
	kolor.style = "background: rgb(" + r + ", " + g + ", " + b + ");";
}