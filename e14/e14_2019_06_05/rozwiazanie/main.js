function przeslij() {
	let check = document.getElementById("check").checked;
	if (check) {
		let wynik = document.getElementById("wynik");
		let imie = (document.getElementById("imie").value).toUpperCase();
		let nazwisko = (document.getElementById("nazwisko").value).toUpperCase();
		let usluga = document.getElementById("usluga").value;
		wynik.innerHTML = imie + " " + nazwisko + "<br/>" + "Treść Twojej sprawy: " + usluga + "<br/>" + "Na podany e-mail zostanie wysłana oferta.";
	} else {
		wynik.innerHTML = "<span style='color: red;'>Musisz zapoznać się z regulaminem</span>";
	}
}