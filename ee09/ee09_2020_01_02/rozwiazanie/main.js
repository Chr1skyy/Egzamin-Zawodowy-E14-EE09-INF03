function oblicz() {
	let dystans = parseInt(document.getElementById("dystans").value);
	let spalanie = parseInt(document.getElementById("spalanie").value);
	let wynik = document.getElementById("wynik");
	let paliwo = spalanie / 100 * dystans;
	wynik.innerHTML = "Potrzebujesz: " + Math.round(paliwo) + " litrów paliwa";
}