function formularz() {
	let imie = document.getElementById("imie");
	let nazwisko = document.getElementById("nazwisko");
	let email = document.getElementById("email").value.toLowerCase();
	let lista = document.getElementById("lista");
	let wynik = document.getElementById("wynik");
	wynik.innerHTML = imie.value + " " + nazwisko.value + "<br/>" + email + "<br/>" + "Usługa: " + lista.value;
}