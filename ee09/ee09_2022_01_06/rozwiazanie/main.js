function kolorBg(kolor) {
	let prawy = document.getElementById("prawy");
	prawy.style.background = kolor;
}
function kolorFont() {
	let prawy = document.getElementById("prawy");
	let kolor = document.getElementById("kolorC");
	prawy.style.color = kolor.value;
}
function rozmiarFont() {
	let prawy = document.getElementById("prawy");
	let rozmiar = document.getElementById("rozmiar").value;
	prawy.style = "font-size: " + rozmiar + "%";
}
function ramka() {
	let obraz = document.getElementById("obraz");
	let czyRamka = document.getElementById("ramka").checked;
	if(czyRamka) {
		obraz.style.border = "1px solid white";
	} else obraz.style.border = "none";
}
function punktor(typ) {
	let lista = document.getElementById("lista");
	lista.style.listStyleType = typ;
}