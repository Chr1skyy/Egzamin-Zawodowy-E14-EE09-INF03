function generuj() {
	let a = parseInt(document.getElementById("a").value);
	let r = parseInt(document.getElementById("r").value);
	let n = parseInt(document.getElementById("n").value);
	let wynik = document.getElementById("wynik");
	res = "Ciąg arytmetyczny zawiera wyrazy: ";
	while(n) {
		res += a + ", ";
		a = a + r;
		n--;
	}
	wynik.innerHTML = res;
}