function odkryj() {
	let krotkie = document.getElementById("krotkie").checked;
	let srednie = document.getElementById("srednie").checked;
	let poldlugie = document.getElementById("poldlugie").checked;
	let dlugie = document.getElementById("dlugie").checked;
	let wynik = document.getElementById("wynik");
	let cena = 0;
	if(krotkie) cena = 25;
	if(srednie) cena = 30;
	if(poldlugie) cena = 40;
	if(dlugie) cena = 50;
	wynik.innerHTML = "Cena strzyżenia: " + cena;
}