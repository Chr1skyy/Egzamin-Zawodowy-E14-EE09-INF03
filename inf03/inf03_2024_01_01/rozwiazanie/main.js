function formularz() {
	let check = document.getElementById("check").checked;
	if (check) {
		let wynik = document.getElementById("wynik");
		let imie = (document.getElementById("imie").value).toUpperCase();
		let nazwisko = (document.getElementById("nazwisko").value).toUpperCase();
		let usluga = document.getElementById("zgloszenie").value;
		wynik.innerHTML = "<span style='color: navy'>" + imie + " " + nazwisko + "<br/>" + "Treść Twojej sprawy: " + usluga + "</span>";
	} else {
		wynik.innerHTML = "<span style='color: red;'>Musisz zapoznać się z regulaminem</span>";
	}
}