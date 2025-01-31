function dodawanie() {
	let a = parseInt(document.getElementById("a").value);
	let b = parseInt(document.getElementById("b").value);
	let wynik = document.getElementById("wynik");
	wynik.innerHTML = "Wynik: " + (a + b);
}

function odejmowanie() {
	let a = parseInt(document.getElementById("a").value);
	let b = parseInt(document.getElementById("b").value);
	let wynik = document.getElementById("wynik");
	wynik.innerHTML = "Wynik: " + (a - b);
}

function mnozenie() {
	let a = parseInt(document.getElementById("a").value);
	let b = parseInt(document.getElementById("b").value);
	let wynik = document.getElementById("wynik");
	wynik.innerHTML = "Wynik: " + (a * b);
}

function dzielenie() {
	let a = parseInt(document.getElementById("a").value);
	let b = parseInt(document.getElementById("b").value);
	let wynik = document.getElementById("wynik");
	wynik.innerHTML = "Wynik: " + (a / b);
}

function potegowanie() {
	let a = parseInt(document.getElementById("a").value);
	let b = parseInt(document.getElementById("b").value);
	let wynik = document.getElementById("wynik");
	wynik.innerHTML = "Wynik: " + (a ** b);
}