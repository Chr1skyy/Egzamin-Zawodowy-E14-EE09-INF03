function wybor(wybor) {
	let wynik = document.getElementById("wynik");
	if(wybor == "choinka") wynik.innerHTML = "Wybrałeś choinkę. Cena 10 zł";
	if(wybor == "mikolaj") wynik.innerHTML = "Wybrałeś mikołaja. Cena 12 zł";
	if(wybor == "renifer") wynik.innerHTML = "Wybrałeś renifera. Cena 8 zł";
}