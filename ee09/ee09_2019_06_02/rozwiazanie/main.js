function oblicz() {
	let paliwo = document.getElementById("paliwo").value;
	let ilosc = document.getElementById("ilosc").value;
	let wynik = document.getElementById("wynik");
	let cena = 0;
	if(paliwo == 1) cena = 4;
	if(paliwo == 2) cena = 3.5;
	wynik.innerHTML = "koszt paliwa: " + cena * ilosc + " zł";
}